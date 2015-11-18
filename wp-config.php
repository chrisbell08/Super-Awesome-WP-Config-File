<?php
/**
 * Custom Site Settings
 */

// Local Config
$localConfig = [
    'url' => 'LOCAL_SITE_URL', // <- "localhost:8888" if using MAMP
    'protocol' => 'http', // http or https
    'host' => 'DATABASE_HOST',
    'db' => 'DATABASE_NAME',
    'user' => 'DATABASE_USER',
    'pass' => 'DATABASE_PASSWORD',
    'debug' => true,
];

// Staging Config
$stagingConfig = [
    'url' => 'STAGING_SITE_URL', // <- Don't include the http://
    'protocol' => 'http', // http or https
    'host' => 'DATABASE_HOST',
    'db' => 'DATABASE_NAME',
    'user' => 'DATABASE_USER',
    'pass' => 'DATABASE_PASSWORD',
    'debug' => false,
];

// Production Config
$productionConfig = [
    'url' => 'PRODUCTION_SITE_URL', // <- Don't include the http://
    'protocol' => 'http', // http or https
    'host' => 'DATABASE_HOST',
    'db' => 'DATABASE_NAME',
    'user' => 'DATABASE_USER',
    'pass' => 'DATABASE_PASSWORD',
    'debug' => false,
];


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
$environment = $_SERVER['HTTP_HOST'];

if ($environment === $localConfig['url']) {
    $actualConfig = $localConfig;
} else if ($environment == $stagingConfig['url']) {
    $actualConfig = $stagingConfig;
} else {
    $actualConfig = $productionConfig;
}

$url = $actualConfig['protocol'] . "://" . $actualConfig['url'];

define('DB_USER', $actualConfig['user']);
define('DB_PASSWORD', $actualConfig['pass']);
define('DB_HOST', $actualConfig['host']);
define('DB_NAME', $actualConfig['db']);
define('WP_DEBUG', $actualConfig['errors']);
define('WP_HOME', $url);
define('WP_SITEURL', WP_HOME);


// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */

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
define('AUTH_KEY',         ':Enw5Mzm>~+{|qGI9T?(IYt|8_8I7SUQn*VFfLW#OGe]j<C2w3DON%l6OE<,txCd');
define('SECURE_AUTH_KEY',  'Ci[lSkh2:14ob=P-9I^XRc=e@V* $TJm(YU!IS]?|a& HQ+%$Pfu}UW/X/,8B)9B');
define('LOGGED_IN_KEY',    '2UwD^b+8oJ|[wi69xcl-#G@BL%Y/961|8`M0k-EP-[Y[Xq5n|.@3HX0kLiF%cD{Q');
define('NONCE_KEY',        'VbUXhu-<R~fa(k gjXhQI6FEzy*Yfio%K7}mU6R+b~%#k*M+aC#/eMZNVg,nQC.%');
define('AUTH_SALT',        'NM,cN)qcsIMgUvV.ZBO8~aPM+0Ov`m2rioV1v0aKy~Hs[fu:|@Tr{QLnRkavYGgY');
define('SECURE_AUTH_SALT', '(?VNN2PU6Ebp8,L{+78OS|}1f[svM.y*fa56sVzhhKs$;pNT1R7/J?!j&zu48Vf2');
define('LOGGED_IN_SALT',   'pDY.XdUMLv;/2a7SO;@&q^!Sj=|#DX#KsP};+>k5;<}M {+I^DFG%-k.^jMvr_3|');
define('NONCE_SALT',       'K~VIH~8<#g#mM$g(XgR`j6g+*W~^3)#/%jP:a<QVDEnROL%+LWHG)/A?T2w!okQS');
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


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
