<?php

    require_once '../modelos/CategoriaCrud.php';


    $crud = new CategoriaCrud();
    $categoria = $crud->getCategorias();

    if (isset($_GET['acao'])){
        $acao = $_GET['acao'];
    }else{
        $acao = 'index';
    }

    switch ($acao){

        case 'index':

            $crud = new CategoriaCrud();
            $categorias = $crud->getCategorias();
            include '../visualizações/templates/cabecalho.php';
            include '../visualizações/categorias/index.php';
            include '../visualizações/templates/rodape.php';
            break;

        case 'show';
            $id = $_GET['id'];
            $crud = new CategoriaCrud();
            $categoria = $crud->getCategoria($id);
            include '../visualizações/templates/cabecalho.php';
            include '../visualizações/categorias/show.php';
            include '../visualizações/templates/rodape.php';
            break;
    }




