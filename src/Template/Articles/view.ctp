<?= $this->Html->css('../../../css/blog-home.css'); ?>

<div class="container">
<div class="row justify-content-md-center">
     
    <h2 class="card-title"> <?= $article->title  ?></h2>
     
</div>
    <div class="row justify-content-md-center">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
                 <?php  $imgString=$article->image; 
                 
                if($imgString=='') $imgString='no-image.png';
                ?>
                <?=  $this->Html->image($imgString, array('alt' => 'CakePHP', 'border' => '0', 'data-src' => 'holder.js/100%x100','width'=>'728px','height'=> '300px')); ?> 
        
                <div class="card-body">
                
                <p class="card-text"> <?php
                         
                                echo $article->body;
                        
                ?> </p>
                   </div>
                <div class="card-footer text-muted">
                Posted on  <?= $article->created->format('F jS, Y') ?> by
                <a href="#"><?= $article->user->email ?></a>
                <p><b>Tags:</b> <?= h($article->tag_string) ?></p>
                <p><b> Comments: </b></p>
                <ul>
                <?php foreach($article->comments as $k=>$comment): ?>    
                        <ol> <span><?= $k+1 ?></span> <?= $comment->comment ?> </ol>
                <?php endforeach; ?>
                </ul>
               </div>
            


        </div>
      
    </div> 
    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <h2><?= __('Add comment') ?></h2>
            <?= 
            $this->Form->create(null, [
                'url' => [
                    'controller' => 'Comments',
                    'action' => 'add'
                ]
            ]);
            ?>
            <?= $this->Form->control('comment',['label' => false,'rows' => '5','class'=>'form-control','placeholder'=>'Enter the description','required'=>'required']) ?>
            <?= $this->Form->control('article_id', ['type' => 'hidden', 'value' =>  $article->id ]); ?>
            <?= $this->Form->control('article_slug', ['type' => 'hidden', 'value' =>  $article->slug ]); ?>
             
            <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary mb-2']) ?>
                <?= $this->Form->end() ?>
            
        </div>
    </div>
</div>
 