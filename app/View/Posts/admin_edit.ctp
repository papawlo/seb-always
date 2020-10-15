<div class="row">
    <!--<div class="col-sm-12 col-md-12 col-lg-12">-->
    <?php
    echo $this->Form->create('Post', array('enctype' => 'multipart/form-data', 'class' => 'form-horizontal'));
    ?>
    <fieldset>
        <legend><?php echo __('Edit %s', __('post')); ?></legend>

        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('user_id', array(
            'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
            'label' => array('class' => 'control-label cols-sm-1 col-md-1 col-lg-1'),
            'before' => "<div class='col-md-4'>\n",
            'after' => "</div>\n",
            'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
        ));
        echo $this->Form->input('category_id', array(
            'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
            'label' => array('class' => 'control-label cols-sm-1 col-md-1 col-lg-1'),
            'before' => "<div class='col-md-4'>\n",
            'after' => "</div>\n",
            'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
        ));
        echo $this->Form->input('title', array(
            'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
            'label' => array('class' => 'control-label cols-sm-1 col-md-1 col-lg-1'),
            'before' => "<div class='col-md-4'>\n",
            'after' => "</div>\n",
            'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
        ));
        echo $this->Form->input('body', array(
            'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
            'label' => array('class' => 'control-label cols-sm-1 col-md-1 col-lg-1'),
            'before' => "<div class='col-md-4'>\n",
            'after' => "</div>\n",
            'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
        ));
        echo $this->Form->input('data', array(
            'type' => 'text',
            'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
            'label' => array('class' => 'control-label cols-sm-1 col-md-1 col-lg-1'),
            'before' => "<div class='col-md-3'>\n",
            'after' => "</div>\n",
            'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
        ));
        echo $this->Form->input('link', array(
            'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
            'label' => array('class' => 'control-label cols-sm-1 col-md-1 col-lg-1'),
            'before' => "<div class='col-md-8'>\n",
            'after' => '<p class="text-danger help-block ">exemplo: <strong>http://www.google.com</strong></p></div>' . "\n",
            'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
        ));
        echo $this->Form->input('imagem', array(
            'type' => 'file',
            'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
            'label' => array('class' => 'control-label cols-sm-1 col-md-1 col-lg-1'),
            'before' => "<div class='col-md-8'>\n",
            'after' => "</div>\n",
            'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
        ));
        ?> 
        <div class="form-group">
            <?php if ($this->Form->value('Post.imagem')) { ?>

                <div class='col-md-offset-2'><?php echo $this->Html->image('cache/150x150_' . $this->Form->value('Post.imagem'), array("class" => "img-thumbnail")); ?></div>

            <?php } else {
                ?>
                <div class='col-md-offset-2'><img src="http://placehold.it/150&text=sem+imagem" class="img-thumbnail" alt="imagem default"></div>
            <?php } ?>
        </div>
        <?php
        echo $this->Form->input('status', array(
            'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
            'label' => array('class' => 'control-label cols-sm-1 col-md-1 col-lg-1'),
            'before' => "<div class='col-md-3'>\n",
            'after' => "</div>\n",
            'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
        ));
        ?>  
    </fieldset>
    <?php
    $options = array(
        'label' => 'Atualizar',
        'div' => false,
    );
    ?>

    <?php echo $this->Form->end($options); ?>


    <?php echo $this->Html->scriptBlock("$('#PostData').datetimepicker({
    format: 'dd/mm/yyyy hh:mm:ss', 
    language: 'pt-BR',    
  });", array('inline' => false)) ?>
</div>
