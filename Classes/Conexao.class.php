<?php
final class Conexao
{
    private function __construct()
    {

    }
    private static function conectar()
    {
        try {
            if (!(defined('db_user'))) {
                define('db_user', 'Root');
            }
            if (!(defined('db_host'))) {
                define('db_host', 'Localhost');
            }
            if (!(defined('db_pass'))) {
                define('db_pass', 'root');
            }
            if (!(defined('db_name'))) {
                define('db_name', 'clinica');
            }
            if (!(defined('db_port'))) {
                define('db_port', 3306);
            }

        
            $db = new mysqli(db_host, db_user, db_pass, db_name, db_port) or die('Erro ao conectar' . $db->connect_error);
            return $db;
        } catch (mysqli_sql_exception $e) {
            echo 'Problemas ao conectar o banco de dados 00000000000 ' . $e->getMessage();
        }
    }


    public static  function query($sql)
    {
      return self::conectar()->query($sql);
    }

}
?>