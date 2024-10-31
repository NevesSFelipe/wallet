<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>FSN | Wallet</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?= URL_BASE . 'assets/css/index.css?' . time() ?>">
    </head>
    
    <body>
        
        <div class="container">

            <div class="row mt-4 mb-3">

                <div class="col-sm-6">
                    <h3 class="text-info">Categorias</h3>
                </div>

                <div class="col-sm-6">
                    <a href="<?= URL_BASE . 'index' ?>">
                        <i title='Retornar Menu' class="fa-solid fa-rotate-left btn btn-danger float-end ms-2"></i>
                    </a>
                    <i title='Nova Categoria' class="fa-solid fa-plus btn btn-info float-end" onclick='abrirModalAdicionar()'></i>
                </div>

            </div>

            <table class="table table-striped table-bordered text-center">
                
                <thead>
                    
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th title='Defina a % que sera direcionada para cada categoria'  scope="col" class="iconeInformativo">
                            Rateio (%)
                            <i onclick="abrirModalRateio()" class='btnAcoes text-success fa-solid fa-pen-to-square'></i>
                        </th>
                        <th scope="col">Ações</th>
                    </tr>

                </thead>

                <tbody id='tbody_categorias'></tbody>

            </table>

        </div>

        <?php include_once __DIR__ . '\modal\add_edt_categoria.php' ?>
        <?php include_once __DIR__ . '\modal\editar_rateio.php' ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="<?= URL_BASE . 'assets/js/index.js?' . time() ?>"></script>
        <script src="<?= URL_BASE . 'assets/js/categorias.js?' . time() ?>"></script>
        <script src="<?= URL_BASE . 'assets/js/rateios.js?' . time() ?>"></script>
        <script src="https://kit.fontawesome.com/910e6444fa.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>

</html>