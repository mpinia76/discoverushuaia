<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
    /** @var WP_Locale $wp_locale */
    global $wp_locale;
?>
<div class="ab-booking-form">

    <!-- Progress Tracker-->
    <?php include '_progress_tracker.php'; ?>

    <div class="ab-service-step">
        <div class="ab-row-fluid">
            <span data-inputclass="input-xxlarge" data-default="<?php echo esc_attr( get_option( 'ab_appearance_text_info_service_step' ) ) ?>" class="ab-bold ab_editable" id="ab-text-info-service" data-rows="7" data-type="textarea"><?php echo esc_html( get_option( 'ab_appearance_text_info_service_step' ) ) ?></span>
        </div>
        <div class=ab-service-form>
            <div class="ab-mobile-step_1 ab-four-cols ab-row-fluid">
                <div class="ab-formGroup ab-left">
                    <label data-default="<?php echo esc_attr( get_option( 'ab_appearance_text_label_category' ) ) ?>" class="ab-formLabel text_category_label" id="ab-text-label-category" data-type="multiple" data-option-id="ab-text-option-category"><?php echo esc_html( get_option( 'ab_appearance_text_label_category' ) ) ?></label>
                    <div class="ab-formField">
                        <select class="ab-formElement ab-select-mobile ab-select-category" style="width: 100%">
                            <option value="" class="editable" id="ab-text-option-category" data-default="<?php echo esc_attr( get_option( 'ab_appearance_text_option_category' ) ) ?>"><?php echo esc_html( get_option( 'ab_appearance_text_option_category' ) ) ?></option>
                            <option value="1">Cosmetic Dentistry</option>
                            <option value="2">Invisalign</option>
                            <option value="3">Orthodontics</option>
                            <option value="4">Dentures</option>
                        </select>
                    </div>
                </div>
                <div class="ab-formGroup ab-left">
                    <label class="ab-formLabel text_service_label">
                        <span
                            data-default="<?php echo esc_attr( get_option( 'ab_appearance_text_label_service' ) ) ?>"
                            data-default-error="<?php echo esc_attr( get_option( 'ab_appearance_text_required_service' ) ) ?>"
                            data-error-id="ab_appearance_text_required_service"
                            id="ab-text-label-service"
                            data-mirror="text_services"
                            data-type="multiple"
                            data-option-id="ab-text-option-service"><?php echo esc_html( get_option( 'ab_appearance_text_label_service' ) ) ?></span>
                    </label>
                    <div class="ab-formField">
                        <select class="ab-formElement ab-select-mobile ab-select-service" style="width: 100%">
                            <option value="" class="editable" id="ab-text-option-service" data-default="<?php echo esc_attr( get_option( 'ab_appearance_text_option_service' ) ); ?>"><?php echo esc_html( get_option( 'ab_appearance_text_option_service' ) ) ?></option>
                            <option value="1">Crown and Bridge</option>
                            <option value="2">Teeth Whitening</option>
                            <option value="3">Veneers</option>
                            <option value="4">Invisalign (invisable braces)</option>
                            <option value="5">Orthodontics (braces)</option>
                            <option value="6">Wisdom tooth Removal</option>
                            <option value="7">Root Canal Treatment</option>
                            <option value="8">Dentures</option>
                        </select>
                    </div>
                </div>
                <div class="ab-formGroup ab-left">
                    <label class="ab-formLabel text_employee_label">
                        <span
                            data-default="<?php echo esc_attr( get_option( 'ab_appearance_text_label_employee' ) ) ?>"
                            data-default-error="<?php echo esc_attr( get_option( 'ab_appearance_text_required_employee' ) ) ?>"
                            data-error-id="ab_appearance_text_required_employee"
                            id="ab-text-label-employee"
                            data-mirror="text_employee"
                            data-type="multiple"
                            data-option-id="ab-text-option-employee"><?php echo esc_html( get_option( 'ab_appearance_text_label_employee' ) ) ?></span>
                        </label>
                    <div class="ab-formField">
                        <select class="ab-formElement ab-select-mobile ab-select-employee" style="width: 100%">
                            <option value="" class="editable" id="ab-text-option-employee" data-default="<?php echo esc_attr( get_option( 'ab_appearance_text_option_employee' ) ) ?>"><?php echo esc_html( get_option( 'ab_appearance_text_option_employee' ) ) ?></option>
                            <option value="1">Nick Knight</option>
                            <option value="2">Jane Howard</option>
                            <option value="3">Ashley Stamp</option>
                            <option value="4">Bradley Tannen</option>
                            <option value="5">Wayne Turner</option>
                            <option value="6">Emily Taylor</option>
                            <option value="7">Hugh Canberg</option>
                            <option value="8">Jim Gonzalez</option>
                            <option value="9">Nancy Stinson</option>
                            <option value="10">Marry Murphy</option>
                        </select>
                    </div>
                </div>
                <div class="ab-formGroup ab-left">
                    <label data-default="<?php echo esc_attr( get_option( 'ab_appearance_text_label_number_of_persons' ) ) ?>" class="ab-formLabel ab_editable" data-type="text" id="ab-text-label-number-of-persons"><?php echo esc_html( get_option( 'ab_appearance_text_label_number_of_persons' ) ) ?></label>
                    <div class="ab-formField">
                        <select class="ab-formElement ab-select-mobile ab-select-number-of-persons">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                </div>

                <div class="ab-right ab-mobile-next-step ab-btn ab-none" onclick="return false">
                    <span class="text_next ab_editable" id="ab-text-button-next" data-mirror="text_next" data-type="text" data-default="<?php echo esc_attr( get_option( 'ab_appearance_text_button_next' ) ) ?>"><?php echo esc_html( get_option( 'ab_appearance_text_button_next' ) ) ?></span>
                </div>
            </div>
            <div class="ab-mobile-step_2">
                <div class="ab-row-fluid">
                    <div class="ab-available-date ab-formGroup ab-lastGroup ab-left">
                        <label data-default="<?php echo esc_attr( get_option( 'ab_appearance_text_label_select_date' ) ) ?>" class="ab_editable ab-nowrap" id="ab-text-label-select_date" data-type="text"><?php echo esc_html( get_option( 'ab_appearance_text_label_select_date' ) ) ?></label>
                        <div class="ab-input-wrap ab-formField">
                            <span class="ab-date-wrap">
                               <input style="background: white" class="ab-date-from ab-formElement picker__input--active" type="text" data-value="<?php echo date( 'Y-m-d' ) ?>" />
                            </span>
                        </div>
                    </div>
                    <div class="ab-available-days ab-left">
                        <ul class="ab-week-days">
                            <?php foreach ( $wp_locale->weekday_abbrev as $weekday_abbrev ) : ?>
                                <li>
                                    <div class="ab-bold"><?php echo $weekday_abbrev ?></div>
                                    <label class="active">
                                        <input class="ab-week-day" value="1" checked="checked" type="checkbox">
                                    </label>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <div class="ab-time-range ab-left">
                        <div class="ab-time-from ab-left">
                            <label data-default="<?php echo esc_attr( get_option( 'ab_appearance_text_label_start_from' ) ) ?>" class="ab_editable" id="ab-text-label-start_from" data-type="text"><?php echo esc_html( get_option( 'ab_appearance_text_label_start_from' ) ) ?></label>
                            <div>
                                <select class="select-list ab-select-time-from">
                                    <?php for ( $i = 28800; $i <= 64800; $i += 3600 ) : ?>
                                        <option><?php echo \Bookly\Lib\Utils\DateTime::formatTime( $i ) ?></option>
                                    <?php endfor ?>
                                </select>
                            </div>
                        </div>
                        <div class="ab-time-to ab-left">
                            <label data-default="<?php echo esc_attr( get_option( 'ab_appearance_text_label_finish_by' ) ) ?>" class="ab_editable" id="ab-text-label-finish_by" data-type="text"><?php echo esc_html( get_option( 'ab_appearance_text_label_finish_by' ) ) ?></label>
                            <div>
                                <select class="select-list ab-select-time-to">
                                    <?php for ( $i = 28800; $i <= 64800; $i += 3600 ) : ?>
                                        <option<?php selected( $i == 64800 ) ?>><?php echo \Bookly\Lib\Utils\DateTime::formatTime( $i ) ?></option>
                                    <?php endfor ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ab-row-fluid ab-nav-steps last-row ab-clear">
                    <div class="ab-right ab-mobile-prev-step ab-btn ab-none">
                        <span class="text_back ab_editable" id="ab-text-button-back" data-mirror="text_back" data-type="text" data-default="<?php echo esc_attr( get_option( 'ab_appearance_text_button_back' ) ) ?>"><?php echo esc_html( get_option( 'ab_appearance_text_button_back' ) ) ?></span>
                    </div>
                    <div class="ab-right ab-next-step ab-btn">
                        <span class="text_next ab_editable" id="ab-text-button-next" data-mirror="text_next" data-type="text" data-default="<?php echo esc_attr( get_option( 'ab_appearance_text_button_next' ) ) ?>"><?php echo esc_html( get_option( 'ab_appearance_text_button_next' ) ) ?></span>
                    </div>
                    <button class="ab-left ab-goto-cart ab-btn ladda-button" data-style="zoom-in" data-spinner-size="30">
                        <span class="ladda-label"><img style="max-height: 16px;" src="<?php echo plugins_url( 'appointment-booking/frontend/resources/images/cart.png' ) ?>" /></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php foreach ( array( 'ab_appearance_text_required_service', 'ab_appearance_text_required_name', 'ab_appearance_text_required_phone', 'ab_appearance_text_required_email', 'ab_appearance_text_required_employee' ) as $validator ) : ?>
    <div class="ab-hidden" id="<?php echo $validator ?>"><?php echo get_option( $validator ) ?></div>
<?php endforeach ?>
<style id="ab--style-arrow">
    .picker__nav--next:before { border-left: 6px solid <?php echo get_option( 'ab_appearance_color' ) ?>!important; }
    .picker__nav--prev:before { border-right: 6px solid <?php echo get_option( 'ab_appearance_color' ) ?>!important; }
</style>