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
define('DB_NAME', 'intership');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ',-+S>/GGbU=n5%v1YA7}9ElId2L0vh+hU/*<w5iEIU3zkFAv<GYI0.& ;yuKzb*^');
define('SECURE_AUTH_KEY',  'lcFU/SJ@W;*^<{JNKz2:QO{Xx(W~SS,2eXQIOw{N6;c(h{q&w*>q*~,Z;~hK ]{D');
define('LOGGED_IN_KEY',    '#VDb:li{WI?~1q}Au_%n2LVu/6pWpNo0s]]yL`}l2,BZ61$Uo9+HSd>^o{#5PG6p');
define('NONCE_KEY',        'k+()}8`ZQoXy]ndab?]}Uwkd%##RrWL^S{,b</~V4nghdH+E6M/<,>^gmzA(_T+B');
define('AUTH_SALT',        '|2~<91{6Fg<fk4_8UJwdGKaDV7KvN>UKg*0e5GXVt*c.$G:19;JjGQ`b]r*9VO_Q');
define('SECURE_AUTH_SALT', 'p+l6|R.n&0]?4D]O=$V7{89h}p%4@ei*>anjDI4D<|S7Woc31P&2yTTUA:EAac$C');
define('LOGGED_IN_SALT',   '6:C?ab,WXP{5D:6OD!tLspDxA*qiiavpt8-s}$AVy]s*f:f2Q.4~atp+84xwU}94');
define('NONCE_SALT',       'hBCv$6~g,+#[@(TcQpi<2ZlA.Mpk `0J:?M^6fM!4C]`^E_Jp1hC3FaDP4@{O,,_');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
