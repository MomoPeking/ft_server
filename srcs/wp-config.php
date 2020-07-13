<?php
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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'k4^[`:N,_>MUwc7u1hqN-k)G&GctEOxez-~x2,kK/YS5bZZv$QN+w%9|d:#&5=@e' );
define( 'SECURE_AUTH_KEY',  'JLOf98et,=su|yk|jl =W^PFd|-y)-f@8iVO.l3[j^r0|?/Z=krJd,Oo8=x[|(>4' );
define( 'LOGGED_IN_KEY',    'QWIc;A(p(0NR :&)NT0y_hLD7IB/{+X@1KNWUQ[_t_eVCjw@c+GF8NX#_j3^Gb!*' );
define( 'NONCE_KEY',        'X-bn$ZQ4P>%k;fltL*;T(jjk[}{Ntz RYSq#YOhJV|Q7n8m^`6]fhGv+lX(p]c7M' );
define( 'AUTH_SALT',        'jq.d*Av+}d#V?Z)|eK0UltH[%%o(BjVt.4H-qUTV-1KME,9FAFsnPhw|o(MB0,|I' );
define( 'SECURE_AUTH_SALT', 'C_`OuP+|1IR8Hw9nV=p&<tL[:o@]:+4_iR>e<q|)lmo*,[y+Q{&b#=q/O!e@GaZi' );
define( 'LOGGED_IN_SALT',   '!|E_j@TkY/_oMHRwl|:BA2!i}$x3`c(!acW#ZtZB5MnM[Q@7Rg;b</zZZn` @]EQ' );
define( 'NONCE_SALT',       ' 2nTR^sLu]..fJ);Ec3u3#ynh~R=o`!hyik8zl&&^_wIj!b>WL#2Za>4%ff$=6j0' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
