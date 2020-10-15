<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="col-md-12">
    <!--    <div class="cal2">-->
    <div id="full-clndr" class="clearfix">
        <script type="text/template" id="full-clndr-template">
            <div class="clndr-controls">
            <div class="clndr-previous-button">&lt;</div>
            <div class="clndr-next-button">&gt;</div>
            <div class="current-month"><%= month %> <%= year %></div>

            </div>
            <div class="clndr-grid">
            <div class="days-of-the-week clearfix">
            <% _.each(daysOfTheWeek, function(day) { %>
            <div class="header-day"><%= day %></div>
            <% }); %>
            </div>
            <div class="days">
            <% _.each(days, function(day) { %>
            <div class="<%= day.classes %>" id="<%= day.id %>" data-category=""><span class="day-number"><%= day.day %></span></div>
            <% }); %>
            </div>
            </div>
            <div class="event-listing">
            <div class="event-listing-title">EVENTOS DESTE MÊS</div>
            <% _.each(eventsThisMonth, function(event) { %>
            <div class="event-item cat-<%= event.category_id%>" data-category="<%= event.category%>">
            <div class="event-item-name"><a href="http://<%= event.link %>" target="_blank"><%= event.title %></a> - <%= event.category%></div>           
            <div class="event-item-location"><%= event.body%></div>
            </div>
            <% }); %>
            </div>
        </script>

    </div>
    <?php foreach ($categories as $categoria): ?>
        <label class="radio-inline">
            <input type="radio" name="category_id" class="choose-category" data-category="<?php echo h($categoria['Category']['id']); ?>" id="category-<?php echo h($categoria['Category']['id']); ?>" value="<?php echo h($categoria['Category']['id']); ?>"> <?php echo h($categoria['Category']['title']); ?>
        </label>
    <?php endforeach; ?>
    <label class="radio-inline">
        <input type="radio" name="category_id" class="choose-category" data-category="all" id="category-all" value="todos"> Todos
    </label>   
</div>
<div class="col-md-12">

    <?php if ($this->Session->flash()): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong> Adicionado com sucesso!</strong>  <?php
            echo $this->Session->flash();
            ?>
        </div>
    <?php endif; ?>


    <?php // echo $this->Form->create('Home', array('controller' => 'home', 'action' => 'add')); ?>
    <form id="HomeAddForm" accept-charset="utf-8" method="post" action="/home/adicionar">
        <div class="checkbox">
            <?php foreach ($categories as $categoria): ?>
                <label class="checkbox-inline">
                    <input type="checkbox" name="data[Contact][Category][]" class="choose-category" data-category="<?php echo h($categoria['Category']['id']); ?>" id="category-<?php echo h($categoria['Category']['id']); ?>" value="<?php echo h($categoria['Category']['id']); ?>"> <?php echo h($categoria['Category']['title']); ?>
                </label>
            <?php endforeach; ?>

        </div>
        <div class="form-group">
            <label for="name">Nome</label>
    <!--        <input type="text" class="form-control" id="name" placeholder="Nome">-->
            <?php
            echo $this->Form->input('Contact.nome', array(
                'label' => false,
                'class' => 'form-control',
                'placeholder' => 'Nome'
            ));
            ?>
        </div>       
        <div class="form-group">
            <label for="email">Email</label>
            <!--<input type="email" class="form-control" id="email" placeholder="Email">-->
            <?php
            echo $this->Form->input('Contact.email', array(
                'label' => false,
                'class' => 'form-control',
                'placeholder' => 'Email'
            ));
            ?>
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
    </form>

</form>
</div>
