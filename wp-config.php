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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'fitsexxh_wp530' );

/** Database username */
define( 'DB_USER', 'fitsexxh_wp530' );

/** Database password */
define( 'DB_PASSWORD', 'p[OR[T671S' );

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
define( 'AUTH_KEY',         'ibez0yni8jryvozupcaboexxwupt7j3kahdtc1em18qdsuj4s6qtxe1xaapyemfu' );
define( 'SECURE_AUTH_KEY',  'byww9cnzqeufjzfruomviiamlyf87xnsodtphv5hrzhvzaoy4w2hcwq0nlzfhdkq' );
define( 'LOGGED_IN_KEY',    'e4ip0qwdcn8ixevqsxoblp8ggfv6z85ud8ctnvzqtnpdnzf5b3oah5rnaaygmifi' );
define( 'NONCE_KEY',        'axenvnbancrsqo6goca5gwuwvo4jk2dx9ccxrjrh1yigxziuez28csj7vb92smhi' );
define( 'AUTH_SALT',        'hzsmrsb7jdrw7twrml8xdltkfbhr3iobvz7aymeedpeuwl5ncxxfpw19dhczcofx' );
define( 'SECURE_AUTH_SALT', 'dk42robs3qyw35nps91kzukk13ytb7tjoofmtonnzlwk4sd7bnlrxx9eg0uwdfeg' );
define( 'LOGGED_IN_SALT',   'jffgjpco9e6sy0atao1nnqpupkyxqkrbqkzjgismnzmjivmug6oc9z7zobvo2rpu' );
define( 'NONCE_SALT',       'glph2jdk3obdtrspqsrm40ajuetrjwechx3ftk4yirwo3o2yjumkgnf9jsyj8op4' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp9g_';

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
