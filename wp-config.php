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
define( 'DB_NAME', 'wp_edmart' );

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
define( 'AUTH_KEY',         'k<{6V;0s1;Qu~Ks-}[]^@sY6yvBO}9vPq)8u%Jv,ml4u!%fHIw$_2#A*YpP}h}bQ' );
define( 'SECURE_AUTH_KEY',  'Bw,OjTC1eUnr].|PavKvDVwzr>i#h65N^&RQ[{0C.1FW+t!u7Big>m|_Swt_?i*]' );
define( 'LOGGED_IN_KEY',    '@c /]lSDe*>BxzaMNw4LpHsCC(Xzc;6gWSirJKg%ey-(Z|/7@?<|.4q0sEpfCCqz' );
define( 'NONCE_KEY',        '}5{6yn%?hL{vf@:s}jIh7bf ladX(2`nWi?G|.E<=b^Cl`GgF)wyR*3C}YfMm7Qs' );
define( 'AUTH_SALT',        'rnL,N!lM2-!Us%{#xLCz_8k@r $;iqRZf{~UgH7d1J-qnS%+tF+ts1GhJ7uRj{/^' );
define( 'SECURE_AUTH_SALT', 'gtJJ &=$6)$Ix>;Wl&Q.iBHoNwhbeAX/m7?t_z]!XGCXiu)x884a;=#bP1it.;{Q' );
define( 'LOGGED_IN_SALT',   'zjb_WD2,j!|SMY%_s1]W0_S(?7*Q1z*w(^&SVJ/JE$L*b+G4kL&!_`=n&$?B#p5[' );
define( 'NONCE_SALT',       'XR9g]FyM483ePykmbqY5IT]x;fN,@Odx(NF@TlxUG$OW$0.-zO@])cCVQoIS?$JA' );

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
