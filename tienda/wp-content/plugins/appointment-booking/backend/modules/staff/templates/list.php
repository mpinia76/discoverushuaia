<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php if ( \Bookly\Lib\Utils\Common::isCurrentUserAdmin() ) : ?>
                <?php _e( 'Staff Members', 'bookly' ) ?> (<span id="ab-staff-count"><?php echo count( $staff_members ) ?></span>)
            <?php else : ?>
                <?php _e( 'Profile', 'bookly' ) ?>
            <?php endif ?>
        </h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="ab-left-bar col-md-3 col-sm-3 col-xs-12 col-lg-3"<?php if ( ! \Bookly\Lib\Utils\Common::isCurrentUserAdmin() ) : ?> style="display: none" <?php endif ?>>
                <ul id="ab-staff-list">
                    <?php if ( $staff_members ) : ?>
                        <?php foreach ( $staff_members as $staff ) : ?>
                            <li class="ab-staff-member<?php if ( $active_staff_id == $staff['id'] ) : ?> ab-active<?php endif ?>" id="ab-staff-<?php echo $staff['id'] ?>" data-staff-id="<?php echo $staff['id'] ?>">
                                <span class="ab-handle" title="<?php esc_attr_e( 'Reorder', 'bookly' ) ?>">
                                    <i class="ab-inner-handle glyphicon glyphicon-align-justify"></i>
                                </span>
                                <?php if ( $staff['avatar_url'] ) : ?>
                                    <img class="left ab-avatar" src="<?php echo $staff['avatar_url'] ?>" />
                                <?php else : ?>
                                    <img class="left ab-avatar" src="<?php echo plugins_url( 'backend/resources/images/default-avatar.png', AB_PATH . '/main.php' ) ?>" />
                                <?php endif ?>
                                <div class="ab-text-align"><?php echo esc_html( $staff['full_name'] ) ?></div>
                            </li>
                        <?php endforeach ?>
                    <?php endif ?>
                </ul>
                <?php include 'new.php' ?>
            </div>
            <div id="ab-edit-staff-member" class="ab-right-content col-md-9 col-sm-9 col-xs-12 col-lg-9"></div>
        </div>
        <div id="ab-staff-popover-ext" style="display: none">
            <p><?php _e( 'If this staff member requires separate login to access personal calendar, a regular WP user needs to be created for this purpose.', 'bookly' ) ?></p>
            <p><?php _e( 'User with "Administrator" role will have access to calendars and settings of all staff members, user with some other role will have access only to personal calendar and settings.', 'bookly' ) ?></p>
            <p><?php _e( 'If you will leave this field blank, this staff member will not be able to access personal calendar using WP backend.', 'bookly' ) ?></p>
        </div>
    </div>
</div>