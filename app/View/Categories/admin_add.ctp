<div class="row categories form">
    <?php echo $this->Form->create('Category', array('class' => 'form-horizontal', 'role' => 'form')); ?>
    <fieldset>
        <legend><?php echo __('Add Category'); ?></legend>
        <?php
        echo $this->Form->input('title', array(
            'label' => array('class' => 'control-label cols-sm-1 col-md-1 col-lg-1'),
            'before' => "<div class='col-md-4'>\n",
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
</div>
