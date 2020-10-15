<?php if (isset($posts) && !empty($posts)): ?>
    <?php $posts2 = $posts; ?>
    <div class="row row-fluid">
        <h2>E-mail</h2>
        <div role="tabpanel">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#resultado" aria-controls="resultado" role="tab" data-toggle="tab">Resultado</a></li>            
                <li role="presentation"><a href="#codigo" aria-controls="codigo" role="tab" data-toggle="tab">Código</a></li>                
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">

                <div role="tabpanel" class="tab-pane active" id="resultado">
                    <table style="width: 100%;" border="0">
                        <tbody style="display: block; width: 100%; margin: 0 0 0 0; background: #f8f8f8;">
                            <tr style="width: 100%; display: block;">
                                <td style="width: 100%; display: block; margin: 0 0 0 0;">
                                    <p style="display: block; width: 100%; font-family: Arial; font-size: 36px; background: #4cb848; text-align: center; color: #fff; padding: 20px 0 20px 0; margin: 0  0 0 0;" align="center">
                                        Boletim Informativo
                                    </p>
                                    <img style="width: 100%; margin: 0 0 0 0;" title="Boletim Sebrae" alt="Boletim" src="http://www.digimailing.com.br/admin/temp/newsletters/2088/banner-topo.jpg" />
                                </td>
                            </tr>
                            <tr style="display: block; width: 100%; margin: -10px 0 0 -8px;">
                                <td style="display: block; width: 100%; height: 70px; background: #1278a3;">
                                    <img style="display: block; width: 45px; margin: 9px 0 0 70px; float: left;" src="http://www.digimailing.com.br/admin/temp/newsletters/2088/icon-categoria.png" />
                                    <p style="font-size: 22px; font-family: Arial; color: #fff; margin: 22px 0 0 155px;"><?php echo h($Category); ?></p>
                                    <span style="background: url(http://www.digimailing.com.br/admin/temp/newsletters/2088/barra-color.jpg) no-repeat; margin: 15px 0 0 0; padding: 0 0 0 0; display: block; background-size: cover; max-width: 100%;">&nbsp;</span>
                                </td>
                            </tr>
                            <tr style="display: block; margin: 0 0 0 0; border-bottom: 3px solid #09b0d9;">
                                <td style="color: #924299; font-size: 35px; font-family: Arial; height: 150px;">
                                    <img src="http://www.digimailing.com.br/admin/temp/newsletters/2088/bonequinho.png" style="float: left; margin: 0 0 0 5%;" />
                                    <p style="margin: 15px 0 0 160px; color: #924299; font-size: 24px;">
                                        <strong>
                                            <span style="width: 400px; display: block; font-size: 36px; line-height: 45px;">Ol&aacute;,</span> 
                                        </strong>
                                        %%First Name%%
                                    </p>
                                </td>
                            </tr>
                            <?php foreach ($posts2 as $post): ?>
                                <tr style="display: block; width: 100%; margin: 0 0 0 0; border-bottom: 3px solid #09b0d9;">
                                    <td style="color: #924299; font-family: Arial; height: 250px;">
                                        <p style="margin: 0 0 0px 23px; font-size: 20px; color: #09b0d9; display: block;"><?php echo h($post['Post']['title']); ?></p>
                                        <p style="font-size: 16px; color: #000; display: block; margin: 13px 25px 0 25px;"><?php echo h($post['Post']['body']); ?></p>
                                        <a style="margin: 30px 0 0 25px; display: block;" href="<?php echo h($post['Post']['link']); ?>">
                                            <img src="http://www.digimailing.com.br/admin/temp/newsletters/2088/botao.jpg" />
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <tr style="display: block; width: 100%; margin: 0 0 0 0;">
                                <td style="color: #924299; font-family: Arial; height: 135px; display: block;"><img style="margin: 0 0 0 0; width: 100%;" src="http://www.digimailing.com.br/admin/temp/newsletters/2088/footer-sebrae.jpg" /></td>
                            </tr>
                        </tbody>
                    </table>
                </div>            
                <div role="tabpanel" class="tab-pane" id="codigo">
                    <textarea class="form-control" rows="30" style="height: 100%;">
                    <html>
                        <head>
                        </head>
                        <body>
                            <table style="width: 100%;" border="0">
                                <tbody style="display: block; width: 100%; margin: 0 0 0 0; background: #f8f8f8;">
                                    <tr style="width: 100%; display: block;">
                                        <td style="width: 100%; display: block; margin: 0 0 0 0;">
                                            <p style="display: block; width: 100%; font-family: Arial; font-size: 36px; background: #4cb848; text-align: center; color: #fff; padding: 20px 0 20px 0; margin: 0  0 0 0;" align="center">
                                                Boletim Informativo
                                            </p>
                                            <img style="width: 100%; margin: 0 0 0 0;" title="Boletim Sebrae" alt="Boletim" src="http://www.digimailing.com.br/admin/temp/newsletters/2088/banner-topo.jpg" />
                                        </td>
                                    </tr>
                                    <tr style="display: block; width: 100%; margin: -10px 0 0 -8px;">
                                        <td style="display: block; width: 100%; height: 70px; background: #1278a3;">
                                            <img style="display: block; width: 45px; margin: 9px 0 0 70px; float: left;" src="http://www.digimailing.com.br/admin/temp/newsletters/2088/icon-categoria.png" />
                                            <p style="font-size: 22px; font-family: Arial; color: #fff; margin: 22px 0 0 155px;"><?php echo h($Category); ?></p>
                                            <span style="background: url(http://www.digimailing.com.br/admin/temp/newsletters/2088/barra-color.jpg) no-repeat; margin: 15px 0 0 0; padding: 0 0 0 0; display: block; background-size: cover; max-width: 100%;">&nbsp;</span>
                                        </td>
                                    </tr>
                                    <tr style="display: block; margin: 0 0 0 0; border-bottom: 3px solid #09b0d9;">
                                        <td style="color: #924299; font-size: 35px; font-family: Arial; height: 150px;">
                                            <img src="http://www.digimailing.com.br/admin/temp/newsletters/2088/bonequinho.png" style="float: left; margin: 0 0 0 5%;" />
                                            <p style="margin: 15px 0 0 160px; color: #924299; font-size: 24px;">
                                                <strong>
                                                    <span style="width: 400px; display: block; font-size: 36px; line-height: 45px;">Ol&aacute;,</span> 
                                                </strong>
                                                %%First Name%%
                                            </p>
                                        </td>
                                    </tr>                
                                        <?php foreach ($posts as $post): ?>
                                                        <tr style="display: block; width: 100%; margin: 0 0 0 0; border-bottom: 3px solid #09b0d9;">
                                                            <td style="color: #924299; font-family: Arial; height: 250px;">
                                                                <p style="margin: 0 0 0px 23px; font-size: 20px; color: #09b0d9; display: block;"><?php echo h($post['Post']['title']); ?></p>
                                                                <p style="font-size: 16px; color: #000; display: block; margin: 13px 25px 0 25px;"><?php echo h($post['Post']['body']); ?></p>
                                                                <a style="margin: 30px 0 0 25px; display: block;" href="http://<?php echo h($post['Post']['link']); ?>">
                                                                    <img src="http://www.digimailing.com.br/admin/temp/newsletters/2088/botao.jpg" /></a>
                                                            </td>
                                                        </tr>
                                        <?php endforeach; ?>
                                    <tr style="display: block; width: 100%; margin: 0 0 0 0;">
                                        <td style="color: #924299; font-family: Arial; height: 135px; display: block;"><img style="margin: 0 0 0 0; width: 100%;" src="http://www.digimailing.com.br/admin/temp/newsletters/2088/footer-sebrae.jpg" /></td>
                                    </tr>
                                </tbody>
                            </table>
                        </body>
                    </html>
                    </textarea>
                </div>
            </div>

        </div>

    </div>
<?php else: ?>
    <div class="row row-fluid">
        <div class="alert alert-danger" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only">Error:</span>
            Nenhum evento selcionado
            <?php echo $this->Html->link(__('Voltar'), array('action' => 'index'), array('class' => 'btn btn-danger btn-sm')); ?>
            <!--<a href="#" class="alert-link">Voltar</a>-->
        </div>

    </div>
<?php endif; ?>