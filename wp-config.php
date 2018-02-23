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
define('DB_NAME', 'db149826_btmt');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '150117af');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('DISALLOW_FILE_EDIT', true);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '*z[jHPzgE+oI wRI:); JT|]0BkLdoC6jZ#9u#3?zOzL@}-`}?5C?jLEw ,L4,Kn');
define('SECURE_AUTH_KEY',  'b6aZnH7[m#X+}x%wh}haHpCv_T]vYeXqT^`*YJ@^Vt[Ry#&yjQw1)=`=DJ>`B!LP');
define('LOGGED_IN_KEY',    'z6hQM:hxqCzTS%}`BB`jTz:<0T.pD3m:tWLc?0(RD`sn0Z vpQ2Q$?G-.|x!8dzx');
define('NONCE_KEY',        'zAqzsg=wGQpr$ieA]f48+F!-mW%hLU3)SLP23@cXA5kr+}8C*t1)mh47d3J!) TU');
define('AUTH_SALT',        'RR#aes!W_b{3e?``,.bTl>W!H5v5L*n3@V?Hc!/k,XfS[5VO=RcCm<v[+^.YYgZ;');
define('SECURE_AUTH_SALT', 'nq<X.0l@hS$^p$.5XDvUH}B>#_y|>4Vp@KS<Y@dv_|)O:Blj1NaZQ@K:krn@7A#D');
define('LOGGED_IN_SALT',   '@@J>hdD>>kfN<QgZKMGj!sLz{0{y5%/cpE@Kt3!H5%PJ!!FaT*LCeVXmTXQ.Zy^P');
define('NONCE_SALT',       'V^:YUE:K$7Th~1-`zOnWeYCkpp}oe_IC0Cd!&t)K.AL[)?wgpf*~Mf?p[ZRZ)D&,');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('FS_METHOD','direct');
define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
