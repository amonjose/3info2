<?php

require_once '../modelos/CrudProdutos.php';
require_once '../modelos/CategoriaCrud.php';


if (isset($_GET['acao'])){
    $acao = $_GET['acao'];
}else{
    $acao = 'index';
}

switch ($acao){

    case 'index':

        $crudProd = new CrudProdutos();
        $produtos = $crudProd->getProdutos();

        $crudCat = new CategoriaCrud();
        $categorias = $crudCat->getCategorias();



        include '../views/templates/cabecalho.php';
        include '../views/produtos/index.php';
        include '../views/templates/rodape.php';
        break;

    case 'show';
        $id = $_GET['id'];
        $crud = new CrudProdutos();
        $produto = $crud->getProduto($id);
        include '../views/templates/cabecalho.php';
        include '../views/produtos/show.php';
        include '../views/templates/rodape.php';
        break;

    case 'inserir';
        if (!isset($_POST['gravar'])){ // se ainda nao tiver preenchido o form
            include '../views/templates/cabecalho.php';
            include '../views/produtos/inserir.php';
            include '../views/templates/rodape.php';
        }else{
            $nome = $_POST['nome_produto'];
            $descricao= $_POST['descricao_produto'];
            $novoProduto = new Produto();

            $crud = new CategoriaCrud();
            $crud->insertProduto($novoProduto);

            header('Location: produto.php');
        }
        break;

    case 'alterar';
        $id = $_GET['id'];
        $crud = new CategoriaCrud();

        $categoria = $crud->getCategoria($id);

}




