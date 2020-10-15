<div class="contacts form">
    <?php echo $this->Form->create('Contact'); ?>
    <fieldset>
        <legend><?php echo __('Admin Add Contact'); ?></legend>
        <?php
        echo $this->Form->input('nome');
        echo $this->Form->input('email');
        echo $this->Form->input('Contact.Category', array('multiple' => 'checkbox'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Contacts'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
    </ul>
</div>
