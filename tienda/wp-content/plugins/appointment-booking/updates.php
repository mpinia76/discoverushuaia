<?php
namespace Bookly;

use Bookly\Lib;

/**
 * Class Updates
 * @package Bookly
 */
class Updates
{

    function update_9_2()
    {
        add_option( 'ab_appearance_required_employee', '0' );
        $this->register_l10n_options( array( 'ab_appearance_text_required_employee' => __( 'Please select an employee', 'bookly' ) ) );
    }
    
    function update_9_1()
    {
        add_option( 'ab_settings_client_cancel_appointment_action', 'delete' );
    }

    function update_9_0()
    {
        /** @var \wpdb $wpdb */
        global $wpdb;

        add_option( 'ab_settings_default_appointment_status', 'approved' );
        $wpdb->query( 'ALTER TABLE ' . Lib\Entities\CustomerAppointment::getTableName() . ' ADD COLUMN `status` ENUM("pending","approved","cancelled") NOT NULL DEFAULT "approved"' );

        $notifications = array(
            array(
                'gateway' => 'email',
                'type'    => 'client_pending_appointment',
                'subject' => __( 'Your appointment information', 'bookly' ),
                'message' => wpautop( __( "Dear [[CLIENT_NAME]].\n\nThis is confirmation that you have booked [[SERVICE_NAME]].\n\nWe are waiting you at [[COMPANY_ADDRESS]] on [[APPOINTMENT_DATE]] at [[APPOINTMENT_TIME]].\n\nThank you for choosing our company.\n\n[[COMPANY_NAME]]\n[[COMPANY_PHONE]]\n[[COMPANY_WEBSITE]]", 'bookly' ) ),
                'active'  => 1,
            ),
            array(
                'gateway' => 'email',
                'type'    => 'staff_pending_appointment',
                'subject' => __( 'New booking information', 'bookly' ),
                'message' => wpautop( __( "Hello.\n\nYou have new booking.\n\nService: [[SERVICE_NAME]]\nDate: [[APPOINTMENT_DATE]]\nTime: [[APPOINTMENT_TIME]]\nClient name: [[CLIENT_NAME]]\nClient phone: [[CLIENT_PHONE]]\nClient email: [[CLIENT_EMAIL]]", 'bookly' ) ),
                'active'  => 0,
            ),
            array(
                'gateway' => 'email',
                'type'    => 'client_cancelled_appointment',
                'subject' => __( 'Booking cancellation', 'bookly' ),
                'message' => wpautop( __( "Dear [[CLIENT_NAME]].\n\nYou have cancelled your booking of [[SERVICE_NAME]] on [[APPOINTMENT_DATE]] at [[APPOINTMENT_TIME]].\n\nThank you for choosing our company.\n\n[[COMPANY_NAME]]\n[[COMPANY_PHONE]]\n[[COMPANY_WEBSITE]]", 'bookly' ) ),
                'active'  => 0,
            ),

            array(
                'gateway' => 'sms',
                'type'    => 'client_pending_appointment',
                'subject' => '',
                'message' => __( "Dear [[CLIENT_NAME]].\nThis is confirmation that you have booked [[SERVICE_NAME]].\nWe are waiting you at [[COMPANY_ADDRESS]] on [[APPOINTMENT_DATE]] at [[APPOINTMENT_TIME]].\nThank you for choosing our company.\n[[COMPANY_NAME]]\n[[COMPANY_PHONE]]\n[[COMPANY_WEBSITE]]", 'bookly' ),
                'active'  => 1,
            ),
            array(
                'gateway' => 'sms',
                'type'    => 'staff_pending_appointment',
                'subject' => '',
                'message' => __( "Hello.\nYou have new booking.\nService: [[SERVICE_NAME]]\nDate: [[APPOINTMENT_DATE]]\nTime: [[APPOINTMENT_TIME]]\nClient name: [[CLIENT_NAME]]\nClient phone: [[CLIENT_PHONE]]\nClient email: [[CLIENT_EMAIL]]", 'bookly' ),
                'active'  => 0,
            ),
            array(
                'gateway' => 'sms',
                'type'    => 'client_cancelled_appointment',
                'subject' => '',
                'message' => __( "Dear [[CLIENT_NAME]].\nYou have cancelled your booking of [[SERVICE_NAME]] on [[APPOINTMENT_DATE]] at [[APPOINTMENT_TIME]].\nThank you for choosing our company.\n[[COMPANY_NAME]]\n[[COMPANY_PHONE]]\n[[COMPANY_WEBSITE]]", 'bookly' ),
                'active'  => 0,
            )
        );
        foreach ( $notifications as $data ) {
            $notification = new Lib\Entities\Notification( $data );
            $notification->save();
        }
        $notification_types = array(
            'client_new_appointment' => 'client_approved_appointment',
            'staff_new_appointment'  => 'staff_approved_appointment',
        );
        foreach ( $notification_types as $deprecated => $name ) {
            $wpdb->update( Lib\Entities\Notification::getTableName(), array( 'type' => $name ), array( 'type' => $deprecated ) );
        }

        $l10n_strings = array(
            'email_client_new_appointment'         => 'email_client_approved_appointment',
            'email_client_new_appointment_subject' => 'email_client_approved_appointment_subject',
            'email_staff_new_appointment'          => 'email_staff_approved_appointment',
            'email_staff_new_appointment_subject'  => 'email_staff_approved_appointment_subject',
            'sms_client_new_appointment'           => 'sms_client_approved_appointment',
            'sms_staff_new_appointment'            => 'sms_staff_approved_appointment',
        );
        $this->rename_l10n_strings( $l10n_strings );

        $ab_cart_show_columns = array(
            'service'  => array( 'show' => 0 ),
            'date'     => array( 'show' => 0 ),
            'time'     => array( 'show' => 0 ),
            'employee' => array( 'show' => 0 ),
            'price'    => array( 'show' => 0 ),
        );
        foreach ( (array) get_option( 'ab_cart_show_columns' ) as $column ) {
            $ab_cart_show_columns[ $column ]['show'] = 1;
        }
        update_option( 'ab_cart_show_columns', $ab_cart_show_columns );
    }

    function update_8_5()
    {
        global $wpdb;
        if ( Lib\Plugin::version() != '8.4.1' ) {
            $wpdb->query( 'ALTER TABLE ' . Lib\Entities\Service::getTableName() . ' ADD COLUMN info TEXT NULL' );

            // Mollie - online payments system.
            add_option( 'ab_mollie', 'disabled' );
            add_option( 'ab_mollie_api_key', '' );
            $wpdb->query( 'ALTER TABLE ' . Lib\Entities\Payment::getTableName() . " CHANGE COLUMN `type` `type` ENUM('local','coupon','paypal','authorizeNet','stripe','2checkout','payulatam','payson','mollie') NOT NULL DEFAULT 'local'" );

            add_option( 'ab_settings_cron_reminder', array( 'client_follow_up' => 21, 'client_reminder' => 18, 'staff_agenda' => 18 ) );
            add_option( 'ab_cart_show_columns', array( 'service', 'date', 'time', 'employee', 'price' ) );
        }
        $wpdb->query( 'ALTER TABLE ' . Lib\Entities\CustomerAppointment::getTableName() . ' ADD COLUMN extras TEXT NULL' );
        $wpdb->query( 'ALTER TABLE ' . Lib\Entities\Appointment::getTableName() . ' ADD COLUMN extras_duration INT NOT NULL DEFAULT 0' );
        $wpdb->query( 'ALTER TABLE ' . Lib\Entities\Holiday::getTableName() . ' DROP COLUMN title' );
        $this->rename_options( array( 'ab_settings_cart_enabled' => 'ab_settings_step_cart_enabled' ) );
        $this->register_l10n_options( array( 'ab_appearance_text_label_pay_mollie' => __( 'I will pay now with Mollie', 'bookly' ) ) );
    }

    function update_8_4()
    {
        global $wpdb;
        if ( get_option( 'ab_custom_fields_per_service', null ) === null ) {
            $ab_custom_fields = (array) json_decode( get_option( 'ab_custom_fields' ), true );
            foreach ( $ab_custom_fields as &$field ) {
                $field['services'] = array();
            }
            update_option( 'ab_custom_fields', json_encode( $ab_custom_fields ) );

            add_option( 'ab_custom_fields_per_service', '0' );
        }
        $options = array(
            'ab_appearance_text_required_service'  => __( 'Please select a service',   'bookly' ),
            'ab_appearance_text_required_name'     => __( 'Please tell us your name',  'bookly' ),
            'ab_appearance_text_required_phone'    => __( 'Please tell us your phone', 'bookly' ),
            'ab_appearance_text_required_email'    => __( 'Please tell us your email', 'bookly' )
        );
        foreach ( $options as $option_name => $option_value ) {
            add_option( $option_name, $option_value );
            do_action( 'wpml_register_single_string', 'bookly', $option_name, $option_value );
        }

        $wpdb->query( 'ALTER TABLE ' . Lib\Entities\Staff::getTableName() . ' ADD COLUMN info TEXT NULL' );
    }

    function update_8_3()
    {
        $options = array(
            'ab_appearance_text_button_next'  => __( 'Next', 'bookly' ),
            'ab_appearance_text_button_back'  => __( 'Back', 'bookly' ),
            'ab_appearance_text_button_apply' => __( 'Apply', 'bookly' ),
            'ab_appearance_text_button_book_more' => __( 'Book More', 'bookly' )
        );
        foreach ( $options as $option_name => $option_value ) {
            add_option( $option_name, $option_value );
            do_action( 'wpml_register_single_string', 'bookly', $option_name, $option_value );
        }
    }

    function update_8_1()
    {
        global $wpdb;

        add_option( 'ab_payson_funding', array( 'CREDITCARD' ) );
        add_option( 'ab_settings_cart_enabled', '0' );
        add_option( 'ab_appearance_text_step_cart', __( 'Cart', 'bookly' ) );
        add_option( 'ab_appearance_text_info_cart_step', __( "Below you can find a list of services selected for booking.\nClick BOOK MORE if you want to add more services.", 'bookly' ) );
        do_action( 'wpml_register_single_string', 'bookly', 'ab_appearance_text_step_cart', get_option( 'ab_appearance_text_step_cart' ) );
        do_action( 'wpml_register_single_string', 'bookly', 'ab_appearance_text_info_cart_step', get_option( 'ab_appearance_text_info_cart_step' ) );
        $options = array(
            'ab_appearance_text_info_first_step'       => 'ab_appearance_text_info_service_step',
            'ab_appearance_text_info_second_step'      => 'ab_appearance_text_info_time_step',
            'ab_appearance_text_info_third_step'       => 'ab_appearance_text_info_details_step',
            'ab_appearance_text_info_third_step_guest' => 'ab_appearance_text_info_details_step_guest',
            'ab_appearance_text_info_fourth_step'      => 'ab_appearance_text_info_payment_step',
            'ab_appearance_text_info_fifth_step'       => 'ab_appearance_text_info_complete_step',
            'ab_woocommerce'                           => 'ab_woocommerce_enabled'
        );
        $this->rename_options( $options );
        unset( $options['ab_woocommerce'] );
        $this->rename_l10n_strings( $options );
    }

    function update_8_0()
    {
        global $wpdb;

        $wpdb->query( 'ALTER TABLE ' . Lib\Entities\CustomerAppointment::getTableName() . ' ADD COLUMN `locale` VARCHAR(8) NULL' );

        add_option( 'ab_settings_minimum_time_prior_cancel', '0' );
        add_option( 'ab_settings_cancel_denied_page_url', home_url() );

        add_option( 'ab_sms_auto_recharge_balance', '0' );
        add_option( 'ab_sms_auto_recharge_amount', '0' );
        add_option( 'ab_sms_notify_low_balance', 1 );

        foreach ( json_decode( get_option( 'ab_custom_fields', array() ) ) as $custom_field ) {
            switch ( $custom_field->type ) {
                case 'textarea':
                case 'text-field':
                case 'captcha':
                    do_action( 'wpml_register_single_string', 'bookly', 'custom_field_' . $custom_field->id . '_' . sanitize_title( $custom_field->label ), $custom_field->label );
                    break;
                case 'checkboxes':
                case 'radio-buttons':
                case 'drop-down':
                    do_action( 'wpml_register_single_string', 'bookly', 'custom_field_' . $custom_field->id . '_' . sanitize_title( $custom_field->label ), $custom_field->label );
                    foreach ( $custom_field->items as $label ) {
                        do_action( 'wpml_register_single_string', 'bookly', 'custom_field_' . $custom_field->id . '_' . sanitize_title( $custom_field->label ) . '=' . sanitize_title( $label ), $label );
                    }
                    break;
            }
        }
    }

    function update_7_8_2()
    {
        global $wpdb;

        $wpdb->query( 'UPDATE ' . Lib\Entities\CustomerAppointment::getTableName() .' SET custom_fields = "[]" WHERE custom_fields IS NULL or custom_fields = ""' );
    }

    function update_7_8()
    {
        global $wpdb;
        $wpdb->query( 'ALTER TABLE ' . Lib\Entities\Payment::getTableName() . " ADD COLUMN `status` ENUM('completed','pending') NOT NULL DEFAULT 'completed'" );
        $wpdb->query( 'ALTER TABLE ' . Lib\Entities\Payment::getTableName() . " CHANGE COLUMN `type` `type` ENUM('local','coupon','paypal','authorizeNet','stripe','2checkout','payulatam','payson') NOT NULL DEFAULT 'local'" );

        // PayU Latam - online payments system.
        add_option( 'ab_payulatam', 'disabled' );
        add_option( 'ab_payulatam_sandbox', '0' );
        add_option( 'ab_payulatam_api_account_id',  '' );
        add_option( 'ab_payulatam_api_key', '' );
        add_option( 'ab_payulatam_api_merchant_id', '' );

        // Payson - online payments system.
        add_option( 'ab_payson', 'disabled' );
        add_option( 'ab_payson_sandbox', '0' );
        add_option( 'ab_payson_fees_payer', 'PRIMARYRECEIVER' );
        add_option( 'ab_payson_api_agent_id', '' );
        add_option( 'ab_payson_api_key', '' );
        add_option( 'ab_payson_api_receiver_email', '' );
    }

    function update_7_7_2()
    {
        if ( get_option( 'ab_settings_pay_locally' ) == 0 ) {
            update_option( 'ab_settings_pay_locally', 'disabled' );
        }
    }

    function update_7_7()
    {
        global $wpdb;

        $wpdb->query( "ALTER TABLE " . Lib\Entities\Payment::getTableName() . " CHANGE COLUMN `type` `type` ENUM('local','coupon','paypal','authorizeNet','stripe','2checkout') NOT NULL DEFAULT 'local'" );
        $wpdb->query( "ALTER TABLE " . Lib\Entities\Payment::getTableName() . " CHANGE COLUMN `transaction` `transaction_id` VARCHAR(255) NOT NULL" );

        add_option( 'ab_currency', get_option( 'ab_paypal_currency', 'USD' ) );
        add_option( 'ab_2checkout', 'disabled' );
        add_option( 'ab_2checkout_sandbox', '0' );
        add_option( 'ab_2checkout_api_seller_id', '' );
        add_option( 'ab_2checkout_api_secret_word', '' );
        add_option( 'ab_stripe_publishable_key', '' );
        if ( get_option( 'ab_stripe' ) == 0 ) {
            update_option( 'ab_stripe', 'disabled' );
        }
        delete_option( 'ab_paypal_currency' );

        add_option( 'ab_appearance_text_label_pay_paypal',   __( 'I will pay now with PayPal', 'bookly' ) );
        add_option( 'ab_appearance_text_label_pay_ccard',    __( 'I will pay now with Credit Card', 'bookly' ) );
        add_option( 'ab_appearance_text_label_ccard_number', __( 'Credit Card Number',  'bookly' ) );
        add_option( 'ab_appearance_text_label_ccard_expire', __( 'Expiration Date',     'bookly' ) );
        add_option( 'ab_appearance_text_label_ccard_code',   __( 'Card Security Code',  'bookly' ) );
        foreach ( array( 'ab_appearance_text_label_pay_paypal', 'ab_appearance_text_label_pay_ccard', 'ab_appearance_text_label_ccard_number', 'ab_appearance_text_label_ccard_expire', 'text_label_ccard_code' ) as $option_name ) {
            do_action( 'wpml_register_single_string', 'bookly', $option_name, get_option( $option_name ) );
        }
    }

    function update_7_6()
    {
        global $wpdb;

        $wpdb->query( 'ALTER TABLE ' . Lib\Entities\Service::getTableName() . ' ADD COLUMN `padding_left` INT NOT NULL DEFAULT 0, ADD COLUMN `padding_right` INT NOT NULL DEFAULT 0' );
    }

    function update_7_4()
    {
        add_option( 'ab_email_content_type', 'html' );
        add_option( 'ab_email_notification_reply_to_customers', '1' );
    }

    function update_7_3()
    {
        add_option( 'ab_appearance_text_info_third_step_guest', '' );

        $staff_members = Lib\Entities\Staff::query( 's' )->select( 's.id, s.full_name' )->fetchArray();
        foreach ( $staff_members as $staff ) {
            do_action( 'wpml_register_single_string', 'bookly', 'staff_' . $staff['id'], $staff['full_name'] );
        }
        $categories = Lib\Entities\Category::query( 'c' )->select( 'c.id, c.name' )->fetchArray();
        foreach ( $categories as $category ) {
            do_action( 'wpml_register_single_string', 'bookly', 'category_' . $category['id'], $category['name'] );
        }
        $services = Lib\Entities\Service::query( 's' )->select( 's.id, s.title' )->fetchArray();
        foreach ( $services as $service ) {
            do_action( 'wpml_register_single_string', 'bookly', 'service_' . $service['id'], $service['title'] );
        }
    }

    function update_7_1()
    {
        global $wpdb;

        // Register notifications for translate in WPML.
        $notifications = Lib\Entities\Notification::query( 'n' )->select( 'n.gateway, n.type, n.subject, n.message');
        foreach( $notifications->fetchArray() as $notification ){
            do_action( 'wpml_register_single_string', 'bookly', $notification['gateway'].'_'.$notification['type'], $notification['message'] );
            if ( $notification['gateway'] == 'email' ) {
                do_action( 'wpml_register_single_string', 'bookly', $notification['gateway'].'_'.$notification['type'].'_subject', $notification['subject'] );
            }
        }
        $options = $wpdb->get_results( 'SELECT option_value, option_name FROM '.$wpdb->options.' WHERE option_name LIKE \'ab_appearance_text_%\'' );
        foreach ( $options as $option ) {
            do_action( 'wpml_register_single_string', 'bookly', $option->option_name, $option->option_value );
        }

        add_option( 'ab_settings_phone_default_country', 'auto' );
    }

    function update_7_0_1()
    {
        global $wpdb;
        // Recreate tables with constraints if they do not exist due to "Identifier name 'XXX' is too long".
        $wpdb->query(
            'CREATE TABLE IF NOT EXISTS `' . Lib\Entities\Service::getTableName() . '` (
                `id`          INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `title`       VARCHAR(255) DEFAULT "",
                `duration`    INT NOT NULL DEFAULT 900,
                `price`       DECIMAL(10,2) NOT NULL DEFAULT 0.00,
                `color`       VARCHAR(255) NOT NULL DEFAULT "#FFFFFF",
                `category_id` INT UNSIGNED,
                `capacity`    INT NOT NULL DEFAULT 1,
                `position`    INT NOT NULL DEFAULT 9999,
                CONSTRAINT
                    FOREIGN KEY (category_id)
                    REFERENCES ' . Lib\Entities\Category::getTableName() . '(id)
                    ON DELETE SET NULL
                    ON UPDATE CASCADE
            ) ENGINE = INNODB
            DEFAULT CHARACTER SET = utf8
            COLLATE = utf8_general_ci'
        );

        $wpdb->query(
            'CREATE TABLE IF NOT EXISTS `' . Lib\Entities\StaffService::getTableName() . '` (
                `id`         INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `staff_id`   INT UNSIGNED NOT NULL,
                `service_id` INT UNSIGNED NOT NULL,
                `price`      DECIMAL(10,2) NOT NULL DEFAULT 0.00,
                `capacity`   INT NOT NULL DEFAULT 1,
                UNIQUE KEY unique_ids_idx (staff_id, service_id),
                CONSTRAINT
                    FOREIGN KEY (staff_id)
                    REFERENCES ' . Lib\Entities\Staff::getTableName() . '(id)
                    ON DELETE CASCADE
                    ON UPDATE CASCADE,
                CONSTRAINT
                    FOREIGN KEY (service_id)
                    REFERENCES ' . Lib\Entities\Service::getTableName() . '(id)
                    ON DELETE CASCADE
                    ON UPDATE CASCADE
            ) ENGINE = INNODB
            DEFAULT CHARACTER SET = utf8
            COLLATE = utf8_general_ci'
        );

        $wpdb->query(
            'CREATE TABLE IF NOT EXISTS `' . Lib\Entities\StaffScheduleItem::getTableName() . '` (
                `id`         INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `staff_id`   INT UNSIGNED NOT NULL,
                `day_index`  INT UNSIGNED NOT NULL,
                `start_time` TIME,
                `end_time`   TIME,
                UNIQUE KEY unique_ids_idx (staff_id, day_index),
                CONSTRAINT
                    FOREIGN KEY (staff_id)
                    REFERENCES ' . Lib\Entities\Staff::getTableName() . '(id)
                    ON DELETE CASCADE
                    ON UPDATE CASCADE
             ) ENGINE = INNODB
             DEFAULT CHARACTER SET = utf8
             COLLATE = utf8_general_ci'
        );

        $wpdb->query(
            'CREATE TABLE IF NOT EXISTS `' . Lib\Entities\ScheduleItemBreak::getTableName() . '` (
                `id`                     INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `staff_schedule_item_id` INT UNSIGNED NOT NULL,
                `start_time`             TIME,
                `end_time`               TIME,
                CONSTRAINT
                    FOREIGN KEY (staff_schedule_item_id)
                    REFERENCES ' . Lib\Entities\StaffScheduleItem::getTableName() . '(id)
                    ON DELETE CASCADE
                    ON UPDATE CASCADE
             ) ENGINE = INNODB
             DEFAULT CHARACTER SET = utf8
             COLLATE = utf8_general_ci'
        );

        $wpdb->query(
            'CREATE TABLE IF NOT EXISTS `' . Lib\Entities\Appointment::getTableName() . '` (
                `id`              INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `staff_id`        INT UNSIGNED NOT NULL,
                `service_id`      INT UNSIGNED,
                `start_date`      DATETIME NOT NULL,
                `end_date`        DATETIME NOT NULL,
                `google_event_id` VARCHAR(255) DEFAULT NULL,
                CONSTRAINT
                    FOREIGN KEY (staff_id)
                    REFERENCES ' . Lib\Entities\Staff::getTableName() . '(id)
                    ON DELETE CASCADE
                    ON UPDATE CASCADE,
                CONSTRAINT
                    FOREIGN KEY (service_id)
                    REFERENCES ' . Lib\Entities\Service::getTableName() . '(id)
                    ON DELETE CASCADE
                    ON UPDATE CASCADE
            ) ENGINE = INNODB
            DEFAULT CHARACTER SET = utf8
            COLLATE = utf8_general_ci'
        );

        $wpdb->query(
            'CREATE TABLE IF NOT EXISTS `' . Lib\Entities\Holiday::getTableName() . '` (
                  `id`           INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                  `staff_id`     INT UNSIGNED NULL DEFAULT NULL,
                  `parent_id`    INT UNSIGNED NULL DEFAULT NULL,
                  `date`         DATE NOT NULL,
                  `repeat_event` TINYINT(1) NOT NULL DEFAULT 0,
                  `title`        VARCHAR(255) DEFAULT "",
                  CONSTRAINT
                      FOREIGN KEY (staff_id)
                      REFERENCES ' . Lib\Entities\Staff::getTableName() . '(id)
                      ON DELETE CASCADE
              ) ENGINE = INNODB
              DEFAULT CHARACTER SET = utf8
              COLLATE = utf8_general_ci'
        );

        $wpdb->query(
            'CREATE TABLE IF NOT EXISTS `' . Lib\Entities\CustomerAppointment::getTableName() . '` (
                `id`                INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `customer_id`       INT UNSIGNED NOT NULL,
                `appointment_id`    INT UNSIGNED NOT NULL,
                `number_of_persons` INT UNSIGNED NOT NULL DEFAULT 1,
                `custom_fields`     TEXT,
                `coupon_code`       VARCHAR(255) DEFAULT NULL,
                `coupon_discount`   DECIMAL(10,2) DEFAULT NULL,
                `coupon_deduction`  DECIMAL(10,2) DEFAULT NULL,
                `token`             VARCHAR(255) DEFAULT NULL,
                `time_zone_offset`  INT,
                CONSTRAINT
                    FOREIGN KEY (customer_id)
                    REFERENCES  ' . Lib\Entities\Customer::getTableName() . '(id)
                    ON DELETE   CASCADE
                    ON UPDATE   CASCADE,
                CONSTRAINT
                    FOREIGN KEY (appointment_id)
                    REFERENCES  ' . Lib\Entities\Appointment::getTableName() . '(id)
                    ON DELETE   CASCADE
                    ON UPDATE   CASCADE
            ) ENGINE = INNODB
            DEFAULT CHARACTER SET = utf8
            COLLATE = utf8_general_ci'
        );

        $wpdb->query(
            'CREATE TABLE IF NOT EXISTS `' . Lib\Entities\Payment::getTableName() . '` (
                `id`                      INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `created`                 DATETIME NOT NULL,
                `type`                    ENUM("local","coupon","paypal","authorizeNet","stripe") NOT NULL DEFAULT "local",
                `customer_appointment_id` INT UNSIGNED NOT NULL,
                `token`                   VARCHAR(255) NOT NULL,
                `transaction`             VARCHAR(255) NOT NULL,
                `total`                   DECIMAL(10,2) NOT NULL DEFAULT 0.00,
                CONSTRAINT
                    FOREIGN KEY (customer_appointment_id)
                    REFERENCES  ' . Lib\Entities\CustomerAppointment::getTableName() . '(id)
                    ON DELETE   CASCADE
                    ON UPDATE   CASCADE
            ) ENGINE = INNODB
            DEFAULT CHARACTER SET = utf8
            COLLATE = utf8_general_ci'
        );

        $wpdb->query(
            'CREATE TABLE IF NOT EXISTS `' . Lib\Entities\SentNotification::getTableName() . '` (
                `id`                      INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `customer_appointment_id` INT UNSIGNED,
                `staff_id`                INT UNSIGNED,
                `gateway`                 ENUM("email","sms") NOT NULL DEFAULT "email",
                `type`                    VARCHAR(60) NOT NULL,
                `created`                 DATETIME NOT NULL,
                CONSTRAINT
                    FOREIGN KEY (customer_appointment_id)
                    REFERENCES  ' . Lib\Entities\CustomerAppointment::getTableName() . '(id)
                    ON DELETE   CASCADE
                    ON UPDATE   CASCADE,
                CONSTRAINT
                    FOREIGN KEY (staff_id)
                    REFERENCES  ' . Lib\Entities\Staff::getTableName() . '(id)
                    ON DELETE   CASCADE
                    ON UPDATE   CASCADE
              ) ENGINE = INNODB
              DEFAULT CHARACTER SET = utf8
              COLLATE = utf8_general_ci'
        );
    }

    function update_7_0()
    {
        global $wpdb;

        $wpdb->query( 'ALTER TABLE `ab_customer_appointment` ADD `coupon_deduction` DECIMAL(10,2) DEFAULT NULL AFTER `coupon_discount`' );
        $wpdb->query( 'ALTER TABLE `ab_coupons` CHANGE COLUMN `used` `used` INT UNSIGNED NOT NULL DEFAULT 0,
                       ADD COLUMN `deduction` DECIMAL(10,2) NOT NULL DEFAULT 0 AFTER `discount`,
                       ADD COLUMN `usage_limit` INT UNSIGNED NOT NULL DEFAULT 1' );

        $wpdb->query( 'ALTER TABLE `ab_notifications` CHANGE `slug` `type` VARCHAR(255) NOT NULL DEFAULT ""' );

        // SMS.
        $wpdb->query( 'ALTER TABLE `ab_notifications` ADD `gateway` ENUM("email","sms") NOT NULL DEFAULT "email"' );
        $wpdb->query( 'UPDATE `ab_notifications` SET `gateway` = "email"' );
        $sms_notifies = array(
            array(
                'type'    => 'client_new_appointment',
                'message' => __( "Dear [[CLIENT_NAME]].\nThis is confirmation that you have booked [[SERVICE_NAME]].\nWe are waiting you at [[COMPANY_ADDRESS]] on [[APPOINTMENT_DATE]] at [[APPOINTMENT_TIME]].\nThank you for choosing our company.\n[[COMPANY_NAME]]\n[[COMPANY_PHONE]]\n[[COMPANY_WEBSITE]]", 'bookly' ),
                'active'  => 1,
            ),
            array(
                'type'    => 'staff_new_appointment',
                'message' => __( "Hello.\nYou have new booking.\nService: [[SERVICE_NAME]]\nDate: [[APPOINTMENT_DATE]]\nTime: [[APPOINTMENT_TIME]]\nClient name: [[CLIENT_NAME]]\nClient phone: [[CLIENT_PHONE]]\nClient email: [[CLIENT_EMAIL]]", 'bookly' ),
                'active'  => 0,
            ),
            array(
                'type'    => 'client_reminder',
                'message' => __( "Dear [[CLIENT_NAME]].\nWe would like to remind you that you have booked [[SERVICE_NAME]] tomorrow on [[APPOINTMENT_TIME]]. We are waiting you at [[COMPANY_ADDRESS]].\nThank you for choosing our company.\n[[COMPANY_NAME]]\n[[COMPANY_PHONE]]\n[[COMPANY_WEBSITE]]", 'bookly' ),
                'active'  => 0,
            ),
            array(
                'type'    => 'client_follow_up',
                'message' => __( "Dear [[CLIENT_NAME]].\nThank you for choosing [[COMPANY_NAME]]. We hope you were satisfied with your [[SERVICE_NAME]].\nThank you and we look forward to seeing you again soon.\n[[COMPANY_NAME]]\n[[COMPANY_PHONE]]\n[[COMPANY_WEBSITE]]", 'bookly' ),
                'active'  => 0,
            ),
            array(
                'type'    => 'staff_agenda',
                'message' => __( "Hello.\nYour agenda for tomorrow is:\n[[NEXT_DAY_AGENDA]]", 'bookly' ),
                'active'  => 0,
            ),
            array(
                'type'    => 'staff_cancelled_appointment',
                'message' => __( "Hello.\nThe following booking has been cancelled.\nService: [[SERVICE_NAME]]\nDate: [[APPOINTMENT_DATE]]\nTime: [[APPOINTMENT_TIME]]\nClient name: [[CLIENT_NAME]]\nClient phone: [[CLIENT_PHONE]]\nClient email: [[CLIENT_EMAIL]]", 'bookly' ),
                'active'  => 0,
            ),
            array(
                'type'    => 'client_new_wp_user',
                'message' => __( "Hello.\nAn account was created for you at [[SITE_ADDRESS]]\nYour user details:\nuser: [[NEW_USERNAME]]\npassword: [[NEW_PASSWORD]]\n\nThanks.", 'bookly' ),
                'active'  => 1,
            ),
        );
        // Insert notifications.
        foreach ( $sms_notifies as $data ) {
            $wpdb->insert( 'ab_notifications', array(
                'gateway' => 'sms',
                'type'    => $data['type'],
                'subject' => '',
                'message' => $data['message'],
                'active'  => $data['active'],
            ) );
        }

        // Rename notifications.
        $notifications = array(
            'client_info'        => 'client_new_appointment',
            'provider_info'      => 'staff_new_appointment',
            'evening_next_day'   => 'client_reminder',
            'evening_after'      => 'client_follow_up',
            'event_next_day'     => 'staff_agenda',
            'cancel_appointment' => 'staff_cancelled_appointment',
            'new_wp_user'        => 'client_new_wp_user'
        );
        foreach ( $notifications as $from => $to ) {
            $wpdb->query( "UPDATE `ab_notifications` SET `type` = '$to' WHERE `type` = '$from'" );
        }

        $this->drop( 'ab_email_notification' );

        // Rename tables.
        $ab_tables = array(
            'ab_appointment'          => Lib\Entities\Appointment::getTableName(),
            'ab_category'             => Lib\Entities\Category::getTableName(),
            'ab_coupons'              => Lib\Entities\Coupon::getTableName(),
            'ab_customer'             => Lib\Entities\Customer::getTableName(),
            'ab_customer_appointment' => Lib\Entities\CustomerAppointment::getTableName(),
            'ab_holiday'              => Lib\Entities\Holiday::getTableName(),
            'ab_notifications'        => Lib\Entities\Notification::getTableName(),
            'ab_payment'              => Lib\Entities\Payment::getTableName(),
            'ab_schedule_item_break'  => Lib\Entities\ScheduleItemBreak::getTableName(),
            'ab_service'              => Lib\Entities\Service::getTableName(),
            'ab_staff'                => Lib\Entities\Staff::getTableName(),
            'ab_staff_schedule_item'  => Lib\Entities\StaffScheduleItem::getTableName(),
            'ab_staff_service'        => Lib\Entities\StaffService::getTableName(),
        );
        foreach ( $ab_tables as $from => $to ) {
            $wpdb->query( "ALTER TABLE `{$from}` RENAME TO `{$to}`" );
        }

        $wpdb->query(
            "CREATE TABLE IF NOT EXISTS  `" . Lib\Entities\SentNotification::getTableName() . "` (
                `id`                      INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `customer_appointment_id` INT UNSIGNED,
                `staff_id`                INT UNSIGNED,
                `gateway`                 ENUM('email','sms') NOT NULL DEFAULT 'email',
                `type`                    VARCHAR(60) NOT NULL,
                `created`                 DATETIME NOT NULL,
                CONSTRAINT fk_" . Lib\Entities\SentNotification::getTableName() . "_" . Lib\Entities\CustomerAppointment::getTableName() . "_id
                    FOREIGN KEY (customer_appointment_id)
                    REFERENCES  " . Lib\Entities\CustomerAppointment::getTableName() . "(id)
                    ON DELETE   CASCADE
                    ON UPDATE   CASCADE,
                CONSTRAINT fk_" . Lib\Entities\SentNotification::getTableName() . "_" . Lib\Entities\Staff::getTableName() . "_id
                    FOREIGN KEY (staff_id)
                    REFERENCES  " . Lib\Entities\Staff::getTableName() . "(id)
                    ON DELETE   CASCADE
                    ON UPDATE   CASCADE
              ) ENGINE = INNODB
              DEFAULT CHARACTER SET = utf8
              COLLATE = utf8_general_ci"
        );

        // Google Calendar.
        add_option( 'ab_settings_google_event_title', '[[SERVICE_NAME]]' );
        // Link assets.
        add_option( 'ab_settings_link_assets_method', 'enqueue' );
        // SMS.
        add_option( 'ab_sms_default_country_code', '' );
    }

    function update_6_2()
    {
        global $wpdb;

        $wpdb->query( 'ALTER TABLE `ab_holiday` CHANGE `holiday` `date` DATE NOT NULL' );

        $wpdb->query(
            "CREATE TABLE IF NOT EXISTS  `ab_email_notification` (
                `id`                      INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `customer_appointment_id` INT UNSIGNED,
                `staff_id`                INT UNSIGNED,
                `type`                    VARCHAR(60) NOT NULL,
                `created`                 DATETIME NOT NULL,
                CONSTRAINT fk_ab_email_notification_customer_appointment_id
                    FOREIGN KEY (customer_appointment_id)
                    REFERENCES  ab_customer_appointment(id)
                    ON DELETE   CASCADE
                    ON UPDATE   CASCADE,
                CONSTRAINT fk_ab_email_notification_staff_id
                    FOREIGN KEY (staff_id)
                    REFERENCES  ab_staff(id)
                    ON DELETE   CASCADE
                    ON UPDATE   CASCADE
              ) ENGINE = INNODB
              DEFAULT CHARACTER SET = utf8
              COLLATE = utf8_general_ci"
        );
    }

    function update_6_0()
    {
        // WooCommerce.
        add_option( 'ab_woocommerce', '0' );
        add_option( 'ab_woocommerce_product', '' );
        add_option( 'ab_woocommerce_cart_info_name',  __( 'Appointment', 'bookly' ) );
        add_option( 'ab_woocommerce_cart_info_value', __( 'Date', 'bookly' ) . ": [[APPOINTMENT_DATE]]\n" . __( 'Time', 'bookly' ) . ": [[APPOINTMENT_TIME]]\n" . __( 'Service', 'bookly' ) . ": [[SERVICE_NAME]]" );
        // Staff Members Profile.
        add_option( 'ab_settings_allow_staff_members_edit_profile', 0 );
    }

    function update_5_0()
    {
        global $wpdb;

        // User profiles.
        add_option('ab_settings_create_account', 0, '', 'yes');
        $wpdb->query('ALTER TABLE `ab_customer` ADD `wp_user_id` BIGINT(20) UNSIGNED');
        // Move coupons from ab_payment to ab_customer_appointment.
        $wpdb->query('ALTER TABLE `ab_customer_appointment` ADD `coupon_code` VARCHAR(255) DEFAULT NULL');
        $wpdb->query('ALTER TABLE `ab_customer_appointment` ADD `coupon_discount` DECIMAL(10,2) DEFAULT NULL');
        $payments = $wpdb->get_results( 'SELECT * FROM `ab_payment`', ARRAY_A );
        foreach ( $payments as $payment ) {
            if ( $payment['coupon'] ) {
                $discount = $wpdb->get_var( $wpdb->prepare( 'SELECT `discount` FROM `ab_coupons` WHERE `code` = %s', $payment['coupon'] ) );
                $wpdb->update(
                    'ab_customer_appointment',
                    array(
                        'coupon_code' => $payment['coupon'],
                        'coupon_discount' => $discount ?: 0
                    ),
                    array( 'id' => $payment['customer_appointment_id'] )
                );
            }
        }
        $wpdb->query('ALTER TABLE `ab_payment` DROP `coupon`');
        // New notifications.
        $wpdb->insert( 'ab_notifications', array(
            'slug'    => 'cancel_appointment',
            'subject' => __( 'Booking cancellation', 'bookly' ),
            'message' => __( "Hello.\n\nThe following booking has been cancelled.\n\nService: [[SERVICE_NAME]]\nDate: [[APPOINTMENT_DATE]]\nTime: [[APPOINTMENT_TIME]]\nClient name: [[CLIENT_NAME]]\nClient phone: [[CLIENT_PHONE]]\nClient email: [[CLIENT_EMAIL]]", 'bookly' ),
            'active'  => 0,
        ) );

        $wpdb->insert( 'ab_notifications', array(
            'slug'    => 'new_wp_user',
            'subject' => __( 'New customer', 'bookly' ),
            'message' => __( "Hello.\n\nAn account was created for you at [[SITE_ADDRESS]]\n\nYour user details:\nuser: [[NEW_USERNAME]]\npassword: [[NEW_PASSWORD]]\n\nThanks.", 'bookly' ),
            'active'  => 1,
        ) );
        // Link ab_email_notification to ab_customer_appointment.
        $wpdb->query('TRUNCATE TABLE `ab_email_notification`');
        $wpdb->query('ALTER TABLE `ab_email_notification` ADD `customer_appointment_id` INT UNSIGNED');
        $wpdb->query('ALTER TABLE `ab_email_notification`
            ADD CONSTRAINT fk_ab_email_notification_customer_appointment_id
              FOREIGN KEY (customer_appointment_id)
              REFERENCES  ab_customer_appointment(id)
              ON DELETE   CASCADE
              ON UPDATE   CASCADE
        ');
        $wpdb->query('ALTER TABLE `ab_email_notification` DROP FOREIGN KEY fk_ab_email_notification_customer_id, DROP INDEX ab_email_notification_customer_id_idx');
        $wpdb->query('ALTER TABLE `ab_email_notification` DROP `customer_id`');
    }

    function update_4_6()
    {
        global $wpdb;

        add_option('ab_appearance_text_label_number_of_persons', __( 'Number of persons', 'bookly' ), '', 'yes');
        add_option('ab_settings_google_limit_events', 0, '', 'yes');
        add_option('ab_appearance_show_calendar', 0, '', 'yes');

        $wpdb->query('ALTER TABLE `ab_customer_appointment` ADD time_zone_offset INT');
        $wpdb->query('ALTER TABLE `ab_customer_appointment` ADD number_of_persons INT UNSIGNED NOT NULL DEFAULT 1');
    }

    function update_4_4()
    {
        add_option('ab_settings_maximum_available_days_for_booking', 365, '', 'yes');
    }

    function update_4_3()
    {
        global $wpdb;

        // Positioning in lists.
        $wpdb->query("ALTER TABLE `ab_staff` ADD `position` INT NOT NULL DEFAULT 9999;");
        $wpdb->query("ALTER TABLE `ab_category` ADD `position` INT NOT NULL DEFAULT 9999;");
        $wpdb->query("ALTER TABLE `ab_service` ADD `position` INT NOT NULL DEFAULT 9999;");

        add_option('ab_appearance_show_blocked_timeslots', 0, '', 'yes');
        add_option('ab_appearance_show_day_one_column', 0, '', 'yes');
    }

    function update_4_2()
    {
        global $wpdb;

        $wpdb->query( "ALTER TABLE ab_payment ADD `customer_appointment_id` INT UNSIGNED DEFAULT NULL" );
        $payments = $wpdb->get_results('SELECT id, customer_id, appointment_id from `ab_payment` ');

        foreach ($payments as $payment) {
            $customer_appointment = $wpdb->get_row($wpdb->prepare('SELECT id from `ab_customer_appointment` WHERE `customer_id` = %d and `appointment_id` = %d LIMIT 1', $payment->customer_id, $payment->appointment_id));
            if ($customer_appointment) {
                $wpdb->update('ab_payment', array('customer_appointment_id' => $customer_appointment->id), array('id' => $payment->id));
            }
        }

        $wpdb->query("ALTER TABLE ab_payment
                        DROP FOREIGN KEY fk_ab_payment_customer_id, DROP FOREIGN KEY fk_ab_payment_appointment_id, DROP customer_id, DROP appointment_id,
                        ADD INDEX ab_payment_customer_appointment_id_idx (customer_appointment_id),
                        ADD CONSTRAINT fk_ab_payment_customer_appointment_id
                          FOREIGN KEY ab_payment_customer_appointment_id_idx (customer_appointment_id)
                          REFERENCES  ab_customer_appointment(id)
                          ON DELETE   CASCADE
                          ON UPDATE   CASCADE;
            ");

        add_option('ab_appearance_text_label_pay_locally', __( 'I will pay locally', 'bookly' ), '', 'yes');
        add_option('ab_settings_google_two_way_sync', 1, '', 'yes');
    }

    function update_4_1()
    {
        add_option('ab_settings_final_step_url', '', '', 'yes');
    }

    function update_4_0()
    {
        global $wpdb;

        add_option('ab_custom_fields', '[{"type":"textarea","label":"Notes","required":false,"id":1}]', '', 'yes');

        // Create relation between customer and appointment
        $ab_customer_appointments = $wpdb->get_results('SELECT * from `ab_customer_appointment` ');
        foreach ($ab_customer_appointments as $ab_customer_appointment){
            $wpdb->update(
                'ab_customer_appointment',
                array('notes' => json_encode(array(array('id' => 1, 'value' => $ab_customer_appointment->notes)))),
                array('id' => $ab_customer_appointment->id)
            );
        }

        $wpdb->query( "ALTER TABLE ab_customer_appointment CHANGE `notes` `custom_fields` TEXT" );

        delete_option('ab_appearance_text_label_notes');

        $wpdb->query( "ALTER TABLE ab_payment CHANGE `type` `type` ENUM('local', 'coupon', 'paypal', 'authorizeNet', 'stripe') NOT NULL DEFAULT 'local';" );
    }

    function update_3_4()
    {
        global $wpdb;

        $wpdb->query("ALTER TABLE `ab_payment` DROP `status`;");

        add_option('ab_settings_minimum_time_prior_booking', 0, '', 'yes');

        delete_option('ab_settings_no_current_day_appointments');
    }

    function update_3_2()
    {
        global $wpdb;

        // Google Calendar oAuth.
        $wpdb->query("ALTER TABLE `ab_staff` DROP `google_user`, DROP `google_PASS`;");
        $wpdb->query("ALTER TABLE `ab_staff` ADD `google_data` VARCHAR(255) DEFAULT NULL, ADD `google_calendar_id` VARCHAR(255) DEFAULT NULL;");
        $wpdb->query("ALTER TABLE `ab_appointment` ADD `google_event_id` VARCHAR(255) DEFAULT NULL;");

        // Coupons
        $wpdb->query("
            CREATE TABLE IF NOT EXISTS ab_coupons (
                id        INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                code      VARCHAR ( 255 ) NOT NULL DEFAULT '',
                discount  DECIMAL( 3, 0 ) NOT NULL DEFAULT  '0',
                used      TINYINT ( 1 ) NOT NULL DEFAULT '0'
            ) ENGINE = INNODB
            DEFAULT CHARACTER SET = utf8
            COLLATE = utf8_general_ci;");

        $wpdb->query("ALTER TABLE `ab_payment` ADD `coupon` VARCHAR(255) DEFAULT NULL;");

        add_option('ab_appearance_text_label_coupon', __( 'Coupon', 'bookly' ), '', 'yes');
        add_option('ab_appearance_text_info_coupon', __( 'The price for the service is [[SERVICE_PRICE]].', 'bookly' ), '', 'yes');
        add_option('ab_settings_coupons', '0', '', 'yes');
        add_option('ab_settings_google_client_id', '', '', 'yes');
        add_option('ab_settings_google_client_secret', '', '', 'yes');
    }

    function update_3_0()
    {
        global $wpdb;

        // Create new table with foreign keys
        $wpdb->query(
            "CREATE TABLE IF NOT EXISTS ab_customer_appointment (
                id              INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                customer_id     INT UNSIGNED NOT NULL,
                appointment_id  INT UNSIGNED NOT NULL,
                notes TEXT,
                token VARCHAR(255) DEFAULT NULL,
                INDEX ab_customer_appointment_customer_id_idx (customer_id),
                INDEX ab_customer_appointment_appointment_id_idx (appointment_id),
                CONSTRAINT fk_ab_customer_appointment_customer_id
                  FOREIGN KEY ab_customer_appointment_customer_id_idx (customer_id)
                  REFERENCES  ab_customer(id)
                  ON DELETE   CASCADE
                  ON UPDATE   CASCADE,
                CONSTRAINT fk_ab_customer_appointment_appointment_id
                  FOREIGN KEY ab_customer_appointment_appointment_id_idx (appointment_id)
                  REFERENCES  ab_appointment(id)
                  ON DELETE   CASCADE
                  ON UPDATE   CASCADE
            ) ENGINE = INNODB
            DEFAULT CHARACTER SET = utf8
            COLLATE = utf8_general_ci"
        );

        // Create relation between customer and appointment
        $appointments = $wpdb->get_results('SELECT * from `ab_appointment` ');
        foreach ($appointments as $appointment){
            $wpdb->insert('ab_customer_appointment', array(
                'customer_id'   => $appointment->customer_id,
                'appointment_id'=> $appointment->id,
                'notes'         => $appointment->notes,
                'token'         => $appointment->token
            ));
        }

        // Refactor binding from customer to appointment (many - many)
        $wpdb->query("ALTER TABLE ab_appointment DROP FOREIGN KEY fk_ab_appointment_customer_id;");
        $wpdb->query("ALTER TABLE ab_appointment DROP customer_id, DROP notes, DROP token;");

        // Add Service and Staff capacity
        $wpdb->query("ALTER TABLE ab_service ADD capacity INT NOT NULL DEFAULT '1';");
        $wpdb->query("ALTER TABLE ab_staff_service ADD capacity INT NOT NULL DEFAULT '1';");

        // Delete table ab_payment_appointment
        $wpdb->query("ALTER TABLE ab_payment ADD appointment_id INT UNSIGNED DEFAULT NULL;");

        $payments_appointment = $wpdb->get_results('SELECT * from ab_payment_appointment ');
        foreach ($payments_appointment as $payment_appointment) {
            $wpdb->update('ab_payment', array('appointment_id' => $payment_appointment->appointment_id), array('id' => $payment_appointment->payment_id));
        }

        $wpdb->query('DROP TABLE ab_payment_appointment');

        $wpdb->query('
            ALTER TABLE `ab_payment`
            ADD INDEX ab_payment_appointment_id_idx ( `appointment_id` ),
            ADD CONSTRAINT fk_ab_payment_appointment_id
            FOREIGN KEY ab_payment_appointment_id_idx (appointment_id)
            REFERENCES  ab_appointment(id)
            ON DELETE   SET NULL
            ON UPDATE   CASCADE;');

        $wpdb->query( 'ALTER TABLE ab_staff_schedule_item DROP FOREIGN KEY fk_ab_staff_schedule_item_schedule_item_id' );
        $wpdb->query( 'ALTER TABLE ab_staff_schedule_item DROP INDEX ab_staff_schedule_item_unique_ids_idx' );
        $wpdb->query( 'ALTER TABLE ab_staff_schedule_item DROP INDEX ab_staff_schedule_item_schedule_item_id_idx' );
        $wpdb->query( 'DROP TABLE IF EXISTS ab_schedule_item' );

        $wpdb->query( 'ALTER TABLE ab_staff_schedule_item CHANGE COLUMN schedule_item_id day_index int(10) UNSIGNED NOT NULL AFTER staff_id');
        $wpdb->query( 'ALTER TABLE ab_staff_schedule_item ADD UNIQUE KEY ab_staff_schedule_item_unique_ids_idx (staff_id, day_index) ' );
    }

    function update_2_2_0()
    {
        global $wpdb;

        // stripe.com
        $wpdb->query( "ALTER TABLE ab_payment CHANGE `type` `type` ENUM('local', 'paypal', 'authorizeNet', 'stripe') NOT NULL DEFAULT 'local'" );
        add_option( 'ab_stripe', '0', '', 'yes' );
        add_option( 'ab_stripe_secret_key', '', '', 'yes' );

        // Remove old options.
        delete_option( 'ab_appearance_progress_tracker_type' );
    }

    function update_2_1_0()
    {
        global $wpdb;

        add_option( 'ab_installation_time', time() );

        // Rename some old options.
        add_option( 'ab_settings_pay_locally', get_option( 'ab_local_mode' ) );
        delete_option( 'ab_local_mode' );

        // Add Authorize.net option
        $wpdb->query( "ALTER TABLE ab_payment CHANGE `type` `type` ENUM('local', 'paypal', 'authorizeNet') NOT NULL DEFAULT 'local'" );
        add_option( 'ab_authorizenet_api_login_id',   '', '', 'yes' );
        add_option( 'ab_authorizenet_transaction_key',   '', '', 'yes' );
        add_option( 'ab_authorizenet_sandbox',  0, '', 'yes' );
        add_option( 'ab_authorizenet_type',  'disabled', '', 'yes' );
    }

    function update_2_0_1()
    {
        global $wpdb;

        // In previous migration there was a problem with adding these 2 fields. The problem has been resolved,
        // but we need to take care of users who have already run the previous migration script.
        $wpdb->query( 'ALTER TABLE `ab_staff` ADD `google_user` VARCHAR(255) DEFAULT NULL ;' );
        $wpdb->query( 'ALTER TABLE `ab_staff` ADD `google_pass` VARCHAR(255) DEFAULT NULL ;' );

        delete_option( 'ab_fixtures' );
        delete_option( 'ab_send_notifications_cron_sh_path' );
    }

    function update_2_0()
    {
        global $wpdb;

        add_option( 'ab_settings_time_slot_length', '15', '', 'yes' );
        add_option( 'ab_settings_no_current_day_appointments', '0', '', 'yes' );
        add_option( 'ab_settings_use_client_time_zone', '0', '', 'yes' );
        add_option( 'ab_settings_cancel_page_url', home_url(), '', 'yes' );

        // Add new appearance text options.
        add_option( 'ab_appearance_text_step_service', __( 'Service', 'bookly' ), '', 'yes' );
        add_option( 'ab_appearance_text_step_time', __( 'Time', 'bookly' ), '', 'yes' );
        add_option( 'ab_appearance_text_step_details', __( 'Details', 'bookly' ), '', 'yes' );
        add_option( 'ab_appearance_text_step_payment', __( 'Payment', 'bookly' ), '', 'yes' );
        add_option( 'ab_appearance_text_step_done', __( 'Done', 'bookly' ), '', 'yes' );
        add_option( 'ab_appearance_text_label_category', __( 'Category', 'bookly' ), '', 'yes' );
        add_option( 'ab_appearance_text_label_service', __( 'Service', 'bookly' ), '', 'yes' );
        add_option( 'ab_appearance_text_label_employee', __( 'Employee', 'bookly' ), '', 'yes' );
        add_option( 'ab_appearance_text_label_select_date', __( 'I\'m available on or after', 'bookly' ), '', 'yes' );
        add_option( 'ab_appearance_text_label_start_from', __( 'Start from', 'bookly' ), '', 'yes' );
        add_option( 'ab_appearance_text_label_finish_by', __( 'Finish by', 'bookly' ), '', 'yes' );
        add_option( 'ab_appearance_text_label_name', __( 'Name', 'bookly' ), '', 'yes' );
        add_option( 'ab_appearance_text_label_phone', __( 'Phone', 'bookly' ), '', 'yes' );
        add_option( 'ab_appearance_text_label_email', __( 'Email', 'bookly' ), '', 'yes' );
        add_option( 'ab_appearance_text_label_notes', __( 'Notes (optional)', 'bookly' ), '', 'yes' );
        add_option( 'ab_appearance_text_option_service', __( 'Select service', 'bookly' ), '', 'yes' );
        add_option( 'ab_appearance_text_option_category', __( 'Select category', 'bookly' ), '', 'yes' );
        add_option( 'ab_appearance_text_option_employee', __( 'Any', 'bookly' ), '', 'yes' );

        // Rename some old options.
        add_option( 'ab_appearance_color', get_option( 'ab_appearance_booking_form_color' ) );
        delete_option( 'ab_appearance_booking_form_color' );
        add_option( 'ab_appearance_text_info_first_step',  strip_tags( get_option( 'ab_appearance_first_step_booking_info' ) ) );
        delete_option( 'ab_appearance_first_step_booking_info' );
        add_option( 'ab_appearance_text_info_second_step', strip_tags( get_option( 'ab_appearance_second_step_booking_info' ) ) );
        delete_option( 'ab_appearance_second_step_booking_info' );
        add_option( 'ab_appearance_text_info_third_step',  strip_tags( get_option( 'ab_appearance_third_step_booking_info' ) ) );
        delete_option( 'ab_appearance_third_step_booking_info' );
        add_option( 'ab_appearance_text_info_fourth_step', strip_tags( get_option( 'ab_appearance_fourth_step_booking_info' ) ) );
        delete_option( 'ab_appearance_fourth_step_booking_info' );
        add_option( 'ab_appearance_text_info_fifth_step',  strip_tags( get_option( 'ab_appearance_fifth_step_booking_info' ) ) );
        delete_option( 'ab_appearance_fifth_step_booking_info' );

        $wpdb->query( 'ALTER TABLE `ab_staff` ADD `google_user` VARCHAR(255) DEFAULT NULL ;' );
        $wpdb->query( 'ALTER TABLE `ab_staff` ADD `google_pass` VARCHAR(255) DEFAULT NULL ;' );

        $wpdb->query( 'ALTER TABLE `ab_customer` ADD `notes` TEXT NOT NULL ;' );
        $wpdb->query( 'ALTER TABLE `ab_appointment` ADD `token` varchar(255) DEFAULT NULL ;' );
        $wpdb->query( 'ALTER TABLE `ab_notifications` DROP `name`;' );
    }

    function drop( $ab_tables ) {
        /** @var \wpdb $wpdb */
        global $wpdb;

        if ( ! is_array( $ab_tables ) ) {
            $ab_tables = array( $ab_tables );
        }
        $get_ab_foreign_keys = "SELECT table_name, constraint_name FROM information_schema.key_column_usage WHERE REFERENCED_TABLE_SCHEMA=SCHEMA() AND REFERENCED_TABLE_NAME IN (".implode(', ', array_fill(0, count($ab_tables), '%s')).")";
        $schema = $wpdb->get_results( $wpdb->prepare( $get_ab_foreign_keys, $ab_tables ) );
        foreach ( $schema as $foreign_key ) {
            $wpdb->query( "ALTER TABLE `$foreign_key->table_name` DROP FOREIGN KEY `$foreign_key->constraint_name`" );
        }
        $wpdb->query( 'DROP TABLE IF EXISTS `'.implode("`,\r\n `",$ab_tables).'` CASCADE;' );
    }

    function rename_options( array $options )
    {
        foreach ( $options as $deprecated_name => $option_name ) {
            add_option( $option_name, get_option( $deprecated_name ) );
            delete_option( $deprecated_name );
        }
    }

    function rename_l10n_strings( array $strings )
    {
        global $wpdb;
        // WPML 'move' customer translations
        $wpml_strings_table = $wpdb->prefix . 'icl_strings';
        $result = $wpdb->query( "SELECT table_name FROM information_schema.tables WHERE table_name = '$wpml_strings_table' AND TABLE_SCHEMA=SCHEMA()" );
        if ( $result == 1 ) {
            $query = "SELECT count(*) FROM information_schema.COLUMNS WHERE COLUMN_NAME = 'domain_name_context_md5' AND TABLE_NAME = '$wpml_strings_table' AND TABLE_SCHEMA=SCHEMA()";
            $domain_name_context_md5_exists = $wpdb->get_var( $query );
            if ( $domain_name_context_md5_exists ) {
                foreach ( $strings as $deprecated_name => $name ) {
                    $wpdb->query( "UPDATE $wpml_strings_table SET name='$name', domain_name_context_md5=MD5(CONCAT(`context`,'" . $name . "',`gettext_context`)) WHERE name='$deprecated_name'" );
                }
            } else {
                foreach ( $strings as $deprecated_name => $name ) {
                    $wpdb->query( "UPDATE $wpml_strings_table SET name='$name' WHERE name='$deprecated_name'" );
                }
            }
        }
    }

    function register_l10n_options( array $options )
    {
        foreach ( $options as $option_name => $option_value ) {
            add_option( $option_name, $option_value );
            do_action( 'wpml_register_single_string', 'bookly', $option_name, $option_value );
        }
    }

}

function plugin_update_db()
{
    $db_version   = get_option( 'ab_db_version' );
    $update_class = new Updates();

    if ( Lib\Plugin::version() > $db_version && $db_version !== false ) {

        $db_version_underscored     = 'update_' . str_replace( '.', '_', $db_version );
        $plugin_version_underscored = 'update_' . str_replace( '.', '_', Lib\Plugin::version() );

        $updates = array_filter(
            get_class_methods( $update_class ),
            function( $method ) { return strstr( $method, 'update_' ); }
        );
        usort( $updates, 'strnatcmp' );

        foreach ( $updates as $method ) {
            if ( $method > $db_version_underscored && $method <= $plugin_version_underscored ) {
                call_user_func( array( $update_class, $method ) );
            }
        }

        update_option( 'ab_db_version', Lib\Plugin::version() );
    }
}