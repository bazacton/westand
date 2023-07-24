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
define( 'DB_NAME', 'u570786081_westand' );

/** Database username */
define( 'DB_USER', 'u570786081_westand' );

/** Database password */
define( 'DB_PASSWORD', 'sts@!F&p6' );

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
define( 'AUTH_KEY',         'm>dxE<(gBO)w*7.uu)o8d:~)k85t0F`.Z><|N3.lMK bpaiEs8m6*M4-tW{_/H>}' );
define( 'SECURE_AUTH_KEY',  'a0]j9+l->7Z_Pw)~9j0GZf=tv}Wp7*V#H]k_KKx!Xg+XP>`cQU Dtv| %z.w5d-M' );
define( 'LOGGED_IN_KEY',    '?t3&#o0TU:oa>Xw*-l6`q8i(sK}yl:F)7JxDz.{#mT_xfH+U}zA*^ux}0NE*__2k' );
define( 'NONCE_KEY',        'J.V{je,J)(D/z/er8M7Dt>zG91iLUV_6=SqIR|_EK?%IV}_|}8%1v6!TzouAV83Q' );
define( 'AUTH_SALT',        'BkP<z/lBht$h; unILC%//5Ug2.1E528*wMao>`z3jl.5=lIJ >nMS6ApoeT8DDh' );
define( 'SECURE_AUTH_SALT', 'E/}BV@GK.-M(3rvyW`j_-E?1%e-o/;#`[MSOVa=?Dc?njBFKkJuq+R&a$/?>Ye3%' );
define( 'LOGGED_IN_SALT',   'Pn3A0s#-0W,VizNGw|Pm!Q.]$G-s F)rut8|cMRUkD{Rdh:mNT!+(+`8n5`Ihrm ' );
define( 'NONCE_SALT',       ':}8U}5XK-+>OD8ozbGy9 k==$5k8?u{#./4v{FLqo:n9D}W9`0,GXC%Z=!{LiLw-' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'nfzwt_';

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
