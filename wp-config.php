<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'TVYonneWP' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '[EvX*u)9gq!V4|yFy5av8ZTsjrf]:u#f%o```)N4.ZZ_$Z=.ayx&ob/ms,8(!3i$' );
define( 'SECURE_AUTH_KEY',  '|]Hm6!:nU.;SPsoTjcoc|t1l>qSUWYZYrH9$RA_0R?>Jw2?kQ_iJ}*=fl{q>rbkd' );
define( 'LOGGED_IN_KEY',    '1(a(NsO/0!xZ.3}X8^5iZieArUtz[}IyNwN#]K17_qP:)lp&F~h$x5i}9}v.BaR~' );
define( 'NONCE_KEY',        '3(ot|j;}-cu5yN~}T3!jT/f]ra>^d]X%|7yjdf4`]t*x~6oEG_{Io1^wGJ&hi,8C' );
define( 'AUTH_SALT',        '?v?,SgYe4}!oOf^3n}fNmA7(f^kbG6hPl!2Bk~:<tL!o=U[D!YIDuY)T}nl^ O{G' );
define( 'SECURE_AUTH_SALT', '*$y(@$e?SR.,ZY52DaS|$/@vqTgMO(w#x9EdKcX9yfB7BxCd! Y/_Uh2)_fk>@CC' );
define( 'LOGGED_IN_SALT',   'PAa2=Chn^- t1@}SQ/eZgv[wIA&ueG-@AvmikhPWn@^XyNy]po99q[DUseQsIGo8' );
define( 'NONCE_SALT',       '}F`j/iKK{~&o#nE(@<+!`or-LUY|TFhl+dTGc<4uN2lUD=;),/J[iwdbky`L%e?;' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'TVY_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
