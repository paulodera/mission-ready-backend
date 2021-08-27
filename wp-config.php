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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'mission-ready');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

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
define('AUTH_KEY', 'ZJMf&q$~*g)fWSfLO?t^n8OByrK^e}+5z#1]xJNfU/m)6)H]i.|%Ch-GljxKqnou');
define('SECURE_AUTH_KEY', 'RcT_)u6ElW&l2)Mpc1HvG;~l0@!#Hgb=W;cJL%tb|tHT2WIy1L6zRls_k{|sO$KC');
define('LOGGED_IN_KEY', 'y/NA5eS0>Q #2d]-1:plwohsw;gY435q70`@uP)jJAkCbN3!!$/^6(ODD9/^H$p.');
define('NONCE_KEY', 'E])2UYe#Ee*xD[#t-`c}ywOo(??[u2k;}gUXLLg13QGzf+/J{.-T{+.K?k95JK+,');
define('AUTH_SALT', '-|ngI7~_Td Rb&}5g?^`AULPvgw.6lgCFfwAcWQ. l:]!iNZ_Wemu$a1%<Td5I=9');
define('SECURE_AUTH_SALT', '40N$re#[9=v0l J}@<86pxFIw8tF!`3$Cd7:+.7gySN#$E^?sq8cMc7qWbq-bI]M');
define('LOGGED_IN_SALT', 'GSO4QL4|K)]4s;azpPh]GpS^E|P(~F!nDZ$/@}^cmw@QR;rvvm`)*MWr>.8Vm-q-');
define('NONCE_SALT', 'j1ohWNd+n@cTnTX}r*=$q]2oT*s>w:Ql+I&ytS$?Ea-*^I=4+8L9vSW<bT;wC@CX');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'mr_';

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
define('WP_DEBUG', false);
define('FS_METHOD', 'direct');

/* Add any custom values between this line and the "stop editing" line. */


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

