<?php

    namespace App\controller;

    use App\core\Controller;
    use App\controller\Template\Template;
    use App\model\CategoriaModel;
    use Exception;

    class CategoriaController extends Controller implements Template {

        private CategoriaModel $categoriaModel;

        public function __construct()
        {
            $this->categoriaModel = new CategoriaModel;
        }

        public function index(): void
        {
            $this->carregarView('categorias/categorias');   
        }

        public function adicionarCategoria(): void
        {
            $input = file_get_contents('php://input');
            $dados = json_decode($input, true);

            if(empty($dados['nomeCategoria'])) {
                http_response_code(400);
                echo json_encode(['msg' => 'O nome da categoria é obrigatório']);
                return;
            }

            try {
                $resultado = $this->categoriaModel->adicionarCategoria($dados['nomeCategoria']);
                http_response_code(200);
                echo json_encode(['msg' => $resultado]);
            } catch(Exception $e) {
                http_response_code(500);
                echo json_encode(['msg' => 'Falha ao inserir a Categoria.']);
            }


        }

        public function carregarCategorias(): void
        {
            try {
                $categorias = $this->categoriaModel->carregarCategorias();
                http_response_code(200);
                echo json_encode($categorias);
            } catch(Exception $e) {
                http_response_code(500);
                echo json_encode(['msg' => 'Falha ao carregar as Categorias.']);
            }
        }

        public function removerCategoria($id_categoria)
        {

            try {
                $categorias = $this->categoriaModel->removerCategoria($id_categoria);
                http_response_code(200);
                echo json_encode(['msg' => 'Categoria removida com sucesso.']);
            } catch(Exception $e) {
                http_response_code(500);
                echo json_encode(['msg' => 'Falha ao carregar as Categorias.']);
            }

        }

        public function editarCategoria($id_categoria)
        {

            $input = file_get_contents('php://input');
            $dados = json_decode($input, true);

            try {
                $categorias = $this->categoriaModel->editarCategoria($id_categoria, $dados['nomeCategoria']);
                http_response_code(200);
                echo json_encode(['msg' => $categorias]);
            } catch(Exception $e) {
                http_response_code(500);
                echo json_encode(['msg' => 'Falha ao editar a Categorias.']);
            }

        }

        public function editarRateio()
        {
            $input = file_get_contents('php://input');
            $dados = json_decode($input, true);

            try {
                $this->categoriaModel->editarRateio($dados);
                http_response_code(200);
                echo json_encode(['msg' => 'Rateios editados com sucesso.']);
            } catch(Exception $e) {
                http_response_code(500);
                echo json_encode(['msg' => 'Falha ao editar o Rateio.']);
            }
        }

    }