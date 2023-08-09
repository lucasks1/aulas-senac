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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'bd_blog' );

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
define( 'AUTH_KEY',         'Oc`L`#0D]M#}e,eM~CjBQu8RmFq#%%ACq^(<gJT3T ~ItYd>zT7A]X~?~-AdY6/B' );
define( 'SECURE_AUTH_KEY',  'mB6+wCY$UO f17pgt+YZzRe)91J}kwq@/T]Xg[PhqMyuDB=?&7;*N}&NE;@H9bJ{' );
define( 'LOGGED_IN_KEY',    '#qg4Tn?~bS%hnEELt#}W2qO&$_wsU66)oA5<UD@CkFci`ri<(>m=#8HDH)SD6])L' );
define( 'NONCE_KEY',        'EM4KGNr`/wMk/Sy+=CIV&#K~9@uJTXIM&[^8%>t$9yx}VbeY.>fndHX]-EQo/ZTn' );
define( 'AUTH_SALT',        '&0oz+9wgr1o~ dgwRLU#`uv$wVe(zWk8C|7zBwBH4_<d0NbNN5KMC&2dngbz#QL2' );
define( 'SECURE_AUTH_SALT', 'FKNbUwvn=xr2$`A;n!Nz&s&yY6Ib :0-%(_%w.yasbr;|%QLSjP oDs5VX>4UgHS' );
define( 'LOGGED_IN_SALT',   'Te9A`~[d_V405uPh[_$i }UVz|`F&g.M>x]!tmk-b1D4=^!|9wGEYZ(Or#LF|:FJ' );
define( 'NONCE_SALT',       '[*K0-$82D,QOaNvkQV-8<Jv_#-qMjFr_Cju6yqp+X=ttmMFgl4n&N0b@sPc-Y6e0' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
