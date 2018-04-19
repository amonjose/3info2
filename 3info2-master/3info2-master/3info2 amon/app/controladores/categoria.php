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
        case 'inserir':

            if(!isset($_POST['gravar'])){
                include '../visualizações/templates/cabecalho.php';
                include '../visualizações/categorias/inserir.php';
                include '../visualizações/templates/rodape.php';


            }else{ //gravar dados no BD

                $nome = $_POST['nome'];
                $descricao = $_POST['descricao'];
                $novaCategoria = new CategoriaCrud();

                $crud = new CategoriaCrud();
                $crud -> insertCategoria($novaCategoria);

                header('Location: categorias.php');


            }
        case 'alterar':
            $id = $_GET['id'];
            $crud = new CategoriaCrud();

            $categoria = crud
            //receber o id
            //instanciar esse objeto - preciso do getCategoria($id)
            //aprento o form preenchido
    }




