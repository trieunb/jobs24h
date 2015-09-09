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
define('DB_NAME', 'vnjobs_news');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '-E+<|8JRW{d$Nn*sC8`15~7A$~yyqQ%D-P]b~-hySPrGEeMqEOwW|{y1V-t+<V} ');
define('SECURE_AUTH_KEY',  '!*F&_q7B^)D/Z))U9tm4XJ !&NaM;SuwN6e`*Q;)q`~7^f;/q|x`UXHV|3AN|xu:');
define('LOGGED_IN_KEY',    'oqvqO0pws+N|lb~s.9;}De2]x51;P,Y+`|(P&z0v`cRjMpw2:-{Vw|sya!O&p,&w');
define('NONCE_KEY',        ']m0}REU5mX=G_:`4QF#!Ik!YXNs@29#=(Np,$}^-2=_It>O[>|Yf aZ{ (4wwFtP');
define('AUTH_SALT',        'luHi3l>Iz |Z$L#4|!rtYw^EV9GEEHyIHn^NYhU N=}|mdfj6Wr)F$)ETz`.#;uC');
define('SECURE_AUTH_SALT', 'HA0l#rRQ%FSg z|vLPt-<|N/#slf1x>+,t}B9{7y@y`B=m~>iF]J.+?cRT3-Wlu|');
define('LOGGED_IN_SALT',   'rf-;dO~n*>oG.@}7/_2K`Wb}}B4.8(fH/q^K~spx/qHU&^t ^K]eH?Fd}b.7]@X8');
define('NONCE_SALT',       '?5)a0e^iM.!-O10^>w?agi!s#~}vl=O$$fX}E| uQ90UlHc!t1w$BR>j/2N6eR,b');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'vnj_';

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

define('vnjobs', 'http://vnjobs.vn');
define('vnjobs_vi', 'http://vnjobs.vn/vi');