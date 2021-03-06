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

/**
 * ==================== SSL CONFIGURATION ====================
 * Websites behind load balancers or reverse proxies that support
 * HTTP_X_FORWARDED_PROTO can be fixed by adding the following code 
 * to the wp-config.php file, above the require_once call:
 */
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')
	$_SERVER['HTTPS'] = 'on';

/**
 * ==================== AMAZON AWS S3 ====================
 */
define( 'DBI_AWS_ACCESS_KEY_ID', 'ENTER_YOUR_AWS_ACCESS_KEY_FOR_S3' );
define( 'DBI_AWS_SECRET_ACCESS_KEY', 'ZzCCCMo+ENTER_YOUR_AWS_SECRET_KEY_FOR_S3' );

/** ==================== ENVIRONMENT SETTINGS FOR WORDPRESS ==================== */

/** HTTPS */
if(getenv('WP_ENV') == 'production')
	define('WP_HOME', 'https://' . $_SERVER['SERVER_NAME']);

/** HTTP */
if(getenv('WP_ENV') == 'development')
	define('WP_HOME', 'http://localhost');
	
define('WP_SITEURL', WP_HOME);

/** 
 * ==================== MYSQL CONNECTION ==================== 
 * MySQL settings - You can get this info from your web host
 * ----------
 * For AWS Elastic Beanstalk. Services > Elastic Beanstalk > Your Application > Your Environment > Configuration > Software > Environment Properties
 * Properties: WP_DB_HOST, WP_DB_NAME, WP_DB_PASSWORD, WP_DB_USER
 * Options:
 * ----------
 * define('WP_MEMORY_LIMIT', '256M');
*/

/** MySQL hostname */
define('DB_HOST', getenv('WP_DB_HOST'));

/** MySQL Wordpress Database */
define('DB_NAME',  getenv('WP_DB_NAME'));

/** MySQL database password */
define('DB_PASSWORD', getenv('WP_DB_PASSWORD'));

/** MySQL database username */
define('DB_USER', getenv('WP_DB_USER'));

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');


/**#@+
 * ==================== Authentication Unique Keys and Salts. ====================
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '');
define('SECURE_AUTH_KEY',  '');
define('LOGGED_IN_KEY',    '');
define('NONCE_KEY',        '');
define('AUTH_SALT',        '');
define('SECURE_AUTH_SALT', '');
define('LOGGED_IN_SALT',   '');
define('NONCE_SALT',       '');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * ==================== For developers: WordPress debugging mode. ====================
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
