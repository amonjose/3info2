<html>

    <head>
        <title></title>
        <link rel="stylesheet" href="../../assets/css/teste.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script>
            $(document).ready(function() {

                // não mostrar ninguém
                $(".conteudo") .hide();

                // ao clicar em qualquer li
                $("#abas ul li").click(function (){

                    //alternar classe naquele em que cliquei
                    $(this).toggleClass("selecionado");

                    //guardo o valor do id de quem eu cliquei
                    var idAba = $(this) .attr("id");

                    //alternar exibição
                    $("." +idAba) .toggle();

                });



            });
        </script>

    </head>

    <body>
        <div id="abas">

            <ul>

                <!-- FOREACH percorrendo as categorias-->

                <li id="aba1">Aba 1 </li>
                <li id="aba2">Aba 2 </li>
                <li id="aba3">Aba 3</li>
            </ul>


        </div>


        <div id="conteudos">

            <div class="conteudo aba1">
                    conteudo 1
            </div>

            <div class="conteudo aba2" >
                    conteudo 2
            </div>

            <div class="conteudo aba3" >
                    conteudo 3
            </div>
        </div>

     </body>
</html>