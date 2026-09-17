<?php
/**
 * Import ENV settings for Docker containers.
 *   ln -s config.docker.php config.php
 */


/**
 * Path to access phpipam in site URL, http:/url/BASE/
 * If not defined it will be discovered and set automatically.
 *
 * BASE definition should end with a trailing slash "/"
 * Examples:
 *
 *  If you access the login page at http://company.website/         =  define('BASE', "/");
 *  If you access the login page at http://company.website/phpipam/ =  define('BASE', "/phpipam/");
 *  If you access the login page at http://company.website/ipam/    =  define('BASE', "/ipam/");
 *
 */

getenv('IPAM_BASE') ? define('BASE', getenv('IPAM_BASE')) : false;

/**
 * Import default values
 */
require('config.dist.php');

/**
 * Disable installation helper scripts /app/install/ after initial setup
 */
$disable_installer = filter_var(getenv('IPAM_DISABLE_INSTALLER'), FILTER_VALIDATE_BOOLEAN);

/**
 * database connection details
 ******************************/
$db['host']    = getenv('IPAM_DATABASE_HOST');
$db['user']    = getenv('IPAM_DATABASE_USER');
$db['pass']    = getenv('IPAM_DATABASE_PASS');
$db['name']    = getenv('IPAM_DATABASE_NAME');
$db['port']    = getenv('IPAM_DATABASE_PORT');
$db['webhost'] = getenv('IPAM_DATABASE_WEBHOST');

/**
 * Reverse proxy settings
 *
 * If operating behind a reverse proxy set IPAM_TRUST_X_FORWARDED=true to accept the following headers
 *
 * WARNING! These headers shoud be filtered and/or overwritten by the reverse-proxy to avoid potential abuse by end-clients.
 *
 *   X_FORWARDED_FOR
 *   X_FORWARDED_HOST
 *   X_FORWARDED_PORT
 *   X_FORWARDED_PROTO
 *   X_FORWARDED_SSL
 *   X_FORWARDED_URI
 */
$trust_x_forwarded_headers = filter_var(getenv('IPAM_TRUST_X_FORWARDED'), FILTER_VALIDATE_BOOLEAN);

/**
 * proxy connection details
 ******************************/
$proxy_enabled  = getenv('PROXY_ENABLED');
$proxy_server   = getenv('PROXY_SERVER');
$proxy_port     = getenv('PROXY_PORT');
$proxy_user     = getenv('PROXY_USER');
$proxy_pass     = getenv('PROXY_PASS');
$proxy_use_auth = getenv('PROXY_USE_AUTH');

$offline_mode   = filter_var(getenv('OFFLINE_MODE'), FILTER_VALIDATE_BOOLEAN);

/**
 * php debugging on/off
 *
 * true  = SHOW all php errors
 * false = HIDE all php errors
 ******************************/
$debugging = filter_var(getenv('IPAM_DEBUG'), FILTER_VALIDATE_BOOLEAN);

/**
 * Cookie SameSite settings ("None", "Lax"=Default, "Strict")
 * - "Strict" increases security
 * - "Lax" required for SAML2, some SAML topologies may require "None".
 * - "None" requires HTTPS (implies "Secure;")
 */
$cookie_samesite = getenv('COOKIE_SAMESITE');

/**
 * Session storage - files or database
 *
 * @var string
 */
$session_storage = "database";


/**
 * General tweaks
 ******************************/
$config['footer_message'] = getenv('IPAM_FOOTER_MESSAGE', $config['footer_message']);
