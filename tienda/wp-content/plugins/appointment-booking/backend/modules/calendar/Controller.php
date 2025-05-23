<?php
namespace Bookly\Backend\Modules\Calendar;

use \Bookly\Lib;

/**
 * Class Controller
 * @package Bookly\Backend\Modules\Calendar
 */
class Controller extends Lib\Controller
{
    protected function getPermissions()
    {
        return array( '_this' => 'user' );
    }

    public function index()
    {
        /** @var \WP_Locale $wp_locale */
        global $wp_locale;

        $this->enqueueStyles( array(
            'frontend' => get_option( 'ab_settings_phone_default_country' ) == 'disabled'
                ? array()
                : array( 'css/intlTelInput.css' ),
            'module'   => array(
                'css/calendar.css',
                'css/fullcalendar.min.css',
            ),
            'backend'  => array(
                'css/chosen.min.css',
                'css/jquery-ui-theme/jquery-ui.min.css',
                'css/bookly.main-backend.css',
                'bootstrap/css/bootstrap.min.css',
            ),
        ) );

        $this->enqueueScripts( array(
            'backend'  => array(
                'js/angular.min.js'                => array( 'jquery' ),
                'js/angular-ui-date-0.0.8.js'      => array( 'ab-angular.min.js' ),
                'js/ng-new_customer_dialog.js'     => array( 'ab-angular.min.js' ),
                'js/moment.min.js'                 => array( 'jquery' ),
                'bootstrap/js/bootstrap.min.js'    => array( 'jquery' ),
                'js/chosen.jquery.min.js'          => array( 'jquery' ),
                'js/ng-edit_appointment_dialog.js' => array( 'ab-angular-ui-date-0.0.8.js', 'jquery-ui-datepicker' ),
            ),
            'module'   => array(
                'js/fullcalendar.min.js'   => array( 'ab-moment.min.js' ),
                'js/fc-multistaff-view.js' => array( 'ab-fullcalendar.min.js' ),
                'js/calendar.js'           => array( 'ab-fc-multistaff-view.js' ),
            ),
            'frontend' => get_option( 'ab_settings_phone_default_country' ) == 'disabled'
                ? array()
                : array( 'js/intlTelInput.min.js' => array( 'jquery' ) ),
        ) );

        $slot_length_minutes = get_option( 'ab_settings_time_slot_length', '15' );
        $slot = new \DateInterval( 'PT' . $slot_length_minutes . 'M' );

        $staff_members = Lib\Utils\Common::isCurrentUserAdmin()
            ? Lib\Entities\Staff::query()->sortBy( 'position' )->find()
            : Lib\Entities\Staff::query()->where( 'wp_user_id', get_current_user_id() )->find();

        wp_localize_script( 'ab-calendar.js', 'BooklyL10n', array(
            'slotDuration'     => $slot->format( '%H:%I:%S' ),
            'calendar'         => array(
                'shortMonths' => array_values( $wp_locale->month_abbrev ),
                'longMonths'  => array_values( $wp_locale->month ),
                'shortDays'   => array_values( $wp_locale->weekday_abbrev ),
                'longDays'    => array_values( $wp_locale->weekday ),
            ),
            'AM'               => $wp_locale->meridiem['AM'],
            'PM'               => $wp_locale->meridiem['PM'],
            'dpDateFormat'     => Lib\Utils\DateTime::convertFormat( 'date', Lib\Utils\DateTime::FORMAT_JQUERY_DATEPICKER ),
            'mjsDateFormat'    => Lib\Utils\DateTime::convertFormat( 'date', Lib\Utils\DateTime::FORMAT_MOMENT_JS ),
            'mjsTimeFormat'    => Lib\Utils\DateTime::convertFormat( 'time', Lib\Utils\DateTime::FORMAT_MOMENT_JS ),
            'today'            => __( 'Today', 'bookly' ),
            'week'             => __( 'Week',  'bookly' ),
            'day'              => __( 'Day',   'bookly' ),
            'month'            => __( 'Month', 'bookly' ),
            'allDay'           => __( 'All Day', 'bookly' ),
            'noStaffSelected'  => __( 'No staff selected', 'bookly' ),
            'newAppointment'   => __( 'New appointment',   'bookly' ),
            'editAppointment'  => __( 'Edit appointment',  'bookly' ),
            'are_you_sure'     => __( 'Are you sure?',     'bookly' ),
            'delete'           => __( 'Delete', 'bookly' ),
            'startOfWeek'      => (int) get_option( 'start_of_week' ),
            'default_status'   => get_option( 'ab_settings_default_appointment_status' ),
            'intlTelInput'     => array(
                'enabled'      => ( get_option( 'ab_settings_phone_default_country' ) != 'disabled' ),
                'utils'        => plugins_url( 'intlTelInput.utils.js', AB_PATH . '/frontend/resources/js/intlTelInput.utils.js' ),
                'country'      => get_option( 'ab_settings_phone_default_country' ),
            ),
            'cf_per_service'   => get_option( 'ab_custom_fields_per_service' ),
        ) );
        // Custom fields without captcha field.
        $custom_fields = array_filter( json_decode( get_option( 'ab_custom_fields' ) ), function( $field ) { return $field->type != 'captcha'; } );
        $this->render( 'calendar', compact( 'staff_members', 'custom_fields' ) );
    }

    /**
     * Get data for FullCalendar.
     *
     * @return string json
     */
    public function executeGetStaffAppointments()
    {
        $result        = array();
        $staff_members = array();
        $one_day       = new \DateInterval( 'P1D' );
        $start_date    = new \DateTime( $this->getParameter( 'start' ) );
        $end_date      = new \DateTime( $this->getParameter( 'end' ) );
        // FullCalendar sends end date as 1 day further.
        $end_date->sub( $one_day );

        if ( Lib\Utils\Common::isCurrentUserAdmin() ) {
            $staff_members = Lib\Entities\Staff::query()
                ->whereIn( 'id', array_merge( array( 0 ), explode( ',', $this->getParameter( 'staff_ids' ) ) ) )
                ->find();
        } else {
            $staff_members[] = Lib\Entities\Staff::query()
                ->where( 'wp_user_id', get_current_user_id() )
                ->findOne();
        }

        foreach ( $staff_members as $staff ) {
            /** @var Lib\Entities\Staff $staff */
            $result = array_merge( $result, $staff->getAppointmentsForFC( $start_date, $end_date ) );

            // Schedule.
            $items = $staff->getScheduleItems();
            $day   = clone $start_date;
            // Find previous day end time.
            $last_end = clone $day;
            $last_end->sub( $one_day );
            $w = intval( $day->format( 'w' ) );
            $end_time = $items[ $w > 0 ? $w : 7 ]->get( 'end_time' );
            if ( $end_time !== null ) {
                $end_time = explode( ':', $end_time );
                $last_end->setTime( $end_time[0], $end_time[1] );
            } else {
                $last_end->setTime( 24, 0 );
            }
            // Do the loop.
            while ( $day <= $end_date ) {
                do {
                    /** @var Lib\Entities\StaffScheduleItem $item */
                    $item = $items[ intval( $day->format( 'w' ) ) + 1 ];
                    if ( $item->get( 'start_time' ) && ! $staff->isOnHoliday( $day ) ) {
                        $start = $last_end->format( 'Y-m-d H:i:s' );
                        $end   = $day->format( 'Y-m-d ' . $item->get( 'start_time' ) );
                        if ( $start < $end ) {
                            $result[] = array(
                                'start'     => $start,
                                'end'       => $end,
                                'rendering' => 'background',
                                'staffId'   => $staff->get( 'id' ),
                            );
                        }
                        $last_end = clone $day;
                        $end_time = explode( ':', $item->get( 'end_time' ) );
                        $last_end->setTime( $end_time[0], $end_time[1] );

                        // Breaks.
                        foreach ( $item->getBreaksList() as $break ) {
                            $result[] = array(
                                'start'     => $day->format( 'Y-m-d ' . $break['start_time'] ),
                                'end'       => $day->format( 'Y-m-d ' . $break['end_time'] ),
                                'rendering' => 'background',
                                'staffId'   => $staff->get( 'id' ),
                            );
                        }

                        break;
                    }

                    $result[] = array(
                        'start'     => $last_end->format( 'Y-m-d H:i:s' ),
                        'end'       => $day->format( 'Y-m-d 24:00:00' ),
                        'rendering' => 'background',
                        'staffId'   => $staff->get( 'id' ),
                    );
                    $last_end = clone $day;
                    $last_end->setTime( 24, 0 );

                } while ( 0 );

                $day->add( $one_day );
            }

            if ( $last_end->format( 'H' ) != 24 ) {
                $result[] = array(
                    'start'     => $last_end->format( 'Y-m-d H:i:s' ),
                    'end'       => $last_end->format( 'Y-m-d 24:00:00' ),
                    'rendering' => 'background',
                    'staffId'   => $staff->get( 'id' ),
                );
            }
        }

        wp_send_json( $result );
    }

    /**
     * Get data needed for appointment form initialisation.
     */
    public function executeGetDataForAppointmentForm()
    {
        $result = array(
            'staff'         => array(),
            'customers'     => array(),
            'start_time'    => array(),
            'end_time'      => array(),
            'time_interval' => get_option( 'ab_settings_time_slot_length' ) * 60,
            'status'        => array(
                'items' => array(
                    'pending'   => Lib\Entities\CustomerAppointment::statusToString( Lib\Entities\CustomerAppointment::STATUS_PENDING ),
                    'approved'  => Lib\Entities\CustomerAppointment::statusToString( Lib\Entities\CustomerAppointment::STATUS_APPROVED ),
                    'cancelled' => Lib\Entities\CustomerAppointment::statusToString( Lib\Entities\CustomerAppointment::STATUS_CANCELLED ),
                ),
                'default' => get_option( 'ab_settings_default_appointment_status' ),
            ),
        );

        // Staff list.
        $staff_members = Lib\Utils\Common::isCurrentUserAdmin()
            ? Lib\Entities\Staff::query()->sortBy( 'position' )->find()
            : Lib\Entities\Staff::query()->where( 'wp_user_id', get_current_user_id() )->find();

        /** @var Lib\Entities\Staff $staff_member */
        foreach ( $staff_members as $staff_member ) {
            $services = array();
            foreach ( $staff_member->getStaffServices() as $staff_service ) {
                $services[] = array(
                    'id'       => $staff_service->service->get( 'id' ),
                    'title'    => sprintf(
                        '%s (%s)',
                        $staff_service->service->get( 'title' ),
                        Lib\Utils\DateTime::secondsToInterval( $staff_service->service->get( 'duration' ) )
                    ),
                    'duration' => $staff_service->service->get( 'duration' ),
                    'capacity' => $staff_service->get( 'capacity' )
                );
            }
            $result['staff'][] = array(
                'id'        => $staff_member->get( 'id' ),
                'full_name' => $staff_member->get( 'full_name' ),
                'services'  => $services
            );
        }

        // Customers list.
        foreach ( Lib\Entities\Customer::query()->sortBy( 'name' )->find() as $customer ) {
            $name = $customer->get( 'name' );
            if ( $customer->get( 'email' ) != '' || $customer->get( 'phone' ) != '' ) {
                $name .= ' (' . trim( $customer->get( 'email' ) . ', ' . $customer->get( 'phone' ) , ', ' ) . ')';
            }

            $result['customers'][] = array(
                'id'                => $customer->get( 'id' ),
                'name'              => $name,
                'custom_fields'     => array(),
                'number_of_persons' => 1,
            );
        }

        // Time list.
        $ts_length  = Lib\Config::getTimeSlotLength();
        $time_start = 0;
        $time_end   = DAY_IN_SECONDS * 2;

        // Run the loop.
        while ( $time_start <= $time_end ) {
            $slot = array(
                'value' => Lib\Utils\DateTime::buildTimeString( $time_start, false ),
                'title' => Lib\Utils\DateTime::formatTime( $time_start )
            );
            if ( $time_start < DAY_IN_SECONDS ) {
                $result['start_time'][] = $slot;
            }
            $result['end_time'][] = $slot;
            $time_start += $ts_length;
        }

        wp_send_json( $result );
    }

    /**
     * Get appointment data when editing an appointment.
     */
    public function executeGetDataForAppointment()
    {
        $response = array( 'success' => false, 'data' => array( 'customers' => array() ) );

        $appointment = new Lib\Entities\Appointment();
        if ( $appointment->load( $this->getParameter( 'id' ) ) ) {
            $response['success'] = true;

            $info = Lib\Entities\Appointment::query( 'a' )
                ->select( 'ss.capacity AS max_capacity, SUM( ca.number_of_persons ) AS total_number_of_persons, a.staff_id, a.service_id, a.start_date, a.end_date' )
                ->leftJoin( 'CustomerAppointment', 'ca', 'ca.appointment_id = a.id' )
                ->leftJoin( 'StaffService', 'ss', 'ss.staff_id = a.staff_id AND ss.service_id = a.service_id' )
                ->where( 'a.id', $appointment->get( 'id' ) )
                ->fetchRow();

            $response['data']['total_number_of_persons'] = $info['total_number_of_persons'];
            $response['data']['max_capacity']            = $info['max_capacity'];
            $response['data']['start_date']              = $info['start_date'];
            $response['data']['end_date']                = $info['end_date'];
            $response['data']['staff_id']                = $info['staff_id'];
            $response['data']['service_id']              = $info['service_id'];
            $customers = Lib\Entities\CustomerAppointment::query( 'ca' )
                ->select( 'ca.id,
                    ca.customer_id,
                    ca.custom_fields,
                    ca.extras,
                    ca.number_of_persons,
                    ca.status,
                    p.total,
                    p.type    AS payment_gateway, 
                    p.status  AS payment_status' )
                ->leftJoin( 'Payment', 'p', 'p.customer_appointment_id = ca.id' )
                ->where( 'ca.appointment_id', $appointment->get( 'id' ) )
                ->fetchArray();

            foreach ( $customers as $customer ) {
                $payment_title = '';
                if( $customer['total'] !== null ) {
                    $payment_title = Lib\Utils\Common::formatPrice( $customer['total'] ) . ' ' . Lib\Entities\Payment::typeToString( $customer['payment_gateway'] );
                    if ( $customer['payment_gateway'] != Lib\Entities\Payment::TYPE_LOCAL ) {
                        $payment_title .= '&nbsp;<span class="ab-pay-status-' . $customer['payment_status'] . '">' . Lib\Entities\Payment::statusToString( $customer['payment_status'] ) . '</span>';
                    }
                }
                $response['data']['customers'][] = array(
                    'id' => $customer['customer_id'],
                    'ca_id' => $customer['id'],
                    'custom_fields'     => (array) json_decode( $customer['custom_fields'], true ),
                    'extras'            => (array) json_decode( $customer['extras'], true ),
                    'number_of_persons' => $customer['number_of_persons'],
                    'status'            => $customer['status'],
                    'payment_gateway'   => $customer['payment_gateway'],
                    'payment_title'     => $payment_title,
                );
            }
        }
        wp_send_json( $response );
    }

    /**
     * Save appointment form (for both create and edit).
     */
    public function executeSaveAppointmentForm()
    {
        $response = array( 'success' => false );

        $start_date     = $this->getParameter( 'start_date' );
        $end_date       = $this->getParameter( 'end_date' );
        $staff_id       = $this->getParameter( 'staff_id' );
        $service_id     = $this->getParameter( 'service_id' );
        $appointment_id = $this->getParameter( 'id', 0 );
        $customers      = json_decode( $this->getParameter( 'customers', '[]' ), true );

        $staff_service = new Lib\Entities\StaffService();
        $staff_service->loadBy( array(
            'staff_id'   => $staff_id,
            'service_id' => $service_id
        ) );

        // Check for errors.
        if ( ! $start_date ) {
            $response['errors']['time_interval'] = __( 'Start time must not be empty', 'bookly' );
        } else if ( ! $end_date ) {
            $response['errors']['time_interval'] = __( 'End time must not be empty', 'bookly' );
        } else if ( $start_date == $end_date ) {
            $response['errors']['time_interval'] = __( 'End time must not be equal to start time', 'bookly' );
        }
        if ( ! $service_id ) {
            $response['errors']['service_required'] = true;
        }
        if ( empty ( $customers ) ) {
            $response['errors']['customers_required'] = true;
        }
        $total_number_of_persons = 0;
        $max_extras_duration = 0;
        foreach ( $customers as $customer ) {
            if ( $customer['status'] != Lib\Entities\CustomerAppointment::STATUS_CANCELLED ) {
                $total_number_of_persons += $customer['number_of_persons'];
                $extras_duration = apply_filters( 'bookly_extras_duration', 0, $customer['extras'] );
                if ( $extras_duration > $max_extras_duration ) {
                    $max_extras_duration = $extras_duration;
                }
            }
        }
        if ( $total_number_of_persons > $staff_service->get( 'capacity' ) ) {
            $response['errors']['overflow_capacity'] = __( 'The number of customers should be not more than ', 'bookly' ) . $staff_service->get( 'capacity' );
        }
        $total_end_date = $end_date;
        if ( $max_extras_duration > 0 ) {
            $total_end_date = date_create( $end_date )->modify( '+ ' . $max_extras_duration . ' sec' )->format( 'Y-m-d H:i:s' );
        }
        if ( ! $this->dateIntervalIsAvailableForAppointment( $start_date, $total_end_date, $staff_id, $appointment_id ) ) {
            $response['errors']['date_interval_not_available'] = true;
        }

        // If no errors then try to save the appointment.
        if ( ! isset ( $response['errors'] ) ) {
            $appointment = new Lib\Entities\Appointment();
            if ( $appointment_id ) {
                // Edit.
                $appointment->load( $appointment_id );
            }
            $appointment->set( 'start_date', $start_date );
            $appointment->set( 'end_date',   $end_date );
            $appointment->set( 'staff_id',   $staff_id );
            $appointment->set( 'service_id', $service_id );
            $appointment->set( 'extras_duration', $max_extras_duration );

            if ( $appointment->save() !== false ) {
                // Save customer appointments.
                $ca_status_changed = $appointment->saveCustomerAppointments( $customers );
                $customer_appointments = $appointment->getCustomerAppointments( true );

                // Google Calendar.
                $appointment->handleGoogleCalendar();

                // Send notifications.
                $notification = $this->getParameter( 'notification' );
                if ( $notification != 'no' ) {
                    foreach ( $customer_appointments as $ca ) {
                        // Send notification.
                        if ( $notification == 'all' || in_array( $ca->get( 'id' ), $ca_status_changed ) ) {
                            Lib\NotificationSender::send( $ca );
                        }
                    }
                }

                // Prepare response.
                $desc = '';
                // Display customer information only if there is 1 customer.
                if ( count( $customer_appointments ) == 1 ) {
                    // Customer information.
                    $customer = $customer_appointments[0]->customer;
                    foreach ( array( 'name', 'phone', 'email' ) as $data_entry ) {
                        $entry_value = $customer->get( $data_entry );
                        if ( $entry_value ) {
                            $desc .= '<div>' . esc_html( $entry_value ) . '</div>';
                        }
                    }
                    // Custom fields.
                    $custom_fields = $customer_appointments[0]->getCustomFields();
                    if ( ! empty( $custom_fields ) ) {
                        $desc .= '<br/>';
                        foreach ( $custom_fields as $custom_field ) {
                            $desc .= '<div>' . wp_strip_all_tags( $custom_field['label'] ) . ': ' . esc_html( $custom_field['value'] ) . '</div>';
                        }
                    }
                    // Extras.
                    /** @var \BooklyServiceExtras\Lib\Entities\ServiceExtra[] $extras */
                    $extras = apply_filters( 'bookly_extras', array(), (array) json_decode( $customer_appointments[0]->get( 'extras' ), true ) );
                    if ( ! empty ( $extras ) ) {
                        $desc .= sprintf(
                            '<br/><div>%s: %s</div>',
                            __( 'Extras', 'bookly' ),
                            implode( ', ', array_map( function ( $extra ) { return $extra->get( 'title' ); }, $extras ) )
                        );
                    }
                    // Payment.
                    $payment = Lib\Entities\Payment::query()->select( 'total, type AS payment_gateway, status AS payment_status' )
                        ->where( 'customer_appointment_id', $customer_appointments[0]->get( 'id' ) )
                        ->fetchRow();
                    if ( $payment ) {
                        $desc .= sprintf(
                            '<br/><div>%s: %s %s %s</div>',
                            __( 'Payment', 'bookly' ),
                            Lib\Utils\Common::formatPrice( $payment['total'] ),
                            Lib\Entities\Payment::typeToString( $payment['payment_gateway'] ),
                            Lib\Entities\Payment::statusToString( $payment['payment_status'] )
                        );
                    }
                    // Status.
                    $desc .= sprintf( '<br/><div>%s: %s</div>', __( 'Status', 'bookly' ), $customer_appointments[0]->getStatusTitle() );
                    // Signed up & Capacity.
                    if ( $staff_service->get( 'capacity' ) > 1 ) {
                        $signed_up = 0;
                        foreach ( $customer_appointments as $ca ) {
                            $signed_up += $ca->get( 'number_of_persons' );
                        }
                        $desc .= '<br/><div>' . __( 'Signed up', 'bookly' ) . ': ' . $signed_up . '</div>';
                        $desc .= '<div>' . __( 'Capacity', 'bookly' ) . ': ' . $staff_service->get( 'capacity' ) . '</div>';
                    }
                } else {
                    if ( $staff_service->get( 'capacity' ) > 1 ) {
                        $signed_up = 0;
                        foreach ( $customer_appointments as $ca ) {
                            $signed_up += $ca->get( 'number_of_persons' );
                        }
                        $desc .= '<div>' . __( 'Signed up', 'bookly' ) . ': ' . $signed_up . '</div>';
                        $desc .= '<div>' . __( 'Capacity', 'bookly' ) . ': ' . $staff_service->get( 'capacity' ) . '</div>';
                    }
                }

                $startDate = new \DateTime( $appointment->get( 'start_date' ) );
                $endDate   = new \DateTime( $appointment->get( 'end_date' ) );
                $endDate->modify( '+ ' . (int) $appointment->get( 'extras_duration' ) . ' sec' );

                $service = new Lib\Entities\Service();
                $service->load( $service_id );

                $response['success'] = true;
                $response['data']    = array(
                    'id'      => (int) $appointment->get( 'id' ),
                    'start'   => $startDate->format( 'Y-m-d H:i:s' ),
                    'end'     => $endDate->format( 'Y-m-d H:i:s' ),
                    'desc'    => $desc,
                    'title'   => $service->get( 'title' ) ? $service->get( 'title' ) : __( 'Untitled', 'bookly' ),
                    'color'   => $service->get( 'color' ),
                    'staffId' => $appointment->get( 'staff_id' ),
                );
            } else {
                $response['errors'] = array( 'db' => __( 'Could not save appointment in database.', 'bookly' ) );
            }
        }

        wp_send_json( $response );
    }

    public function executeCheckAppointmentDateSelection()
    {
        $start_date     = $this->getParameter( 'start_date' );
        $end_date       = $this->getParameter( 'end_date' );
        $staff_id       = $this->getParameter( 'staff_id' );
        $service_id     = $this->getParameter( 'service_id' );
        $appointment_id = $this->getParameter( 'appointment_id' );
        $timestamp_diff = strtotime( $end_date ) - strtotime( $start_date );

        $result = array(
            'date_interval_not_available' => false,
            'date_interval_warning' => false,
        );

        if ( ! $this->dateIntervalIsAvailableForAppointment( $start_date, $end_date, $staff_id, $appointment_id ) ) {
            $result['date_interval_not_available'] = true;
        }

        if ( $service_id ) {
            $service = new Lib\Entities\Service();
            $service->load( $service_id );

            $duration = $service->get( 'duration' );

            // Service duration interval is not equal to.
            $result['date_interval_warning'] = ( $timestamp_diff != $duration );
        }

        wp_send_json( $result );
    }

    public function executeDeleteAppointment()
    {
        $appointment = new Lib\Entities\Appointment();
        $appointment->load( $this->getParameter( 'appointment_id' ) );
        $appointment->delete();
        exit;
    }

    /**
     * @param $start_date
     * @param $end_date
     * @param $staff_id
     * @param $appointment_id
     * @return bool
     */
    private function dateIntervalIsAvailableForAppointment( $start_date, $end_date, $staff_id, $appointment_id )
    {
        return Lib\Entities\Appointment::query( 'a' )
            ->leftJoin( 'CustomerAppointment', 'ca', 'ca.appointment_id = a.id' )
            ->whereNot( 'a.id', $appointment_id )
            ->where( 'a.staff_id', $staff_id )
            ->whereNot( 'ca.status', Lib\Entities\CustomerAppointment::STATUS_CANCELLED )
            ->whereRaw(
                '(start_date > %s AND start_date < %s OR (end_date > %s AND end_date < %s) OR (start_date < %s AND end_date > %s) OR (start_date = %s OR end_date = %s) )',
                array( $start_date, $end_date, $start_date, $end_date, $start_date, $end_date, $start_date, $end_date )
            )
            ->count() == 0;
    }

    /**
     * Override parent method to add 'wp_ajax_ab_' prefix
     * so current 'execute*' methods look nicer.
     *
     * @param string $prefix
     */
    protected function registerWpActions( $prefix = '' )
    {
        parent::registerWpActions( 'wp_ajax_ab_' );
    }

}
