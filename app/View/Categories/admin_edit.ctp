<div class="categories form row">
    <?php echo $this->Form->create('Category', array('class' => 'form-horizontal')); ?>
    <fieldset>
        <legend><?php echo __('Edit %s', __('Category')); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('title', array(
            'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
            'label' => array('class' => 'control-label cols-sm-1 col-md-1 col-lg-1'),
            'before' => "<div class='col-md-4'>\n",
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

</div>
