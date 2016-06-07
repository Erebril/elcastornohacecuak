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
//define('DB_NAME', 'acee_web_2016');
define('DB_NAME', 'acee_wp_web');
//define('DB_NAME', 'ideauno_wpweb');

/** MySQL database username */
define('DB_USER', 'acee_ideauno');
//define('DB_USER', 'ideauno_ironman');

/** MySQL database password */
define('DB_PASSWORD', 'G7aPmET8aP24');
//define('DB_PASSWORD', 'musterido??');

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
define('AUTH_KEY',         'Y@,<8sSmPN#|HP)%zB5_cvTr79Y_:*97;W@qBr@@E(r`*b-:n;_hzJCHz%?K|- B');
define('SECURE_AUTH_KEY',  'k`7XKZn>7NcTK c+I$zil5sB#dx7:Q0^|#VPkA-Y2.U*=P)IL)J|1pAT7qs[Gva?');
define('LOGGED_IN_KEY',    '|mWo9<7*&.%T~XZ5r7?^B,ZL`J(U&f+/_o.h$VC7I1jqNT!%]WCrr/L,m_:4H~L ');
define('NONCE_KEY',        '~|af<- p?pYg)|HnVsWiZUnv$71x-) j61jZ<i+fG6Zwxb%}xj*7:;x.R?Fy/!{[');
define('AUTH_SALT',        '-!!RlE2%o2s%_Zpz.mfv?mP {~KNDwFx_%%0+-%dRH:(ek`)$Wy#eAOFy(mOC<][');
define('SECURE_AUTH_SALT', '.^i=|Z&ax_}Ow|c$tHOdPRM)|V!=}ly-U[6C~*|oTVioL).Lh)9PL~~x$f>s{CHi');
define('LOGGED_IN_SALT',   'A8?U5Y4t78Qz[YnJ.k^L|8]M|d-~p9`I;$P!QQ?_8<t*`0?,hLPyo*i:x[;sA7O^');
define('NONCE_SALT',       'p8-&]xL/;s>iO*iy`>;*{v-3{gILaO=UKNun!2Wts]Q7Tlcn[EIMf.@1]B~+kq5p');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'acee_';

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

define('WPCF7_AUTOP',false);

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');