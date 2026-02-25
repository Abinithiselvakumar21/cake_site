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
define( 'DB_NAME', 'cake' );

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
define( 'AUTH_KEY',         'p-`8,~T&J5t,0;LG1FaA3#s=9`QbFkv2(q]nnBs)),g2_N>b^ux`B^BIOsCrYM:i' );
define( 'SECURE_AUTH_KEY',  'bL,Hc;L)FP>_(<HslucuRHonw&cvlp=<)4^3u<QD2kAt3pPv.&QPer%>gL$y#c)8' );
define( 'LOGGED_IN_KEY',    '~j3w(-7_.+gb#V O7Ie %B!mC!Q`^hQF%%#|5#(7kUZRSPzQls$>[Okrb%HiaU|E' );
define( 'NONCE_KEY',        'Wz!`lm1Io{RHAc,hxz%(}k&%v#*LzrH5%kK,FrWali9+`5K*4bkP~q{gAd/Fotqx' );
define( 'AUTH_SALT',        'aX%/TBMQ`HR2GBqp>M|Wj wOHpDi8&N}7#^?t7?J.f-91+e_X:OL@PiZKdL>i2 Y' );
define( 'SECURE_AUTH_SALT', 'a2Y&3ZA` Mgpkvh/!PJp3I4P.;Njb}:y9R{{HFQV53+K-75qzl!FIX5I jLA{k-s' );
define( 'LOGGED_IN_SALT',   'uRtWb>`]-_:ke&_d}TFFCM$(I*#4iRJg3M}bfyqHlSFN[{zvH,(JDnE%Pf`w+=R9' );
define( 'NONCE_SALT',       ']d<yX(t1d|4=so!.Rw<2u50GFu.5^,!^kvr]UBRlNY(2Z<(@bBqX9Bs@aT_59[O[' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
