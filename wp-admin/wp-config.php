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
define('DB_NAME', 'c4admin');

/** MySQL database username */
define('DB_USER', 'c4admin');

/** MySQL database password */
define('DB_PASSWORD', 'pfetecadmin');

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
define('AUTH_KEY',         'ysC`~Rb!2;BGd:*=a$WgjF{>zm^{=~h+8nTwg`87Ej<N?HJC55wN-uvRa:L=bf8)');
define('SECURE_AUTH_KEY',  '4Yj|~orONhVMggo%Mv#[Mtq0jY*Nk=#|w}e4VU/bZxEja4kyxFXpClH7-@1nj.-@');
define('LOGGED_IN_KEY',    '(vQ#S|{}#6{5rat iOYk a/h*U#A0SdA9zM,h;S*BRJx@eR*a=;u$n~sc0o:,~:3');
define('NONCE_KEY',        '-ZO|1|<:HM?}agJttx9O+Y7%zsa$ -oJLPqzN/EJQba~_ZKy<H;RVSC(7?^%0WQx');
define('AUTH_SALT',        '}m+KhH$/M]Ei`).|2y 3liLeV^_g,zd~PBEz]RE%<S2&V4g-+rvZ+/Ea|:z8Mr2i');
define('SECURE_AUTH_SALT', '{3rQ*|w[EOy`^?X80.~T`|zu+woYF&nC>2hCg)|6n#ViD<`x-T-tA%s:jr7,;X[n');
define('LOGGED_IN_SALT',   'NMs5C>4|;yKu$PkFt5Q]9aS|rxET$BI_AP6uju{,k4RT{|I|Rdk[<7N,OrJa-Nkl');
define('NONCE_SALT',       '5y3 /Fr}%/:JNdHe ?&iIC9Jd]dZzlt1ZKq+2K|]4{SG^(CT+-s+`^Ts#];?<BC1');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');