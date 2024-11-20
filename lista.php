<?php
session_start();
require_once('conexao.php');

$sql = "SELECT * FROM lista_categoria";
$categorias = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Finanças - Categorias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Lista de Categorias</h1>
        <div class="table">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="categoria_create.php" class="btn btn-success">Adicionar categoria</a>
            </div>
        </div>

        <div class="card mb-4">
            <?php foreach ($categorias as $categoria): ?>
                <div class="card-body">
                    <table class="table table-bordered tablestriped">
                        <thead>
                            <tr>
                                <th>Nº</th>
                                <th>Categoria</th>
                                <th class="text-center" >Ações</th>
                            <tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td><?php echo $categoria['numero_categoria']; ?></td>
                                <td><?php echo $categoria['nome_categoria']; ?></td>
                                <td>
                                    <div class="aling-items-center gap-2 ">
                                        <a href="edit_categoria.php?id=<?= $categoria['id_categoria'] ?>" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-fill"></i> Editar
                                        </a>
                                        <form action="acoes_categoria.php" method="POST" class="d-inline">
                                            <button onclick="return confirm('Excluir categoria ?')" name="delete_categoria" type="submit" value="<?= $categoria['id_categoria']; ?>" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash-fill"></i> Excluir
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    </table>
                </div>
            <?php endforeach ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>