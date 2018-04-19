    <h2>Listagem de Categoria</h2>
    <table>
        <a href="3info2-master/"
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
                    <a>alterar</a>
                </td>
            </tr>
        <?php endforeach;?>

        </tbody>
    </table>

