<?php

require_once 'BDConection.php';
require_once 'Categoria.php';

class CategoriaCrud
{
    public function __construct()
    {
        $this->conexao = BDConection::getConexao();
    }

    public function getCategorias(){

        $sql = "select * from categoria order by nome_categoria";
        $resultado = $this->conexao->query($sql);
        $listaCategorias = [];

        $categorias = $resultado->fetchAll(PDO::FETCH_ASSOC);
        foreach ($categorias as $categoria){
            $objeto = new Categoria($categoria['id_categoria'], $categoria['nome_categoria'], $categoria['descricao_categoria']);
            $listaCategorias[] = $objeto;
        }
        return $listaCategorias;
    }

    public function getCategoria(int $id){

        $sql      = "SELECT * FROM categoria WHERE id_categoria = $id";
        $resultado = $this->conexao->query($sql);
        $categoria  = $resultado->fetch(PDO::FETCH_ASSOC);
        $objeto = new Categoria($categoria['id_categoria'], $categoria['nome_categoria'], $categoria['descricao_categoria']);
        return $objeto;
    }

    public function insertCategoria(Categoria $categoria){

        $consulta = "INSERT INTO categoria (nome_categoria, descricao_categoria) VALUES ( '{$categoria->getNome()}', '{$categoria->getDescricao()}')";

        $this->conexao->exec($consulta);

    }

    public function updateCategoria(Categoria $categoria){

        $consulta = "UPDATE Categoria SET nome_categoria = '{$categoria->getNome()}', descricao_categoria = '{$categoria->getDescricao()}' WHERE id_categoria = $categoria->getId()";

    }

    public function deleteCategoria(int $id_categoria){

    }
}

