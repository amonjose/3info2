        <?php
        /**
         * Created by PhpStorm.
         * User: JEFFERSON
         * Date: 16/11/2017
         * Time: 10:56
         */

        require_once "Conexao.php";
        require_once "Produto.php";




        class CrudProdutos
        {

                private $conexao;
                private $produto;

                 public function __construct()
            {
                    $this->conexao = Conexao::getConexao();
            }

                 public function salvar(Produto $produto)
            {
                    $sql = "INSERT INTO produto (nome, preco, categoria, estoque, imagem) VALUES ('$produto->nome', $produto->preco, '$produto->categoria',$produto->estoque,'$produto->imagem')";

                     $this->conexao->exec($sql);
            }

                public function getProduto(int $codigo)
            {
                     $consulta = $this->conexao->query("SELECT * FROM produto WHERE codigo = $codigo");
                     $produto = $consulta->fetch(PDO::FETCH_ASSOC);

                     return new Produto($produto['nome'], $produto['preco'], $produto['categoria'], $produto['estoque'], $produto['codigo'], $produto['imagem']);

            }

                public function getProdutos()
            {
                    $consulta = $this->conexao->query("SELECT * FROM produto");
                     $arrayProdutos = $consulta->fetchAll(PDO::FETCH_ASSOC);

                     $listaProdutos = [];
                         foreach ($arrayProdutos as $produto) {

                    $listaProdutos [] = new Produto($produto['nome'], $produto['preco'], $produto['categoria'], $produto['estoque'], $produto['codigo'], $produto['imagem']);
                }

                return $listaProdutos;
            }

            public function excluirProduto(int $codigo)
            {

                //DELETE FROM table_name WHERE condition;
                $this->conexao->query("DELETE FROM produto WHERE codigo = $codigo");
            }

            public function editar(Produto $produto){

                $this->conexao->exec("UPDATE produto SET nome ='$produto->nome', preco = $produto->preco, categoria = '$produto->categoria', estoque = $produto->estoque, imagem= '$produto->imagem' WHERE codigo = $produto->codigo ");
            }

            public function comprar(int $codigo, int $qtdDesejada){

                $p = $this->getProduto($codigo);

                $estoqueAtual = $p->estoque;

                if ($qtdDesejada > $estoqueAtual){
                    return "hje nao querido";
                }else {

                    $novoEstoque = $estoqueAtual - $qtdDesejada;

                    $this->conexao->exec("UPDATE `produto` SET `estoque` = $novoEstoque WHERE `codigo` = $codigo");

                    return "hoje sim";
                }

            }

            public function getProduto(int $id){

                $sql      = "SELECT * FROM categoria WHERE id_categoria = $id";
                $resultado = $this->conexao->query($sql);
                $categoria  = $resultado->fetch(PDO::FETCH_ASSOC);
                $objeto = new Categoria($categoria['id_categoria'], $categoria['nome_categoria'], $categoria['descricao_categoria']);
                return $objeto;
            }
        }

