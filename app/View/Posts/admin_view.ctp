<div class="posts view">
    <h2><?php echo __('Post'); ?></h2>
    <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">
        <tr>
            <td><?php echo __('Id'); ?></td>
            <td>
                <?php echo h($post['Post']['id']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('User'); ?></td>
            <td>
                <?php echo $this->Html->link($post['User']['username'], array('controller' => 'users', 'action' => 'view', $post['User']['id'])); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Category'); ?></td>
            <td>
                <?php echo $this->Html->link($post['Category']['title'], array('controller' => 'categories', 'action' => 'view', $post['Category']['id'])); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Title'); ?></td>
            <td>
                <?php echo h($post['Post']['title']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Body'); ?></td>
            <td>
                <?php echo h($post['Post']['body']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Data'); ?></td>
            <td>
                <?php echo $this->Formatacao->datahora(h($post['Post']['data'])); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Link'); ?></td>
            <td>
                <?php echo $this->Html->link($post['Post']['link'], $post['Post']['link'], array('target' => '_blank')); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Imagem'); ?></td>
            <td>
                <?php echo $this->Html->image('cache/150x150_' . $post['Post']['imagem'],array("class" => "img-thumbnail")); ?>		
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Created'); ?></td>
            <td>
                <?php echo h($this->Formatacao->datahora($post['Post']['created'])); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Modified'); ?></td>
            <td>
                <?php echo h($this->Formatacao->datahora($post['Post']['modified'])); ?>
                &nbsp;
            </td>
        <tr>
            <td><?php echo __('Status'); ?></td>
            <td>
                <?php echo h(__($post['Post']['status'])); ?>
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
