<?php
require 'init.php';
// pega o ID da URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
// valida o ID
if (empty($id)) {
    echo "ID para alteração não definido";
    exit;
}
// busca os dados do usuário a ser editado
$PDO = db_connect();
$sql = "SELECT name, color, price, startdate, quantity FROM products WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$products = $stmt->fetch(PDO::FETCH_ASSOC);
// se o método fetch() não retornar um array, significa que o ID não corresponde 
// a um usuário válido
if (!is_array($products)) {
    echo "Nenhum produto encontrado";
    exit;
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Edição de Produtos</title>
        <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/btstrp.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-left">
        <h1>Sistema de Cadastro</h1>
        <h2>Edição de Produtos</h2>         
        <form action="edit.php" method="post" class='table table-hover table-responsive table-bordered'>
            <div class="form-group">
            <label for="name" class="control-label">Nome: </label>
            <br>
            <input class="form-control" placeholder="Digite o nome do produto" type="text" name="name" id="name" value="<?php echo $products['name'] ?>">
            <br><br>
            </div>
            <div class="form-group">
            <label for="color" class="control-label">Cor: </label>
            <br>
            <input class="form-control" placeholder="Digite a cor" type="text" name="color" id="color" value="<?php echo $products['color'] ?>">
            <br><br>
            </div>
            <div class="form-group">
            <label for="price" class="control-label">Preço: </label>
            <br>
            <input class="form-control" placeholder="Digite o preço" type="number" name="price" id="price" value="<?php echo $products['price'] ?>">
            <br><br>
            </div>
            <div class="form-group">
            <label for="startdate" class="control-label">Data de Entrada: </label>
            <br>
            <input class="form-control" type="date" name="startdate" id="startdate" placeholder="dd/mm/YYYY" value="<?php echo $products['startdate'] ?>">
            <br><br>
            </div>
            <div class="form-group">
            <label for="quantity" class="control-label">Quantidade: </label>
            <br>
            <input class="form-control" placeholder="Digite a quantidade" type="number" name="quantity" id="quantity" value="<?php echo $products['quantity'] ?>">
            <br><br>
            </div>
            <button type="submit" value="Alterar" class="btn btn-primary btn-sm">Alterar</button>
        </form>
        </div>
    </body>
</html>