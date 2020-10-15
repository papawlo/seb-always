<div class="posts index">
    <h2><?php echo __('Posts'); ?></h2>
    <style>
        .filter {
            padding: 0 15px 15px;

        }
    </style>
    <div class="filters">
        <h3>Filters</h3>

        <?php
        // The base url is the url where we'll pass the filter parameters
        $base_url = array('controller' => 'digimailing', 'action' => 'index');
        echo $this->Form->create("Filter", array('url' => $base_url, 'class' => 'filter form-inline'));
        // add a select input for each filter. It's a good idea to add a empty value and set
        // the default option to that.       
//        echo $this->Form->input("category_id", array('label' => 'Categoria', 'options' => $categories, 'empty' => '-- Todas --', 'default' => ''));
        echo $this->Form->input("category_id", array(
//            'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
            'label' => array('text' => 'Categoria'),
//            'before' => "<div class='col-md-4'>\n",
//            'after' => "</div>\n",
//            'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
            'empty' => '-- Todas --',
            'default' => ''
        ));
        // Add a basic search 
//        echo $this->Form->input("search", array('label' => 'Buscar', 'placeholder' => "busca...", 'style' => 'width:50%; float:left'));

        echo $this->Form->submit("Buscar");


        $options = array(
            'label' => 'Atualizar',
            'div' => false,
        );


        echo $this->Form->end();
        ?>
    </div>
    <?php echo $this->Form->create("Digimailing", array('url'=>array('controller' => 'digimailing', 'action' => 'montar'))); ?>
    <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th><input type="checkbox" name="all"></th>                
                <th><?php echo $this->Paginator->sort('id'); ?></th>                
                <th><?php echo $this->Paginator->sort('title'); ?></th>
                <th><?php echo $this->Paginator->sort('body'); ?></th>
                <th><?php echo $this->Paginator->sort('category_id'); ?></th>
                <th><?php echo $this->Paginator->sort('data'); ?></th>
                <th><?php echo $this->Paginator->sort('link'); ?></th>
                <th><?php echo $this->Paginator->sort('imagem'); ?></th>			
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($posts as $post): ?>
                <tr>
                    <td>
                        <?php
                        echo $this->Form->input('post_id', array('type' => 'checkbox', 'name' => 'post_id[]', 'value' => h($post['Post']['id']), 'label' => false, 'hiddenField' => false));
                        ?>
                    </td>

                    <td><?php echo h($post['Post']['id']); ?>&nbsp;</td>   
                    <td><?php echo h($post['Post']['title']); ?>&nbsp;</td>
                    <td><?php
                        echo h($this->Text->truncate(
                                        $post['Post']['body'], 40, array(
                                    'ellipsis' => '...',
                                    'exact' => true
                                        )
                        ));
                        ?>&nbsp;</td>                    
                    <td>
                        <?php echo h($post['Category']['title']); ?>
                    </td>
                    <td><?php echo $this->Formatacao->datahora($post['Post']['data']); ?>&nbsp;</td>
                    <td><?php
                        echo h($this->Text->truncate($post['Post']['link'], 40, array(
                                    'ellipsis' => '...',
                                    'exact' => true
                                        )
                        ));
                        ?>&nbsp;</td>
                    <td><?php echo $this->Html->image('cache/150x150_' . $post['Post']['imagem']); ?>&nbsp;</td>		
                    <td class="actions">
                        <?php
                        echo $this->Html->link(__('View'), array('controller' => 'posts', 'action' => 'view', $post['Post']['id']), array(
                            'class' => 'btn btn-default'
                        ));
                        ?>
                        <?php
                        echo $this->Html->link(__('Edit'), array('controller' => 'posts', 'action' => 'edit', $post['Post']['id']), array(
                            'class' => 'btn btn-primary'
                        ));
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php
//    echo $this->Form->submit("Montar", array('div' => false, 'class' => 'btn-danger'));
    $options = array(
        'label' => 'Montar',
        'class' => 'btn-danger',
        'div' => array(
            'style' => 'margin-bottom:15px;',
            'class' => 'text-center'
        )
    );
    echo $this->Form->end($options);
//    echo $this->Form->end();
    ?>
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

