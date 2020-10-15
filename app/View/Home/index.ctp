<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="pt-br"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="pt-br"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="pt-br"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="pt-br"> <!--<![endif]-->
    <head>

        <!-- Basic Page Needs
        ================================================== -->
        <meta charset="utf-8">
        <title>Sebrae Sempre</title>
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Mobile Specific Metas
        ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- CSS
        ================================================== -->
        <?php
        echo $this->Html->css('style');
        echo $this->Html->css('animate');
        echo $this->Html->css('jquery.jscrollpane');
        echo $this->Html->css('papawlo');
        ?>


        <?php echo $this->Html->script('libs/jquery-2.1.1.min.js'); ?>        
        <?php echo $this->Html->script('libs/jquery-ui.min.js'); ?>
        <?php echo $this->Html->script('libs/jquery.lazylinepainter-1.1.min.js'); ?>
        <?php echo $this->Html->script('libs/jquery.validate.min.js'); ?>
        <?php echo $this->Html->script('libs/raphael-min.js'); ?>
        <?php echo $this->Html->script('libs/jquery.form.js'); ?>
        <?php echo $this->Html->script('libs/wow.min.js'); ?>
        <?php echo $this->Html->script('libs/jquery.jscrollpane.min.js'); ?>
        <?php echo $this->Html->script('libs/jquery.mousewheel.js'); ?>
        <?php echo $this->Html->script('calendario.js'); ?>       
        <?php // echo $this->Html->script('main.js'); ?>

        <script>
            new WOW().init();
        </script>

        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Favicons
        ================================================== -->
        <link rel="shortcut icon" href="img/favicon.ico">
        <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

    </head>
    <body>
        <header>
            <div class="container">
                <div class="four columns">
                    <a href="/"><?php echo $this->Html->image('logo_sempre.svg', array("width" => "242", "height" => "73")); ?></a>
                </div>

                <nav class="nine columns" id="menu">
                    <ul>
                        <li><a href="/" class="scroll-link" data-id="calendar">Calendário de Eventos</a></li>
                        <li><a href="/" class="scroll-link" data-id="newsletter">Newsletter</a></li>
                        <li><a href="http://www.sebrae.com.br/sites/PortalSebrae/sebraeaz/Fale-com-um-especialista">Fale com um Especialista</a></li>
                    </ul>
                </nav>
                <div class="three columns">
                    <a href="http://www.sebraepb.com.br"><?php echo $this->Html->image("logo_sebrae.svg", array("width" => "108", "height" => "50")) ?></a>
                </div> 


            </div>  
            <div class="menu-m">
                <nav class="itens-menu">
                    <ul>
                        <li><a href="/" class="scroll-link" data-id="calendar">Calendário<br> de Eventos</a></li>
                        <li><a href="/" class="scroll-link" data-id="newsletter">Newsletter</a></li>
                        <li><a href="http://www.sebrae.com.br/sites/PortalSebrae/sebraeaz/Fale-com-um-especialista">Fale com um Especialista</a></li>
                    </ul>
                </nav>

                <div class="btn-menu"><span class="icon-menu"></span><p>menu</p></div>
            </div>



        </header>

        <section id="calendar">

            <div id="wrapper-txt">
                <div class="container">
                    <h1 class="tit">Calendário dos Pequenos<br> Negócios da Paraíba</h1>
                    <p class="txt">Acompanhe nosso calendário. Selecione uma data e fique por dentro de todos eventos.</p>
                </div>
            </div>


            <div id="wrapper-calendar">
                <div class="container">
                    <div id="r-calendar" class="sixteen columns">
                        <div id="coluna1" class="nine columns">
                            <div class="datepicker"></div>
                            <div class="filtros-container">
                                <h2 class="titulo-filtro">Filtre sua busca, selecione uma opção:</h2>
                                <form action="" class="filtros">
                                    <fieldset class="mei">
                                        <input type="radio" id="mei" name="radio" value="1" class="chk-box"/>
                                        <label for="mei">MEI</label>
                                        <p class="info">Pessoa que trabalha legalmente e por conta própria possuindo fatura máxima de R$60.000,00/ano.</p>
                                    </fieldset>
                                    <fieldset class="produtor_rural">
                                        <input type="radio" id="produtor-rural" name="radio" value="5" class="chk-box"/>
                                        <label for="produtor-rural">Produtor Rural</label>
                                        <p class="info">Empresas e/ou produtores rurais ao todo.</p>
                                    </fieldset>
                                    <fieldset class="micro_empresario">
                                        <input type="radio" id="micro-empresario" name="radio" value="4" class="chk-box"/>
                                        <label for="micro-empresario">Micro Empresário</label>
                                        <p class="info">Micro Empresa que fatura até 360 mil/ano.</p>
                                    </fieldset>
                                    <fieldset class="potencial_empreendedor">
                                        <input type="radio" id="potencial-empreendedor" name="radio" value="3" class="chk-box"/>
                                        <label for="potencial-empreendedor">Potencial Empreendedor</label>
                                        <p class="info">Pessoa que pretende montar um negócio.</p>
                                    </fieldset>
                                    <fieldset class="pequeno_empresario">
                                        <input type="radio" id="pequeno-empresario" name="radio" value="2" class="chk-box"/>
                                        <label for="pequeno-empresario">Pequeno Empresário</label>
                                        <p class="info">Empresa de Pequeno Porte que fatura até 3.600 milhões/ano.</p>
                                    </fieldset>
                                    <fieldset class="potencial_empresario">
                                        <input type="radio" id="potencial-empresario" name="radio" value="6" class="chk-box"/>
                                        <label for="potencial-empresario">Potencial Empresário</label>
                                        <p class="info">Pessoa que trabalha por conta própria sem CNPJ.</p>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                        <div id="coluna2" class="seven columns">
                            <header class="header-principal">
                                <h2 class="titulo-data">Eventos do mês</h2>
                            </header>
                            <h6 class="bem-vindo-texto">Verifique o eventos relativos a data e área de atuação selecionada.</h6>
                            <div class="content">
                                <div class="data-nao-encontrada">
                                    <img src="img/icone-calendario-nao-encontrado.svg" alt="Ícone do calendário não encontrado" />
                                    <h3>Preencha a área de seu interesse e receba informações e noticias voltadas para sua área de negócios</h3>
                                </div>
                                <ul class="lista-eventos">
                                    <!-- <li>
                                        <h3 class="nome-evento">Palestra: Como montar um negócio de locação de equipamentos para eventos.</h3>
                                        <div class="conteudo-accordion">
                                            <h4 class="descricao-evento">Lorem ipsum dolor sit amet, consect adipisicing elit, sed do eiusmod tempor incididunt ut.pisicing elit, sed do eiusmod tempor incididunt.</h4>
                                            <footer>
                                                <h5 class="data-evento">28/01/2015</h5>
                                                <h5 class="hora-evento">Às 19h</h5>
                                            </footer>
                                            <a href="#" class="ir-para-a-loja">Ir para a loja</a>
                                        </div>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

             <div id="cena-1" class="wow fadeInUp">
                    <?php echo $this->Html->image("cena_1.svg") ?>                    
                </div>
                <div id="cena-2" class="wow fadeInUp">
                    <?php echo $this->Html->image("cena_2.svg") ?>                    
                </div>
        </section>

        <section id="newsletter">
            <div class="container">
                <i class="icon-news"><?php echo $this->Html->image("icon_email.svg", array("width" => "97", "height" => "73")) ?></i>
                <h1 class="tit">Receba Informações</h1>
                <!--<p class="txt">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>-->
                <p class="txt-2">Preencha a área de seu interesse e receba informações e noticias voltadas para sua área de negócios</p>

                <form id="form-news" accept-charset="utf-8" method="post" action="/home/adicionar">
                    <ul class="ul-check">

                        <li class="row">
                            <input type="checkbox" id="me-ind" name="data[Contact][Category][]" value="1">
                            <label for="me-ind" class="five columns">Mei</label>

                            <input type="checkbox" id="peq-empresario" name="data[Contact][Category][]" value="2">
                            <label for="peq-empresario" class="six columns">Pequeno Empresário</label>

                            <input type="checkbox" id="pot-empreendedor" name="data[Contact][Category][]" value="3">
                            <label for="pot-empreendedor" class="five columns">Potencial Empreendedor</label>
                        </li>

                        <li class="row">
                            <input type="checkbox" id="micro" name="data[Contact][Category][]" value="4"/>
                            <label for="micro" class="five columns">Micro Empresário</label>

                            <input type="checkbox" id="produtor" name="data[Contact][Category][]" value="5"/>
                            <label for="produtor" class="six columns">Produtor Rural</label>

                            <input type="checkbox" id="pot-empresario"  name="data[Contact][Category][]" value="6"/>
                            <label for="pot-empresario" class="five columns">Potencial Empresário</label>
                        </li>
                    </ul>                   

                    <ul class="ul-txt">
                        <li class="sixten colums">
                            <label class="" for="name">Nome</label>
                            <input type="text" id="name" minlength="2" name="data[Contact][nome]" required/>
                        </li>
                        <li class="sixten colums">
                            <label class="" for="email">Email</label>
                            <input type="email" id="email" name="data[Contact][email]" required/>

                            <button class="btn-news" type="submit"><span class="envie">Enviar</span> </button>
                        </li>
                    </ul>      
                </form>

                <div class="alert sucess animated">
                    <img class="icon-alert" src="img/icon_msg_sucesso.svg" width="196" height="126">
                    <p class="txt"><strong>Seu email foi enviado com sucesso!</strong>	  Agora é só aproveitar todas as novidades possíveis para o seu negócio.</p>
                    <button class="btn-voltar"><span class="btn-close">Voltar</span> </button>
                </div>

                <div class="alert error animated">
                    <img class="icon-alert" src="img/icon_msg_error.svg" width="85" height="90">
                    <p class="txt"><strong>Ocorreu algum erro! </strong>Talvez tenha ocorrido algum problema em sua conexão com a internet, por favor, tente mais tarde.</p>
                    <button class="btn-voltar"><span class="btn-close">Voltar</span> </button>
                </div>
            </div>  <!--container-->  
            <div id="news-footer">
                <div id="cena-3" class="wow fadeInUp">
                    <?php echo $this->Html->image("cena_3.svg") ?>                    
                </div>
                <div id="cena-4">                    
                    <?php echo $this->Html->image("logo_sebrae_cena.svg") ?>
                </div>
                <div id="cena-5" class="wow fadeInUp">
                    <?php echo $this->Html->image("cena_5.svg") ?>                    
                </div>
            </div>
        </section>

        <footer id="footer-s">
            <div class="container">
                <div class="five columns">
                    <a href="/"><?php echo $this->Html->image("logo_sempre.svg", array("width" => "242", "height" => "73")); ?></a>
                </div>

                <div class="eleven columns offset-by-eight">
                    <a href="http://www.sebrae.com.br"><?php echo $this->Html->image("logo_sebrae.svg", array("width" => "108", "height" => "50")); ?></a>
                </div>
            </div>

        </footer>

        <script>
            $(document).ready(function() {
                $("#form-news").validate({
                    rules: {
                        'data[Contact][Category][]': {required: true, minlength: 1}
                    },
                    messages: {
                        'data[Contact][nome]': {
                            required: 'Ooops! O preenchimento deste campo é obrigatório :)',
                            minlength: 'É verdade que seu nome tem menos de duas letras?'
                        },
                        'data[Contact][email]': {
                            required: 'Ooops! O preenchimento deste campo é obrigatório :)',
                            email: 'Ooops! Digite um email válido :)'
                        },
                        'data[Contact][Category][]': {
                            required: 'Ooops! Selecione pelo menos um item!'
                        }
                    },
                    errorPlacement: function(error, element) {
                        if (element.attr("name") == "data[Contact][Category][]") {
                            error.appendTo(element.parent("li"));
                        } else {
                            error.insertAfter(element);
                        }
                    },
                    debug: true,
                    submitHandler: function(form) {
                        $(form).ajaxSubmit({
                            resetForm: true,
                            url: 'home/adicionar',
                            dataType: 'json',
                            beforeSubmit: function(formData, jqForm, options) {
                                $(".btn-news").html(" enviando...");
                            },
                            success: function(responseText, statusText, xhr, $form) {
//                    console.log(responseText);

                                if (responseText.type == 'success') {
                                    $("#form-news").fadeOut();
                                    $(".alert.sucess").removeClass('flipOutX').fadeIn(100).addClass('flipInX');
                                    $(".btn-news").html("<span class='envie'>enviar</span>");
                                } else {
                                    $("#form-news").fadeOut();
                                    $(".alert.error").removeClass('flipOutX').fadeIn(100).addClass('flipInX');
                                    $(".btn-news").html("<span class='envie'>enviar</span>");
                                }

                            },
                            error: function(responseText, statusText, xhr, $form) {

                                //erro de sistema
                                $("#form-news").fadeOut();
                                $(".alert.error").removeClass('flipOutX').fadeIn(100).addClass('flipInX');
                                $(".btn-news").html("<span class='envie'>enviar</span>");
                            }
                        });
                    }

                });

                $(".btn-voltar").click(function() {
                    $("#newsletter .alert").removeClass('flipInX').addClass('flipOutX').fadeOut().removeClass('flipOutX');
                    $("#form-news").fadeIn();
                });

                $('.scroll-link').on('click', function(event) {
                    event.preventDefault();
                    var sectionID = $(this).attr("data-id");
                    scrollToID('#' + sectionID, 750);
                    //                    muda_titulo(sectionID);
                    window.history.pushState({id: sectionID}, "Sebrae Sempre | " + title, sectionID);
                    document.title = "Sebrae Sempre | " + title;
                });

                $(".itens-menu ul").click(function() {
                    $(this).parent().click("li").slideToggle("slow");
                    $(".icon-menu").toggleClass("btn-menu-fechar");

                });


                $(".btn-menu").click(function() {
                    $(".itens-menu").slideToggle("slow", function() {
                        $(".icon-menu").toggleClass("btn-menu-fechar");
                    });

                });


                function scrollToID(id, speed) {
                    var offSet = 0;
                    var targetOffset = $(id).offset().top - offSet;
                    var mainNav = $('#main-nav');
                    $('html,body').animate({scrollTop: targetOffset}, speed);
                    if (mainNav.hasClass("open")) {
                        mainNav.css("height", "1px").removeClass("in").addClass("collapse");
                        mainNav.removeClass("open");
                    }
                }
//                if (typeof console === "undefined") {
//                    console = {
//                        log: function() {
//                        }
//                    };
//                }

                var title = "";
                var pathArray = window.location.pathname.split('/');
                //    console.info(pathArray);
                var page = pathArray[pathArray.length - 1];

                muda_titulo(page);

                function muda_titulo(scrollToID) {
                    switch (scrollToID) {
                        case "calendar":
                            title = "Calendário de Eventos";
                            break;
                        case "newsletter":
                            title = "Receba Informações";
                            break;
                    }
                }
                if (page !== "") {
                    scrollToID('#' + page, 750);
                    document.title = "Sebrae Sempre | " + title;
                }


            });</script>
			
			<script>
            if ($(window).width() <= 768){	
            $('#coluna2').insertBefore('#coluna1');
            }
			</script>
    </body>


</html>

