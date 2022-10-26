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
define( 'DB_NAME', 'oxnavvies' );

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
define( 'AUTH_KEY',         'AYdJMW 9FOt{H*oqHgz;KLHy=EJIo POG8_}q:3/R0tE- Cl`S~u):`U`>!ar We' );
define( 'SECURE_AUTH_KEY',  '53XS5*${;N:/i{NZxP#(cVcq_SBC&h>7!L**D(}&y?m~Sp[k$.%]QEkB7hVi|jsf' );
define( 'LOGGED_IN_KEY',    '8mjDOFG{FBPGmBqi wE|fSlsx(5@E`RBiEYrhFcRdCnX#xV@v1vYKrwA8%849<Te' );
define( 'NONCE_KEY',        '{tn @j5LV8 Gvie9;dmq9-fXe`VsJp}lki!%%q})M?;5Q)B=pRG[!4tbOrE~$jHz' );
define( 'AUTH_SALT',        '`v44X+7[;09j+}55+ozgxQz?HSlb}gbZc!A=l*Ljnn:tAS^VvhiUnuKcr7Vl:>;+' );
define( 'SECURE_AUTH_SALT', ')JH^UrH-C|`td759^0AJ)zeGm4R5.jK $KH}yFOZ*t%B1.*Fi,QDD+AHwwK15ztB' );
define( 'LOGGED_IN_SALT',   'l?_pi;m6eIqF5uPTr8n>dWJ:dhay#RcR{-4R>U2CZ,1m4PIQRiK(>!<{6pG*BTp>' );
define( 'NONCE_SALT',       '/@+LC{, .o)- Uf4b%41^541XrJpcuYF={i^$XJ1^C o[eA;6aYpi:t3i9DDEiya' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpx_';

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
