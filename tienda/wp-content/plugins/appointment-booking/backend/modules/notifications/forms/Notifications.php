<?php
namespace Bookly\Backend\Modules\Notifications\Forms;

use Bookly\Lib;

/**
 * Class Notifications
 * @package Bookly\Backend\Modules\Notifications\Forms
 */
class Notifications extends Lib\Form
{
    public $types = array(
        'client_pending_appointment',
        'staff_pending_appointment',
        'client_approved_appointment',
        'staff_approved_appointment',
        'client_cancelled_appointment',
        'staff_cancelled_appointment',
        'client_new_wp_user',
        'client_reminder',
        'client_follow_up',
        'staff_agenda',
    );
    public $gateway;

    public function __construct( $gateway = 'email' )
    {
        /*
         * make Visual Mode as default (instead of Text Mode)
         * allowed: tinymce - Visual Mode, html - Text Mode, test - no one Mode selected
         */
        add_filter( 'wp_default_editor', create_function( '', 'return \'tinymce\';' ) );
        $this->gateway = $gateway;
        $this->setFields( array(
            'active',
            'subject',
            'message',
            'copy',
        ) );

        $this->load();
    }

    public function bind( array $_post = array(), array $files = array() )
    {
        foreach ( $this->types as $type ) {
            foreach ( $this->fields as $field ) {
                if ( isset($_post[ $type ][ $field ] ) ) {
                    $this->data[ $type ][ $field ] = $_post[ $type ][ $field ];
                }
            }
        }
    }

    /**
     * @return bool|void
     */
    public function save()
    {
        foreach ( $this->types as $type ) {
            if ( $object = new Lib\Entities\Notification() ) {
                if ( ! $object->loadBy( array( 'type' => $type, 'gateway' => $this->gateway ) ) ) {
                    $this->data[ $type ]['type'] = $type;
                }
                $object->setFields( $this->data[ $type ] );
                $object->save();
            }
        }
    }

    public function load()
    {
        foreach ( $this->types as $type ) {
            if ( ( $object = new Lib\Entities\Notification() ) && $object->loadBy( array( 'type' => $type, 'gateway' => $this->gateway ) ) ) {
                $this->data[ $type ]['active']   = $object->get( 'active' );
                $this->data[ $type ]['subject']  = $object->get( 'subject' );
                $this->data[ $type ]['message']  = $object->get( 'message' );
                $this->data[ $type ]['name']     = $this->getNotificationName( $type );
                if ( in_array( $type, array( 'staff_pending_appointment', 'staff_approved_appointment', 'staff_cancelled_appointment' ) ) ) {
                    $this->data[ $type ]['copy'] = $object->get( 'copy' );
                }
            }
        }
    }

    /**
     * @param $type
     * @return mixed
     */
    public function getNotificationName ( $type )
    {
        $notifications_name = array(
            'client_pending_appointment'   => __( 'Notification to customer about pending appointment', 'bookly' ),
            'staff_pending_appointment'    => __( 'Notification to staff member about pending appointment', 'bookly' ),
            'client_approved_appointment'  => __( 'Notification to customer about approved appointment', 'bookly' ),
            'staff_approved_appointment'   => __( 'Notification to staff member about approved appointment', 'bookly' ),
            'client_cancelled_appointment' => __( 'Notification to customer about cancelled appointment', 'bookly' ),
            'staff_cancelled_appointment'  => __( 'Notification to staff member about cancelled appointment', 'bookly' ),
            'client_new_wp_user'           => __( 'Notification to customer about their WordPress user login details', 'bookly' ),
            'client_reminder'              => __( 'Evening reminder to customer about next day appointment (requires cron setup)', 'bookly' ),
            'client_follow_up'             => __( 'Follow-up message in the same day after appointment (requires cron setup)', 'bookly' ),
            'staff_agenda'                 => __( 'Evening notification with the next day agenda to staff member (requires cron setup)', 'bookly' ),
        );

        return $notifications_name[ $type ];
    }

    /**
     * Render the "active" form
     *
     * @param $type
     * @return string
     */
    public function renderActive( $type )
    {
        $title = isset( $this->data[ $type ]['name'] ) ? $this->data[ $type ]['name'] : '';

        return $title;
    }

    /**
     * @param $type
     * @return string
     */
    public function renderSubject( $type )
    {
        $id     = $type . '_subject';
        $name   = $type . '[subject]';
        $value  = isset( $this->data[ $type ]['subject'] ) ? $this->data[ $type ]['subject'] : '';

        return "<label class='ab-form-label' for='{$id}' style='margin-top: 19px;'>" . __( 'Subject', 'bookly' ) . "</label><input type='text' size='70' id='{$id}' name='{$name}' value='{$value}' class='form-control' />";
    }

    /**
     * @param $type
     * @return string
     */
    public function renderMessage( $type )
    {
        $id    = $type.'_message';
        $name  = $type.'[message]';
        $value = isset( $this->data[ $type ]['message'] ) ? $this->data[ $type ]['message'] : '';

        if ( 'sms' == $this->gateway ) {
            return "<textarea rows='6' id='{$id}' name='{$name}' class='ab-sms-message pull-left'>" . esc_textarea( $value ) . "</textarea>";
        } else {
            $settings = array(
                'textarea_name' => $name,
                'media_buttons' => false,
                'editor_height' => 384,
                'tinymce'       => array(
                    'theme_advanced_buttons1' => 'formatselect,|,bold,italic,underline,|,'.
                                                 'bullist,blockquote,|,justifyleft,justifycenter'.
                                                 ',justifyright,justifyfull,|,link,unlink,|'.
                                                 ',spellchecker,wp_fullscreen,wp_adv'
                )
            );

            wp_editor( $value, $id, $settings );
        }
    }

    /**
     * Render the "copy" form
     *
     * @param $type
     * @return string
     */
    public function renderCopy( $type )
    {
        $id         = $type . '_copy';
        $name       = $type . '[copy]';
        $checked    =  checked( ( isset( $this->data[ $type ]['copy'] ) && intval( $this->data[ $type ]['copy'] ) ), true, false );
        $title      = __( 'Send copy to administrators', 'bookly' );

        return "<div class='ab-form-row'>
            <label class='ab-form-label'></label>
            <div>
                <legend>
                    <input name='{$name}' type=hidden value=0 />
                    <input id='{$id}' name='{$name}' type=checkbox value=1 {$checked} />
                    <label for='{$id}'> {$title}</label>
                </legend>
            </div>
        </div>";
    }

}