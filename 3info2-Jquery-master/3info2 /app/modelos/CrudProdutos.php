<?php
/**
 * Created by PhpStorm.
 * User: JEFFERSON
 * Date: 16/11/2017
 * Time: 10:56
 */

require_once "BDConection.php";
require_once "Produto.php";

class CrudProdutos
{

    private $conexao;


    public function __construct()
    {
        $this->conexao = BDConection::getConexao();
    }

    public function salvar(Produto $produto)
    {
        $sql = "INSERT INTO produto (nome, preco, categoria, estoque, imagem) VALUES ('$produto->getNome()', $produto->getPreco(), $produto->getIdCategoria(),'$produto->getFoto()')";

        $this->conexao->exec($sql);
    }

    public function getProduto(int $id)
    {
        $consulta = $this->conexao->query("SELECT * FROM produto WHERE id_produto = $id");
        $produto = $consulta->fetch(PDO::FETCH_ASSOC);

        return new Produto($produto['id_produto'], $produto['nome_produto'], $produto['descricao_produto'], $produto['foto_produto'], $produto['preco_produto'], $produto['id_categoria']);

    }

    public function getProdutos()
    {
        $consulta = $this->conexao->query("SELECT * FROM produto");
        $arrayProdutos = $consulta->fetchAll(PDO::FETCH_ASSOC);

        $listaProdutos = [];
        foreach ($arrayProdutos as $produto) {

            $listaProdutos [] = new Produto($produto['id_produto'], $produto['nome_produto'], $produto['descricao_produto'], $produto['foto_produto'], $produto['preco_produto'], $produto['id_categoria']);
        }

        return $listaProdutos;
    }

    public function excluirProduto(int $codigo)
    {
        //DELETE FROM table_name WHERE condition;
        $this->conexao->query("DELETE FROM produto WHERE id = $codigo");
    }

    public function editar(Produto $produto){

        $this->conexao->exec("UPDATE produto SET nome ='{$produto->getNome()}', preco = {$produto->getPreco}, categoria = {$produto->getIdCategoria()}, foto= '{$produto->getFoto()}' WHERE id = {$produto->getId()} ");
    }

    public function insertProduto(Produto $produto){

        $consulta = "INSERT INTO produto (nome,descricao,foto,preco) VALUES ( '{$produto->getNome()}', '{$produto->getDescricao()}','{$produto->getFoto()}', '{$produto->getPreco()}' )";

        $this->conexao->exec($consulta);

    }

    public function updateProduto(Produto $produto){

        $consulta = "UPDATE Produto SET nome = '{$produto->getNome()}', descricao = '{$produto->getDescricao()}', preco = {$produto->getPreco()}, imagem = '{$produto->getFoto()}',  WHERE id = $produto->getId()";

    }

    public function deleteProduto(int $id){

    }

//    public function comprar(int $codigo, int $qtdDesejada){
//
//        $p = $this->getProduto($codigo);
//
//        $estoqueAtual = $p->estoque;
//
//        if ($qtdDesejada > $estoqueAtual){
//            return "hje nao querido";
//        }else {
//
//            $novoEstoque = $estoqueAtual - $qtdDesejada;
//
//            $this->conexao->exec("UPDATE `tb_produtos` SET `estoque` = $novoEstoque WHERE `codigo` = $codigo");
//
//            return "hoje sim";
//        }
//    }

}

