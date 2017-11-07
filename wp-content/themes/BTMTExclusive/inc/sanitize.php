<?php
/**
 * Classe que contem os métodos que iram
 * filtrar as entradas enviadas via GET e POST
 *
 * @filesource
 * @author      Pedro Elsner <pedro.elsner@gmail.com>
 * @license     http://creativecommons.org/licenses/by/3.0/br/ Creative Commons 3.0
 * @abstract
 * @version     1.0
 */
abstract class Sanitize {
/**
 * Filter
 * 
 * @param  mixed $value
 * @param  array $modes
 * @return mixed
 * @static
 * @since  1.0
 */
    static public function filter($value, $modes = array('sql', 'html')) {
        if (!is_array($modes)) {
            $modes = array($modes);
        }
        if (is_string($value)) {
            foreach ($modes as $type) {
              $value = self::_doFilter($value, $type);
            }
            return $value;
        }
        foreach ($value as $key => $toSanatize) {
            if (is_array($toSanatize)) {
                $value[$key]= self::filter($toSanatize, $modes);
            } else {
                foreach ($modes as $type) {
                  $value[$key] = self::_doFilter($toSanatize, $type);
                }
            }
        }
        return $value;
    }
/**
 * DoFilter
 * 
 * @param  mixed $value
 * @param  array $modes
 * @return mixed
 * @static
 * @since  1.0
 */
    static protected function _doFilter($value, $mode) {
        switch ($mode) {
            case 'html':
                $value = strip_tags($value);
                $value = addslashes($value);
                $value = htmlspecialchars($value);
                break;
        
            case 'sql':
                $value = preg_replace(sql_regcase('/(from|select|insert|delete|where|drop table|show tables|#|\*| |\\\\)/'),'',$value);
                $value = trim($value);
                break;
        }
        return $value;
    }
}
?>



<?php
// Importa a classe necessária
require_once('sanitize.php');

// Filtra HTML e SQL Injection em todos os campos
$_GET = Sanitize::filter($_GET);
$_POST = Sanitize::filter($_POST);

// Somente HTML Injection
$_POST = Sanitize::filter($_POST, array('html'));

// Somente SQL Injection
$_POST = Sanitize::filter($_POST, array('sql'));

// Campos
$_GET['campo'] = Sanitize::filter($_GET['campo']);
$_POST['campo'] = Sanitize::filter($_POST['campo']);

?>