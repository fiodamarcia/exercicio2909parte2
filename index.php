<?php
require_once 'init.php';
// abre a conexão
$PDO = db_connect();
// SQL para contar o total de registros
// A biblioteca PDO possui o método rowCount(), 
// mas ele pode ser impreciso.
// É recomendável usar a função COUNT da SQL
$sql_count = "SELECT COUNT(*) AS total FROM products ORDER BY name ASC";
// SQL para selecionar os registros
$sql = "SELECT id, name, color, price, startdate, quantity "
        . "FROM products ORDER BY name ASC";
// conta o toal de registros
$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();
// seleciona os registros
$stmt = $PDO->prepare($sql);
$stmt->execute();
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/btstrp.css" rel="stylesheet" type="text/css"/>
        <title>Sistema de Cadastro</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
        <h1>Sistema de Cadastro</h1>
        <p><a href="form-add.php" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Adicionar Produto</a><p/>
        <h2>Lista de Produtos</h2>
        <p>Total de produtos: <?php echo $total ?></p>
        <?php if ($total > 0): ?>
                </div>
            <table class='table table-hover table-responsive table-bordered'>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Cor</th>
                        <th>Preço</th>
                        <th>Data de Entrada</th>
                        <th>Quantidade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($products = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?php echo $products['name'] ?></td>
                            <td><?php echo $products['color'] ?></td>
                            <td><?php echo $products['price'] ?></td>
                            <td><?php echo dateConvert($products['startdate']) ?></td>
                            <td><?php echo $products['quantity'] ?></td>
                            <td>
                                <a href="form-edit.php?id=<?php echo $products['id'] ?>" class="btn btn-primary btn-sm active"
                                   role="button" aria-pressed="true">Editar</a>
                                <a href="delete.php?id=<?php echo $products['id'] ?> " class="btn btn-primary btn-sm active"
                                   role="button" aria-pressed="true"
                                   onclick="return confirm('Tem certeza de que deseja remover?');">
                                    Remover
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhum produto registrado</p>
        <?php endif; ?>
            <script src="js/bootstrap.min.js" type="text/javascript"></script>
    </body>
    </html>