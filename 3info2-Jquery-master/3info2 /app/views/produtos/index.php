<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        // não mostrar ninguém
        $(".conteudo").hide();

        // ao clicar em qualquer li
        $("#abas ul li").click(function (){

            //alternar classe naquele em que cliquei
            $(this).toggleClass("selecionado");

            //guardo o valor do id de quem eu cliquei
            var idAba = $(this).attr("id");


            //alternar exibição
            $("." +idAba).toggle(300);

        });
        //
        // $("#conteudos").click(function () {
        //     $("#descricao").show();
        // });
        //
    });

</script>
<link rel="stylesheet" href="../../assets/css/teste.css">
<div id="abas">

        <?php foreach ($categorias as $categoria) : ?>
            <ul >
                <li id="cat<?= $categoria->getId(); ?>"><?= $categoria->getNome(); ?></li>
            </ul>
        <?php endforeach; ?>

</div>

<div id="conteudos">
    <?php foreach ($produtos as $produto) : ?>
        <div class="conteudo cat<?= $produto->getIdCategoria(); ?>">
            <img src="../../imagens/<?= $produto->getFoto()?>" class="foto-produto" alt="">
            
            <?= $produto->getNome() ?>
        </div>
    <?php endforeach; ?>

</div>

<!--<div id="descricao">-->
<!--    --><?php //foreach ($produtos as $produto) : ?>
<!--        <div class="descricaocat--><?//= $produto->getDescricao(); ?><!--">-->
<!---->
<!--        </div>-->
<!--    --><?php //endforeach; ?>
<!---->
<!--</div>-->
