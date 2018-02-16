<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações
// com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'slidetv');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'miguel');

/** Nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '$pZ3U9EH[~u.;}P-O$m`YMLaD)0:cZ840c!BL^V#KhfQ2T{2j)ZC?h.MsdiUVn)A');
define('SECURE_AUTH_KEY',  '*{Qzi,7r{3W&j2=hpYV}u@]k!~z/Mm)azQ{0^Me*ChYI;+/R5q}yl}19N`=X]&[]');
define('LOGGED_IN_KEY',    'bO1^PI+^)[{eMLg<p6}0G >AVny8Qu^;,o(V!KaU$&m)PFX{Ym|WN5ojzMKv$ErU');
define('NONCE_KEY',        '&|;@EdnS2!&jD86a5HTD83{?[k`@s_YX)TDk%DQp+:A:)rpoVL5)zP-{e~Ttbw9|');
define('AUTH_SALT',        '5BhbSq~~{P5$B;?eD=#0 ,i^?}P%EAoL9fE{6Yw`FT@`}gMpFkt4jY(a7{:65[HE');
define('SECURE_AUTH_SALT', 'py&u]Hxy0xkabo[p~WrdA!^@&r~SVd-iq85JEQ3/$Z:aY2Q27j>]wrB#u}EcwJED');
define('LOGGED_IN_SALT',   '6Y$3qx IJ<<N1QU{mT?v-VL$0u$[IV1ef2E9`?EcomA-`eiZ<SI mI&YL$85`<;Z');
define('NONCE_SALT',       'DwsJm/}7y_.{UG(]^LtUwYrjkp-G$Ld~Mo:`Rf>14-A8B^uG|~bC#p7r1$w=n!/x');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix  = 'stv_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);
define('FS_METHOD', 'direct');
/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
