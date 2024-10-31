<?php

    namespace App\model;

    use App\core\dataBase\Database;
    use PDO;
    use Exception;

    class CategoriaModel {

        private PDO $conexao;

        public function __construct()
        {
            $this->conexao = DataBase::estabelecerConexaoMySQL();
        }

        public function adicionarCategoria(string $nomeCategoria): string
        {
            
            try {
                $sql = "INSERT INTO categorias (nome) VALUES (:nome)";
                $stm = $this->conexao->prepare($sql);
                $stm->bindParam(':nome', $nomeCategoria);
                $stm->execute();

                return "Categoria adicionada com sucesso.";
            
            } catch(Exception $e) {
                throw new Exception("Falha ao adicionar a categoria.");
            }

        }

        public function carregarCategorias(): array
        {

            try {

                $sql = "SELECT * FROM categorias ORDER BY nome ASC";
                $stm = $this->conexao->prepare($sql);
                $stm->execute();
            
                return $stm->fetchAll(PDO::FETCH_ASSOC);
            
            } catch(Exception $e) {
                throw new Exception("Falha ao adicionar a categoria.");
            }

        }

        public function removerCategoria($id_categoria): string
        {

            try {

                $sql = "DELETE FROM categorias WHERE id_categoria = :id_categoria";
                $stm = $this->conexao->prepare($sql);
                $stm->bindParam(':id_categoria', $id_categoria);
                $stm->execute();
            
                return 'Categoria removida com sucesso.';
            
            } catch(Exception $e) {
                throw new Exception("Falha ao adicionar a categoria.");
            }

        }

        public function editarCategoria($id_categoria, $nome): string
        {

            try {

                $sql = "UPDATE categorias SET nome = :nome WHERE id_categoria = :id_categoria";
                $stm = $this->conexao->prepare($sql);
                $stm->bindParam(':id_categoria', $id_categoria);
                $stm->bindParam(':nome', $nome);
                $stm->execute();
            
                return 'Categoria editada com sucesso.';
            
            } catch(Exception $e) {
                throw new Exception("Falha ao adicionar a categoria.");
            }

        }

        public function editarRateio($arrayDados): string
        {

            try {

                foreach($arrayDados as $dados) {

                    foreach($dados as $dado) {

                        $rateio = $dado['valor'] == "" ? 0 : $dado['valor'];

                        $sql = "UPDATE categorias SET rateio = :rateio WHERE id_categoria = :id_categoria";
                        $stm = $this->conexao->prepare($sql);
                        $stm->bindParam(':rateio', $rateio);
                        $stm->bindParam(':id_categoria', $dado['id_categoria']);
                        $stm->execute();
                    
                    }

                }

                return 'Rateios editados com sucesso.';
            
            } catch(Exception $e) {
                throw new Exception("Falha ao adicionar o Rateio.");
            }

        }

    }