<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'C349606_wordpress');

/** MySQL database username */
define('DB_USER', 'C349606_admin');

/** MySQL database password */
define('DB_PASSWORD', 'Canner2');

/** MySQL hostname */
define('DB_HOST', 'mysql1419.ixwebhosting.com');

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
define('AUTH_KEY',         'TT4i3?H8(pp0.GPljcpkz4X;w)/0<J)&|G%AyI@|]gd|>Y?<b>R:_,TFm0!fBPgK');
define('SECURE_AUTH_KEY',  'q]%7qXW)TreD(Bb8i,j-Y:gN8Trj$#SY N`X,mIMnq{``_I9p V:>xZ++f[B.U;F');
define('LOGGED_IN_KEY',    'N27vIUP*}=%4+|okBdH@au/qkTFw7S|]q~+L7[uiCm2 ~#&I!&6GpvT{&D7/?$9i');
define('NONCE_KEY',        'ku{<qQEVR[8^kd|)jxK^++i(1~{0FeLW,~[~@]W,gY-,;>A?<dCw~%fKMmtH_Up*');
define('AUTH_SALT',        '+@Pf9b4)uFL}4QS>{$m!iiO*/Cbd5c*v--K(4v3ICOcTd8z^i?g^y5Z2v|-;Dq7+');
define('SECURE_AUTH_SALT', 'CQfh:3x^T*bUA7E4o F:ayd/3#&$8.|8FOi.n$<GL<+Rxl!oN!x>kuZo5je 9j{G');
define('LOGGED_IN_SALT',   'HC?[4J}Ovi}(7$9a*sI(OE%Nn29A#8r_W+!<Ib*^-X3zm~5>H8h3-6C-CLY5`h<[');
define('NONCE_SALT',       'MFTP7w]|I{r6jBm4jXN|xGZI-rx }U_4My$XIl<p;AK-$9eD2e|qSnTw&=)1sv!M');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

define( 'WP_DEBUG_LOG', false );

define( 'WP_DEBUG_DISPLAY', false );

define( 'WP_MEMORY_LIMIT', '64M' );
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
