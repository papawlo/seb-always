<div class="contacts view">
    <h2><?php echo __('Contact'); ?></h2>
    <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">
        <tr>
            <td><?php echo __('Id'); ?></td>
            <td>
                <?php echo h($contact['Contact']['id']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Nome'); ?></td>
            <td>
                <?php echo h($contact['Contact']['nome']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Email'); ?></td>
            <td>
                <?php echo h($contact['Contact']['email']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Category'); ?></td>
            <td>
                <?php
                $titles = array();
                foreach ($contact['Category'] as $category) {
                    $titles[] = $category['title'];
                };
                echo implode("<br>", $titles)
                ?> 
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Created'); ?></td>
            <td>
                <?php echo h($contact['Contact']['created']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Modified'); ?></td>
            <td>
                <?php echo h($contact['Contact']['modified']); ?>
                &nbsp;
            </td>
        </tr>
    <tr>            
            <td colspan="2" class="text-center">
                <?php echo $this->Html->link(__('Voltar'), array('action' => 'index'), array('class' => 'btn btn-primary')); ?>
            </td>
        </tr>
    </table>
</div>