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

            include '../views/templates/cabecalho.php';
            include '../views/categorias/index.php';
            include '../views/templates/rodape.php';
            break;

        case 'show';
            $id = $_GET['id'];
            $crud = new CategoriaCrud();
            $categoria = $crud->getCategoria($id);
            include '../views/templates/cabecalho.php';
            include '../views/categorias/show.php';
            include '../views/templates/rodape.php';
            break;

            case 'inserir';
            if (!isset($_POST['gravar'])){ // se ainda nao tiver preenchido o form
                include '../views/templates/cabecalho.php';
                include '../views/categorias/inserir.php';
                include '../views/templates/rodape.php';
                break;
            }else{
                $nome = $_POST['nome'];
                $descricao= $_POST['descricao'];
                $novaCategoria = new Categoria(null,$nome,$descricao);

                $crud = new CategoriaCrud();
                $crud->insertCategoria($novaCategoria);

                header('Location: categoria.php');
            }

            case 'alterar';
            $id = $_GET['id'];
            $crud = new CategoriaCrud();

            $categoria = $crud->getCategoria($id);

            //receber id
            //instanciar o objeto -preciso deo getcategoria($id)
            //
    }




