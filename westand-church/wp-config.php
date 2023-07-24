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
define( 'DB_NAME', 'u570786081_westand_church' );

/** Database username */
define( 'DB_USER', 'u570786081_westand_church' );

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
define( 'AUTH_KEY',         'cJK[lML0@R.mQ%#[Shq)9$<lv#Os=_7kd0M&~>?h+Ik2]S3*R,9gGfO|^X|Xy;.(' );
define( 'SECURE_AUTH_KEY',  '3e?F_5UU9FT87m9`&;9LM%)F0-B$2l_=>So)z=i%J>+y<$P@ ?HG]}73&JJx 4gY' );
define( 'LOGGED_IN_KEY',    '}28km=TeeNc-7?e9T3A30Epz65y%2;{qa?t6zx;.*.1AeP3/SLw4`&HRY%T!WHUz' );
define( 'NONCE_KEY',        'VZLc,DQ66Q(I=gFf<V$8gN`-I,AU29g<:?CvNTSb_J)}T_MqNy]!qN./KapvU+)m' );
define( 'AUTH_SALT',        'GIN@$=u$U&%>*jF|[2)Wu_V$PJ:au26^b%k8%mX@Bj` *}FsBQaJ1z1/@RM2}|u{' );
define( 'SECURE_AUTH_SALT', '$mE)DiqmQ*Vf-u7AQn8]7i2($a!!F;tP*RmHKo@KB&ot4XqYP{XUk0x,NcqXkIm2' );
define( 'LOGGED_IN_SALT',   '_Xh@z^)@&GnE:0NTs&?Q-!pf|8W8ZKFwX{>VJONUouQiY^zV$a+jSd!yp5BX3Une' );
define( 'NONCE_SALT',       'c~(o{IL07Qzfr]&[kTYTY{TW4 %SN`rb6I)0G( 9eGq>me>BvR||(aW;1B@.x%gA' );

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
