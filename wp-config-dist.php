<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'calvin' );

/** Database username */
define( 'DB_USER', 'dima' );

/** Database password */
define( 'DB_PASSWORD', '3112234' );

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
define( 'AUTH_KEY',         'Z=>k&S0Js.BL4w-^H9<n=$Zl%t`v{7X-1t?&&D$G=IpLMX(r_XgKF0k+Nfg9{-w?' );
define( 'SECURE_AUTH_KEY',  '<X+AIFBZI9MxzAg`0N9Bu@8?+~s(*c3_a^Ws2-a2}y*;?`0o2JpjE&jN6nKdk:a,' );
define( 'LOGGED_IN_KEY',    'z}dq8KS[neI1EyHJ,sO,g,]#-q%<UV]*&iNAlV(^Kpl>z&JWG:|O&7G_U76u5L9;' );
define( 'NONCE_KEY',        'w9gM W@{:[=ujidgD,D3rS2ca:+^;<AnVIRU* _+qA&bw~!v!k#q@^^cvJUQ{[#d' );
define( 'AUTH_SALT',        'RVvTZ[ i Nfps}=s-ctYa;0am*7Ct[<rLvf*5gcIe-#,k3on/|jLr|A@XY-;wY}V' );
define( 'SECURE_AUTH_SALT', '00dYF:d f.1:QaU9qGXW-%A]l]PPHg0Y#=vmGwq<0n)T&G[zk4vSK@GTJX6B8Tp[' );
define( 'LOGGED_IN_SALT',   'U+K:%ARCvtV+X|1-`~DJI]<%7eYkK3tG#pGtuTV} eKG_2SNUS5w.3w`:bBYyqTN' );
define( 'NONCE_SALT',       '4F-]}Kvf~CYN?yN`Pm#~/$<{<qqc!Son.L2}S/-Gv/! L-a=!v0NyldsI;Amh/x^' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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

if(is_admin()) {
    define('FS_METHOD', 'direct');
}
