<div class="contacts index">
    <h2><?php echo __('Contacts'); ?></h2>
    <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">	<thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('nome'); ?></th>
                <th><?php echo $this->Paginator->sort('email'); ?></th>
                <th><?php echo $this->Paginator->sort('created'); ?></th>
                <th><?php echo $this->Paginator->sort('modified'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact): ?>
                <tr>
                    <td><?php echo h($contact['Contact']['id']); ?>&nbsp;</td>
                    <td><?php echo h($contact['Contact']['nome']); ?>&nbsp;</td>
                    <td><?php echo h($contact['Contact']['email']); ?>&nbsp;</td>
                    <td><?php echo h($contact['Contact']['created']); ?>&nbsp;</td>
                    <td><?php echo h($contact['Contact']['modified']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $contact['Contact']['id']), array(
                            'class' => 'btn btn-default'
                        )); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $contact['Contact']['id']), array(
                            'class' => 'btn btn-primary'
                        )); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $contact['Contact']['id']), array(
                            'class' => 'btn btn-danger'
                        ), __('Are you sure you want to delete # %s?', $contact['Contact']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?>	
    </p>
    <nav>
        <ul class="pagination">
            <?php
            echo $this->Paginator->first('<< ' . __('first'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
            echo $this->Paginator->prev(__('prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
            echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1, 'modulus' => 5, 'elipsis' => '...'));
            echo $this->Paginator->next(__('next') . ' >', array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
            echo $this->Paginator->next(__('last') . ' >>', array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
            ?>
        </ul>
    </nav>
</div>
