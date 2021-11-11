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
define( 'DB_NAME', 'beetroot' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'i!(x!;f:s:2JxqE_hr)a(Cxe^^EMhzi,M4HcV*Bss_B1%s=hE?[>RP`SY&Vr#wou' );
define( 'SECURE_AUTH_KEY',  'Ta?[+D#RH;~jQC`UJ5lq%RATO4Q);WOt3SLI:7H(`l/z1/&!`2UP-0J3D6Z$I^ L' );
define( 'LOGGED_IN_KEY',    'fx.9fd1OLxcaPVhHK<;;G)QpMrH1zXD`q6@(bJ<1/qLf!@I[&I$h02ci|/q9U0Y_' );
define( 'NONCE_KEY',        'Q;TtxY[^~EgPp $u|Z==L>K` X3|;|MR@2af.3jCzWZ?YKOcHyqG]kU=);i(hff-' );
define( 'AUTH_SALT',        ':/Bzkb%QH[D=0G&;h]r{ph;cmSJE|UI3]BO0mV:O{+Hp!} -yOI^Gc{Y;cPdSCH!' );
define( 'SECURE_AUTH_SALT', 'C$J o*QYfyFu2,BOaSm?%M4 *LBl_1E~ywRuCI2^h4w@Xd0Lvxecw+<3:,>,!PK5' );
define( 'LOGGED_IN_SALT',   'zynLxpz1HI>QBRpt}%r0`Kwb~d_}N:m1d<#m/1GLx>Mo^l@.0ZNrPp[+)MG*<PXu' );
define( 'NONCE_SALT',       'u~z.u02lksEHFI4E&**zZ]`jytWzDg8ct+*F,d#NC:I(}6G*?:f:-{d,{Y3U_Oh%' );

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
define('ALLOW_UNFILTERED_UPLOADS', true);


/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
