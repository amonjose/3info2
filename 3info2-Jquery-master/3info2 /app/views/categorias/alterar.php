<h2>Alterar Categoria</h2>

<form method="post" action = "categoria.php?acao=alterar&id=<?= $categoria->getId(); ?>">

    <label for="nome">Nome</label>
    <input type="text" name="nome" value="<?= $categoria->getNome(); ?>">

    <label for="descricao">Descrição</label>
    <textarea name="descricao" id="descricao" cols="30" rows="10">
        <?= $categoria->getDescricao(); ?>
    </textarea>

    <input type="submit" name="gravar" value="Gravar">


</form>