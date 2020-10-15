<h1>Bem Vindo</h1>

<div>Aqui vai o calendário</div>
<div>Listagem</div>
<div>formularioss</div>
<table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>			
            <th>Título</th>
            <th>Corpo</th>                        
            <th>Categoria</th>                        
            <th>Data</th>
            <th>Link</th>
            <th>Imagem</th>						
        </tr>
    </thead>
    <tbody>
        <?php foreach ($posts as $post): ?>
            <tr>
                <td><?php echo h($post['Post']['id']); ?>&nbsp;</td>
            <!--		<td>
                <?php // echo $this->Html->link($post['User']['username'], array('controller' => 'users', 'action' => 'view', $post['User']['id'])); ?>
                </td>-->		
                <td><?php echo h($post['Post']['title']); ?>&nbsp;</td>
                <td><?php echo h($post['Post']['body']); ?>&nbsp;</td>
                <td><?php echo $post['Category']['title']; ?>&nbsp;</td>
                <td><?php echo h($post['Post']['data']); ?>&nbsp;</td>
                <td><?php echo h($post['Post']['link']); ?>&nbsp;</td>
                <td><?php echo $this->Html->image('cache/150x150_' . $post['Post']['imagem']); ?>&nbsp;</td>		       
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>