    <h2>Listagem de Categoria</h2>

    <a href="?acao=inserir">Inserir Nova Categoria</a>

    <table>
        <thead>
        <th>#</th>
        <th>Nome da Categoria</th>
        </thead>
        <tbody>
        <?php foreach ($categorias as $categoria):?>

            <tr>
                <td><?= $categoria->getId()?></td>
                <td><a href="?acao=show&id=<?= $categoria->getId()?>">
                        <?= $categoria->getNome()?>
                    </a>
                </td>
                <td>
                    <a href="">Alterar</a>
                </td>
            </tr>
        <?php endforeach;?>

        </tbody>
    </table>

