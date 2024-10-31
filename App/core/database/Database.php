<?php

    namespace App\core\dataBase;

    use Exception;
    use PDO;

    class DataBase {

        public static function estabelecerConexaoMySQL(): PDO
        {
            try {

                $pdo = new PDO("mysql:host=localhost;dbname=financas", "root", "");
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            
                return $pdo;
            
            } catch (Exception $e) {
                throw new Exception("Erro ao conectar ao banco de dados: " . $e->getMessage());
            }

        }
    }