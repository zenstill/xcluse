<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'xcluse');

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
define('AUTH_KEY',         'f1gvE/.)#VtDh%-R9Xg^{<wL,o!MpzS,A`A]E~2_v))b6 KHt%D4(Rx+<u4%]|s3');
define('SECURE_AUTH_KEY',  '|J<4||QdD%(Zk~yKc%C{Yq$z+E$^<MSHcjBU(f7v-#Qk*|&E-Jw n+5-|~omYmkC');
define('LOGGED_IN_KEY',    ']Ajd0BSA2k]FW(+voWDSk^j*|kHPSQX5@E!@8q2/?r(X(@}#d)-(e?DT(-BfF9p]');
define('NONCE_KEY',        'XZ[ih+6w+UMY.J!pXQp1RAY*TpzASpG|>F2a:`PE{hqyw6k_jz*QIC<Q>`[Bi-GY');
define('AUTH_SALT',        ':=n+p7x*:O`46!{oEN9?2-OkmYyDF$mOM{5rSu%+@,#y#%w#:,1+nwl:*&LC7NSL');
define('SECURE_AUTH_SALT', '4,]W:E&d(fR[^a70{xScQjan@M?FhD:!06zsVQj=:kN?,TDm|;TVd{(HZun>-nN(');
define('LOGGED_IN_SALT',   ')SVq9}wK.o7|_|!WRTWv|Q=sER$njn2se0`w:=|K)|jfsv*-u^]HdxAfc]>_Grn+');
define('NONCE_SALT',       '47Q[&O]+{%gE]KpGW,-*|}Y?aeyTg!M`M/|;)|neOiw(>1DRg^*h/AD^%g9&5.G4');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
