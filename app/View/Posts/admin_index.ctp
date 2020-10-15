<div class="posts index">
    <h2><?php echo __('List of %s', __('Posts')); ?></h2>
    <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>

                <th><?php echo $this->Paginator->sort('category_id'); ?></th>
                <th><?php echo $this->Paginator->sort('title'); ?></th>
                <th><?php echo $this->Paginator->sort('body'); ?></th>
                <th><?php echo $this->Paginator->sort('data'); ?></th>
                <th><?php echo $this->Paginator->sort('link'); ?></th>
                <th><?php echo $this->Paginator->sort('imagem'); ?></th>             
                <th><?php echo $this->Paginator->sort('status'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($posts as $post): ?>
                <tr>
                    <td><?php echo h($post['Post']['id']); ?>&nbsp;</td>                   
                    <td>
                        <?php echo $this->Html->link($post['Category']['title'], array('controller' => 'categories', 'action' => 'view', $post['Category']['id'])); ?>
                    </td>
                    <td><?php echo h($post['Post']['title']); ?>&nbsp;</td>
                    <td><?php
                        echo h($this->Text->truncate(
                                        $post['Post']['body'], 100, array(
                                    'ellipsis' => '...',
                                    'exact' => false
                                        )
                                )
                        );
                        ?>&nbsp;</td>
                    <td><?php echo $this->Formatacao->datahora(h($post['Post']['data'])); ?>&nbsp;</td>
                    <td><?php
                        echo $this->Html->link($this->Text->truncate(
                                        $post['Post']['link'], 40, array(
                                    'ellipsis' => '...',
                                    'exact' => true,
                                        )
                                ), $post['Post']['link'], array('target' => '_blank', 'title' => h($post['Post']['link']))
                        );
                        ?>&nbsp;</td>
                    <td><?php echo $this->Html->image('cache/150x150_' . $post['Post']['imagem'], array("class" => "img-thumbnail")); ?>&nbsp;</td>                    
                    <td><?php echo h(__($post['Post']['status'])); ?>&nbsp;</td>
                    <td class="actions">
                        <?php
                        echo $this->Html->link(__('View'), array('action' => 'view', $post['Post']['id']), array(
                            'class' => 'btn btn-default'
                        ));
                        ?>
                        <?php
                        echo $this->Html->link(__('Edit'), array('action' => 'edit', $post['Post']['id']), array(
                            'class' => 'btn btn-primary'
                        ));
                        ?>
                        <?php
                        echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $post['Post']['id']), array(
                            'class' => 'btn btn-danger'
                                ), __('Are you sure you want to delete # %s?', $post['Post']['id']));
                        ?>
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
            echo $this->Paginator->first('<< ' . __('first'), array('tag' => 'li', 'currentClass' => 'disabled'), null, array('tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a'));
            echo $this->Paginator->prev(__('prev'), array('tag' => 'li'), null, array('tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a'));
            echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'currentClass' => 'active', 'tag' => 'li', 'first' => 1, 'modulus' => 5, 'elipsis' => '...'));
            echo $this->Paginator->next(__('next') . ' >', array('tag' => 'li', 'currentClass' => 'disabled'), null, array('tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a'));
            echo $this->Paginator->next(__('last') . ' >>', array('tag' => 'li', 'currentClass' => 'disabled'), null, array('tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a'));
            ?>
        </ul>
    </nav>
</div>

