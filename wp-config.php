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
define( 'DB_NAME', 'test' );

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
define( 'AUTH_KEY',         ',fcU>h(W^$8@9Fh2>FcH5>j:1-@Q8gJ0QHSSSQ6LLTSy:1!7bQ*c:R6F8zs.@..g' );
define( 'SECURE_AUTH_KEY',  '(VC-TiA0eoZ2)G1gY2 q%g@&s-$+%2iCGjdhr^tnc>d]LV;NH)N2@zSJfD?|?JGP' );
define( 'LOGGED_IN_KEY',    '0V3=8O#/<D7;/S/Z,*I7}j9:#;Ez+q_-oX`ZB5hB68~!yq:;-$+5PNZ)tW7#[>T&' );
define( 'NONCE_KEY',        'K=(dY[v:h5GYbMt)/4AL]bu6_X^pumSB:pvO$Cd@*l$mZ3aQo<G9h!bWp/ubjP3L' );
define( 'AUTH_SALT',        ';Zp@MQs46{pzk$byMc0.?/#~Z07!oZr)!]A(jb~V9LDf7Wg<ry=kMDvD<{cQ6ad[' );
define( 'SECURE_AUTH_SALT', ' 7ZcNk]~sDdV^eZ:3He/w8m3To7|kl_YL~Q,(jwH}!$#mxeSgIIU1:<Zx88$aJcB' );
define( 'LOGGED_IN_SALT',   'BFCx)6}=Yj/v=8o4(]k8{RW7*@4~tN]fg>zAs->QJ)&,0soEg]`qLG9yd/`3@+hU' );
define( 'NONCE_SALT',       'UH4hf.Yjq<TJIi=usOoR?p8fgYS-LJ.Ocak`k]I?no4pZZW;[p_PeUYHt{ :Rw7e' );

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
