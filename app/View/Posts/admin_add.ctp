<div class="row main">    
    <?php echo $this->Form->create('Post', array('enctype' => 'multipart/form-data', 'class' => 'form-horizontal', 'role' => 'form')); ?>
    <fieldset>
        <legend><?php echo __('Add %s', __('post')); ?></legend>
        <?php
        echo $this->Form->input('user_id', array(
            'label' => array('class' => 'control-label cols-sm-1 col-md-1 col-lg-1'),
            'before' => "<div class='col-md-4'>\n",
            'after' => "</div>\n",
            'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
        ));


        echo $this->Form->input('category_id', array(
            'label' => array('class' => 'control-label cols-sm-1 col-md-1 col-lg-1'),
            'before' => "<div class='col-md-4'>\n",
            'after' => "</div>\n",
            'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
        ));
        echo $this->Form->input('title', array(
            'label' => array('class' => 'control-label cols-sm-1 col-md-1 col-lg-1'),
            'before' => "<div class='col-md-4'>\n",
            'after' => "</div>\n",
            'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
        ));
        echo $this->Form->input('body', array(
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
           'label' => array('class' => 'control-label cols-sm-1 col-md-1 col-lg-1'),
            'before' => "<div class='col-md-8'>\n",
            'after' => "</div>\n",
            'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
        ));
        echo $this->Form->input('Post.imagem ', array(
             'type' => 'file',
            'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
            'label' => array('class' => 'control-label cols-sm-1 col-md-1 col-lg-1'),
            'before' => "<div class='col-md-8'>\n",
            'after' => "</div>\n",
            'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
        ));
        echo $this->Form->input('status', array(
           'label' => array('class' => 'control-label cols-sm-1 col-md-1 col-lg-1'),
            'before' => "<div class='col-md-3'>\n",
            'after' => "</div>\n",
            'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
        ));
        ?>
    </fieldset>
    <?php
    $options = array(
        'label' => __('Submit'),
        'class' => 'btn btn-default'
    );
    echo $this->Form->end($options);
    ?>
    <?php echo $this->Html->scriptBlock("$('#PostData').datetimepicker({
    format: 'dd/mm/yyyy hh:mm:ss', 
    language: 'pt-BR',
    pick12HourFormat: true
  });", array('inline' => false)) ?>
    <!--</div>-->
</div>
