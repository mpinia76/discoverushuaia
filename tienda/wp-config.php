<?php
//increase WP Memory Limit
define('WP_MEMORY_LIMIT', '256M');
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'i2814948_wp1');

/** MySQL database username */
define('DB_USER', 'i2814948_wp1');

/** MySQL database password */
define('DB_PASSWORD', 'Y.ASE&Ga4IO*FRQ61[^21@.9');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Op9lyqx3VybRmpns2r9pf978NHugrMNWrVKuAB8GbuaPRv430QwONXuZDL6Wl4hI');
define('SECURE_AUTH_KEY',  'mqLRC1DuebcxwmjD4fPLahs2JdehrcIIEAWn3FzEUdzk1pp41UjITGRz3wF1k2cM');
define('LOGGED_IN_KEY',    'UBUx9Tm1QfOS9Eu3OuwGFd99NZhJn8Ai4UxmDsMFpdwCAnDUUerxnRDfrMHjRxS1');
define('NONCE_KEY',        '6wzM35nE7tSZlDpQjfgmY0rvrN3bP1U4ykdDsHIGXNhW4Vf1ej5XmJ1dqcedrGaK');
define('AUTH_SALT',        'p607OsfotCyfZJdAIQ5g3j4gyvQtoh0CEIMzsiBB1qKwDiB3sMreYX8D3RR8BEMc');
define('SECURE_AUTH_SALT', 'zIJAv31YurV33zEsB1viRQAy98h7iJViNwLbbohP0EbJ0BOY2UbLVoYkuBgdTyja');
define('LOGGED_IN_SALT',   'SQq6yk9NMwnC2pAgx4m2nBUPrqKK6IfjRRWc3REhxsCkDIidnLQjxSG3mia4mF29');
define('NONCE_SALT',       'FIH2fY6LcwKDQqiLtjLUJvN06w4kjxZcfIo6cxQOXmoQ9S4rJFymp7PizZvrJDuM');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
