<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'chronevo' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '@IbJ7qQFJ<kFTZ,kfXW<6LEyoQl7ik%.-[c&*&DqpO&gg$,Xdyg_4m!A.7Zh#H#W' );
define( 'SECURE_AUTH_KEY',  'i?uXXB%/,HG)QoriS2x5vL64qrsO~NX~0elw5>~<Sv*AG1tZ%!*%vrU9EL$U{QL]' );
define( 'LOGGED_IN_KEY',    'e&527qLb=oc2k<<|AL9encek&NAt`{]+]0mNoICDA+pC|[4D(SH1@=|O<>.VlO=U' );
define( 'NONCE_KEY',        'yfW[oCULUV#y1!zf:=VqNKn@a/<neHihG!)vWd!{S7zG8J4RX/>(KD=VJiV=gbz/' );
define( 'AUTH_SALT',        '5Y<J<k]`[U^m8jm^p-B!O!/[$`vIK$ %pIX^&bM@ M0`oxjfZ5&;p9I=+kHicX]p' );
define( 'SECURE_AUTH_SALT', 'I6z#DL5cQ {[7h,L@2A;nl[Vpg^Y!I*yR{(,yrJ{4ubBqw(&4.(4IK@EK^KtbT$P' );
define( 'LOGGED_IN_SALT',   '^V9FV&~gCwGc$.x%/!yzyE)IJOwKKp?1K6/s:-k$oyIY=)RPC`40bqN#qiXOTrzo' );
define( 'NONCE_SALT',       'WzD8GY4VAKm6mqzhkwWE/xI#IN1;CdCHt.[[D&$?I8PQ>AVI3DchAEcV`ZYXo^bd' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
