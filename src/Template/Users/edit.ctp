<?php if (!is_null($this->request->getSession()->read('Auth.User.email'))) { ?>

<div class="col-lg-12 text-right">
     <?= $this->Html->link(__('User list'), ['action' => 'index'],['class'=>'btn btn-primary']) ?></li>
     <?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index'],['class'=>'btn btn-secondary']) ?>
     <?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add'],['class'=>'btn btn-success']) ?>
   
</div>
<?php } ?>
<div class="container">
  <h2><?= __('Edit User') ?></h2>
        <?= $this->Form->create($user,["class"=>"form-inline"]) ?>
        <?= $this->Form->control('name',['type'=>'text','label' => false,'class'=>'form-control mb-2 mr-sm-2','placeholder'=>'Enter Email Addres']) ?>
        <?= $this->Form->control('email',['label' => false,'class'=>'form-control mb-2 mr-sm-2','placeholder'=>'Enter Email Addres']) ?>

        <?= $this->Form->control('password',['label' => false, 'class'=>'form-control mb-2 mr-sm-2']) ?>
        <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary mb-2']) ?>
            <?= $this->Form->end() ?>
        
</div>



