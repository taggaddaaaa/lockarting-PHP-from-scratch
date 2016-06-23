<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clefs secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C'est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d'installation. Vous n'avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'lockartiiwblog');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'lockartiiwblog');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'Kartman34');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'lockartiiwblog.mysql.db');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

/** Type de collation de la base de données.
  * N'y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '4/&+3<k.2I[U)VrNmIeS=s#Fxidi+^iJ43wa7)OrQX[OnNE&XYD:-ExFcNo7MSg`');
define('SECURE_AUTH_KEY',  'J5}[.u$c0d@3Xvb.<m9@wMQ*g+8z |KK;+DPmE2k< R-l-4|SzAfam(<`G3a,:ay');
define('LOGGED_IN_KEY',    '|(e6_Z9,A*_i~5l3@|XYFy#)VHFc`pcU#e%1??#R|k+`oP5HP={0XAJlA4RXEvfO');
define('NONCE_KEY',        'R/(>C|u50]MEB,-b8FEs@,V;Q|u&0?N2 1lqX;$Dc-m;>%snr^R9I)`|bjxzv`ok');
define('AUTH_SALT',        '%7<d9|mF(JaTvPF(b3*/UZ<?-S]]+>vtsWIl5b$tqNwhw9L/ ,i&zIr,tl>RaZ/j');
define('SECURE_AUTH_SALT', 'CU]-G.^}ap~7|?Q7DcI;N+a_HomE<g xiggXTeYy%f.L`l_0-{j)++|_| +3U_Of');
define('LOGGED_IN_SALT',   'P!ZTTj&Fy%2+lL=BvV#s-$(&H))-.yS-ojq(h~9Pqvp$ht$BIvn-fLy?-JjV. F(');
define('NONCE_SALT',       'mJe`ch<|+l-r@fK-KhTZ5O(]L(ud!k+{(qJM]C<b=*7O891JZpsyeloh}}7Jm^Lk');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d'information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', true);

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
