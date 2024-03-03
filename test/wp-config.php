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
define( 'DB_NAME', 'demo' );

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
define( 'AUTH_KEY',         '=%}7_ynKe%X1dN&*^l^8n{hTw:v3^sBpDh$HSXPCfc/0(x3X--XM72wDd0ft^Uv/' );
define( 'SECURE_AUTH_KEY',  ':0$=3x#</b#@ptr:GU]ctq.{TM5L`)F6W2faz`=;NQ^]@/Zs1_VPR%1b46n!TZy.' );
define( 'LOGGED_IN_KEY',    'n&w6Pn8APu.uTc :tE8u%DGc$nbpdK~Uz)#avgWV/W7:RL([]!]=D/]nLn}I#;?~' );
define( 'NONCE_KEY',        'c6/ep2/o*:7F<hQ$Yzk*scSc>)G`QZ(^N9|XfXEmuVvVUTfPlo D<s(f8,K]2jI*' );
define( 'AUTH_SALT',        'bk5#If2*)oUDjsiX` }NYRP%%6 3e~pW 25cM}DxnqRO?]5.<MLe`X3x>HpL-:KM' );
define( 'SECURE_AUTH_SALT', '2II]C96@>VxKaW:nwGJGYO9XC;]qAi>4HY04^nj3]]u~{enEkzk5D5kkuUv):o[L' );
define( 'LOGGED_IN_SALT',   'HP:<)!2D/RI`ocGN]A%^W86=IFK!!^l_Gyf3+M3}d=Cu9B5PB+[UoQ8<19rhc<s#' );
define( 'NONCE_SALT',       'W&&Dz&F0d=La(Z5R&zLkr1V{,VBYMXA.G5SS*JVOZdVE>y3GWjKVGaxnp,JMS tV' );

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
