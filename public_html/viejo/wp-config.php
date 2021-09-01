<?php
define('WP_AUTO_UPDATE_CORE', 'minor');
define('WP_CACHE', true);
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
define( 'DB_NAME', 'u5413308_wp937' );

/** MySQL database username */
define( 'DB_USER', 'u5413308_wp937' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Uk9!ppS91[' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',         'twx6dfj3niqdzssw1rahdtcz3wupyjalb50yrpoexq5h76zr7asixbpyihe6lz3g' );
define( 'SECURE_AUTH_KEY',  '31rfveeautmgesqup7knrt71adr43rjm9v3volvog5cke2p3vucfvhwrrhlsjzug' );
define( 'LOGGED_IN_KEY',    'ajoniuju3wamqlk0yhgvfgcslhk1l9vw9djcvgam4xhnyeivtxfidi2h1bv6pygh' );
define( 'NONCE_KEY',        'paa0cgq4i5se0phx0qtbrsp8owen1yef5n5bdk3u82amhswczn0tcu3cbkti4xbd' );
define( 'AUTH_SALT',        'awpwu5xnswkskl3ifzmyiw68xjqckjgxus59fkjmaoueg8oievjmvx6msqpcb5yq' );
define( 'SECURE_AUTH_SALT', 'fk8taipnsigbqypdoqudi3qrwsfj3d19gnb1l6xfflpudbnpg8koig2z7gsai7to' );
define( 'LOGGED_IN_SALT',   'xjgdl2ost8kzb9ptznkoipuqlqxwmcuezryc7hyh0m6io4iofvlz5yklt9bxji45' );
define( 'NONCE_SALT',       'kxjvromds0a459gjoemtiooleoauvlqyzjwauok0muvhxlihcvrhxaunc5oztz7f' );

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
