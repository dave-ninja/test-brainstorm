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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'test_brainstorm' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'yC4uRuP>o3Y:@T7b@m?WTvu $d{wwY|ceU,Z5tfe_PsHrHA;bIVspE_~)>s&GA`^' );
define( 'SECURE_AUTH_KEY',  'KYJfI|h~iRd?k{D*ZA2<h^*3*7KTA;evlh1z[$)I*WeM6nXdlmbgMf6}eY;/MYw2' );
define( 'LOGGED_IN_KEY',    '>`BXljI`Qm>Ebj .gfeY<!6-vgj<dEl?L]t`chZ:5vr*<.`[@}0=Cux9JzzP@JH=' );
define( 'NONCE_KEY',        'v5yQ<{qNeN,.<e%((nzIcq!]2LQjfh#bN/!m,~ON[F}jwkMN%_mCYj8z[Fgbn4kT' );
define( 'AUTH_SALT',        '?(^Pt}GovZ8;z1Stz }:[yFMhaNH]Cf|7vlh(?VH6;glK6;n2I1]p%SpZwNxkKJH' );
define( 'SECURE_AUTH_SALT', '[~SEaPjMAak^qXi]F]bsJ?vpSQb*5X$>KG =uJWif*_7dLI6mTMIZ=Eo=1;,3#j1' );
define( 'LOGGED_IN_SALT',   'VO&V@wU[@N6YN8VBgm-ex4t*Gm`y{/mk6?zRMP;-SSC|dBid-5,BR`g/@?hyz|:&' );
define( 'NONCE_SALT',       ']Bk}7yFMO<d(mRpG&H1gY]a=X]E&u7I5yrX4)}yN{L#A]?z?50G[U8){+L%qf@>S' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
