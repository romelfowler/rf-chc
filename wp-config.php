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
define('DB_NAME', 'fundchc_chcdb');

/** MySQL database username */
define('DB_USER', 'fundchc_admin');

/** MySQL database password */
define('DB_PASSWORD', 'cu77inary4c');

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
 define('AUTH_KEY',         ';Y](ZV)KznP(Bguk,m:*eEol#k+uNj0Zo]sF`c<Klb$V+R${ofi-]117BLuvld#b');
 define('SECURE_AUTH_KEY',  '| :&|=k6h+tCgG T5]$ZC>v;&RGgZCu  N{xC*TwaeztXg|8!(+^>;sAzCH0[8cW');
 define('LOGGED_IN_KEY',    'uU}`rV)IErEP@Jn2=,x?CZc8B9!+{I?S~NryWR$Nl-@|`Iv$.6]yzA09*Za;!pK>');
 define('NONCE_KEY',        '&a-6</{-.F,0rlu/!<[oqiw,P +hLY3hD%|y|R~z&TY4Hs+>;u+w,mVu.Hpl+=&<');
 define('AUTH_SALT',        'byHmmRI6P*xf+H/,igqe-n:%I4=0~l0o(zKhbF3|&<>-:WV7V]K,Ox|EVexj*iv#');
 define('SECURE_AUTH_SALT', 'OchvcTAMJ<nv?t?d||cETx%4+ g.|up;xi/CG%h+p*(qBx%BZLdd~WAg@ O:1YO-');
 define('LOGGED_IN_SALT',   'a[IJbE|8%|U#RW1(gh8AE?j_Bu$RR3ac9h83/;rjR1nU:0?$3o|_m*1$yl<8E7#4');
 define('NONCE_SALT',       'fwe-:nSkukoq6j#42|dK4XNUP~)|bYkT>2>{O&G}w4<^=R-YSA-%[M%X|^NM:|x*');


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'chc_';

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
