<div class="categories view">
    <h2><?php echo __('Category'); ?></h2>
    <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">
        <tr>
            <td><?php echo __('Id'); ?></td>
            <td>
                <?php echo h($category['Category']['id']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Title'); ?></td>
            <td>
                <?php echo h($category['Category']['title']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Created'); ?></td>
            <td>
                <?php echo h($category['Category']['created']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Modified'); ?></td>
            <td>
                <?php echo h($category['Category']['modified']); ?>
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

<div class="related">
    <h3><?php echo __('Related Posts'); ?></h3>
    <?php if (!empty($category['Post'])): ?>
        <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">
            <tr>
                <th><?php echo __('Id'); ?></th>              
                <th><?php echo __('Title'); ?></th>
                <th><?php echo __('Body'); ?></th>
                <th><?php echo __('Data'); ?></th>
                <th><?php echo __('Link'); ?></th>
                <th><?php echo __('Imagem'); ?></th>                
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php foreach ($category['Post'] as $post): ?>
                <tr>
                    <td><?php echo $post['id']; ?></td>                   
                    <td><?php echo $post['title']; ?></td>
                    <td><?php echo $post['body']; ?></td>
                    <td><?php echo $post['data']; ?></td>
                    <td><?php echo $post['link']; ?></td>
                    <td><?php echo $this->Html->image('cache/150x150_' . $post['imagem']); ?>&nbsp;</td>  
                   
                   
                    <td class="actions">
                        <div class="btn-group" role="group" aria-label="...">
                        <?php echo $this->Html->link(__('View'), array('controller' => 'posts', 'action' => 'view', $post['id']),array(
                            'class' => 'btn btn-default btn-xs'
                        )); ?>
                        <?php echo $this->Html->link(__('Edit'), array('controller' => 'posts', 'action' => 'edit', $post['id']),array(
                            'class' => 'btn btn-primary btn-xs'
                        )); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'posts', 'action' => 'delete', $post['id']), array(
                            'class' => 'btn btn-danger btn-xs'
                        ), __('Are you sure you want to delete # %s?', $post['id'])); ?>
                            </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>
