<?php

    require_once '../modelos/CategoriaCrud.php';


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
            }else{
                $nome = $_POST['nome'];
                $descricao= $_POST['descricao'];
                $novaCategoria = new Categoria(null,$nome,$descricao);

                $crud = new CategoriaCrud();
                $crud->insertCategoria($novaCategoria);

                header('Location: categoria.php');
            }
            break;

        case 'alterar';
            if (!isset($_POST['gravar'])){
                $id = $_GET['id'];
                $crud = new CategoriaCrud();
                $categoria = $crud->getCategoria($id);
                include '../views/templates/cabecalho.php';
                include '../views/categorias/alterar.php';
                include '../views/templates/rodape.php';
            }else{
                $cat = new Categoria();
                $cat->setId($_GET['id']);
                $cat->setNome($_POST['nome']);
                $cat->setDescricao($_POST['descricao']);
                $editar = new CategoriaCrud();
                $editar->updateCategoria($cat);
                header('Location: categoria.php');
            }
            break;
            case 'teste';
            include '../views/produtos/teste.php';

    }




