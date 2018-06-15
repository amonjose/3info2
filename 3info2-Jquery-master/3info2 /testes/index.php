<?php


require_once '../app/modelos/CategoriaCrud.php';
require_once '../app/modelos/CrudProdutos.php';

if (isset($_GET['acao'])){

    $acao = $_GET['acao'];

}else{

    $acao = 'index';
}

switch ($acao) {

    case 'index':
        $catcrud = new CategoriaCrud();
        $categorias = $catcrud->getCategorias();

        include '../app/views/produtos/index.php';
        break;
}