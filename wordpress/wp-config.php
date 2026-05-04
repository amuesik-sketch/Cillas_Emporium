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
define( 'DB_NAME', 'cilla\'s_emporium' );

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
define( 'AUTH_KEY',         'zvh6o[*43o&>Ir?!&T$/M~IssD9C.1:@R)xU*+/u3TI6l>4{&Pshu8WO=;t4%R88' );
define( 'SECURE_AUTH_KEY',  'QF.d(sJe=LuIFuZ@Ej3:;sxZ*<|l-e<]i!f$fN^Y[ruq !5{nM+r>IU!A&zoyV|,' );
define( 'LOGGED_IN_KEY',    'N1P^=ZpHr`_rLa!*=M=GW{Yb}C{q|17h^E_v&}id2o(Bc0_zF(fAb.x0[[8Ng{E7' );
define( 'NONCE_KEY',        'y:x_2%IF.$dX=/6V>_s/@%UsmyY`^;gwg(C/z.ZV^3yk`).N.ucJ>gvz:^4IE0%|' );
define( 'AUTH_SALT',        '/6y5O&Q5e+;?1!7Q2Z~5Y7&ap@5PsC`@&@^H8op-Tm*}y n1 kbo/[)k&}.-*vkp' );
define( 'SECURE_AUTH_SALT', 'Ola!b)c1*(2v>K1Wb?#,B4||24_zXdqmd3A-:B(<)E_D/}FB_:)X{Wo5H<_$8-0i' );
define( 'LOGGED_IN_SALT',   'K)rTf{/xUx<Lf8#,*C~3ODsvU<. ]D9hupDadz%510>`02t};Eg|iUbc}hA{%qLp' );
define( 'NONCE_SALT',       'R,pK)t|45i,f$CDq7_%/~||fZKuvWH#C,]vH2;+Gr)#6?X~Udw^$hHAv{?[h,Y<+' );

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
