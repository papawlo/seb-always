<div class="row contacts form">
    <style>
        #ContactAdminEditForm .multiple-checkbox .input-group-addon{
            border: none;            
            background-color: transparent;
        }
        #ContactAdminEditForm .multiple-checkbox .form-control{
            border: none;            
            box-shadow: none;
        }
    </style>
    <?php echo $this->Form->create('Contact', array('class' => 'form-horizontal')); ?>
    <fieldset>
        <legend><?php echo __('Edit %s', __('Contact')); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('nome', array(
            'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
            'label' => array('class' => 'control-label cols-sm-1 col-md-1 col-lg-1'),
            'before' => "<div class='col-md-4'>\n",
            'after' => "</div>\n",
            'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
        ));
        echo $this->Form->input('email', array(
            'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
            'label' => array('class' => 'control-label cols-sm-1 col-md-1 col-lg-1'),
            'before' => "<div class='col-md-4'>\n",
            'after' => "</div>\n",
            'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
        ));
        echo $this->Form->input('Contact.Category', array(
            'multiple' => 'checkbox',
            'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
            'label' => array('class' => 'control-label cols-sm-1 col-md-1 col-lg-1'),
            'before' => "<div class='col-md-4 input-group-addon'>\n",
            'after' => "</div>\n",
            'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
            'div' => array('class' => 'multiple-checkbox'),
            'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
                )
        );
        ?>
    </fieldset>
        <?php echo $this->Form->end(__('Submit')); ?>
</div>

