<?php
require 'init.php';
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cadastro de Produtos</title>
        <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/btstrp.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="text-left">
        <h1>Sistema de Cadastro</h1>
        <h2>Cadastro de Produto</h2>
        <form action="add.php" method="post" class='table table-hover table-responsive table-bordered'>
            <div class="form-group">
            <label for="name" class="control-label">Nome: </label>
            <br>
            <input class="form-control" placeholder="Digite o nome do produto" type="text" name="name" id="name">
            <br><br>
            </div>
            <div class="form-group">
            <label for="color" class="control-label">Cor: </label>
            <br>
            <input class="form-control" placeholder="Digite a cor" type="text" name="color" id="color">
            <br><br>
            </div>
            <label for="price" class="control-label">Preço: </label>
            <br>
            <input class="form-control" placeholder="Digite o preço" type="number" name="price" id="price">
            <br><br>
            <div class="form-group">
            <label for="startdate" class="control-label">Data de Entrada: </label>
            <br>
            <input class="form-control" type="date" name="startdate" id="startdate" placeholder="dd/mm/YYYY">
            <br><br>
            </div>
            <div class="form-group">
            <label for="quantity" class="control-label">Quantidade: </label>
            <br>
            <input class="form-control" placeholder="Digite a quantidade" type="number" name="quantity" id="quantity">
            <br><br>
            </div>
            </div>
            <div class="container">
            <div class="row">
                <div class="col-xs-6 col-md-4">
                <button type="submit" value="Cadastrar" class="btn btn-primary btn-sm">Cadastrar</button>
                </div>
        </form>
    </body>
</html>