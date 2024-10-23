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
define( 'DB_NAME', 'anviet' );

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
define( 'AUTH_KEY',         '( Zx;o/-C@Y$@B6a.: `M;pB:$;rf%AvLFa1_`Fx]qim&WmWMM 2h;WMd[:)ThNk' );
define( 'SECURE_AUTH_KEY',  '8GVm+_4>97q)!5M B!$/o0 o`HN,{>qCMTVsg_77z>B>%F[v1Z#53V_ed[=URijl' );
define( 'LOGGED_IN_KEY',    '=6Hg}!]N6onp@_l5#14Q*$pS*-=#,X`b]Cf>)j:ZMamPDf}#pw|BId~.EnSQtk#@' );
define( 'NONCE_KEY',        '^:yo+V>_>-$7eK0%n#pC4|)fe$O5KtT]^KNUMLIgkS:QqPSNMF|fWQQ@zo2@-D}6' );
define( 'AUTH_SALT',        '#vsmKlhEvg5L+`O*xA1qQc.quqJ$F~]Mqt4P!@7sm2=A270n%-lv-oe1]hu/,}wL' );
define( 'SECURE_AUTH_SALT', 'I.5MXVXfzj#{6Y#7&f}5eK?At6CoWX ~8YF>3R+b(m)yDKWl >($=C&)ow;VL>;f' );
define( 'LOGGED_IN_SALT',   'FMg<P8/$+PkLLtTE05oQ2IFe{h{+gbj#73SLd-&kyZ[K*l`]mz%27w>?0x%)#/D ' );
define( 'NONCE_SALT',       '*G+M_rZ.QC;>Hku58;hc+9bc$fo8X,J_d3]Lx&&ZQr+Ew4o28k.BD51(&@*t_Dtk' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpdx_';

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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
