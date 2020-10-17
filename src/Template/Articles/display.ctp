<?= $this->Html->css('../../../css/blog-home.css'); ?>

<div class="container">

<div class="row">

  <!-- Blog Entries Column -->
  <div class="col-md-10">

    <h1 class="my-4">Welcome to CMS Site
      <small>by Sachin</small>
    </h1>

    <?php foreach ($articles as $article):
        $imgString=$article->image;
        if($imgString=='') $imgString='no-image.png';
        ?>

        <!-- Blog Post -->
        <div class="card mb-4">

        <?=  $this->Html->image($imgString, array('alt' => 'CakePHP', 'border' => '0', 'data-src' => 'holder.js/100%x100','width'=>'920px','height'=> '400px')); ?> 
       
            <div class="card-body">
            <h2 class="card-title"> <?= $article->title  ?></h2>
            <p class="card-text"> <?php
                    if(str_word_count($article->body) < 25 ){
                            echo $article->body;
                    }else{
                        echo substr($article->body,0,200).'...';
                    }
             ?> </p>
            <!-- <a href="#" class="">Read More</a> -->
            <?= $this->Html->link("Read More  ", ['action' => 'view', $article->slug], ['class'=>'btn btn-primary']) ?>
            
            </div>
            <div class="card-footer text-muted">
            Posted on  <?= $article->created->format('F jS, Y') ?> by
            <a href="#"><?= ucfirst($article->user->name) ?></a>
            </div>
        </div>
    <?php endforeach; ?>
 
    <!-- Pagination -->
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <!-- <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p> -->
    </div>


  </div>

  <!-- Sidebar Widgets Column -->
  <div class="col-md-2">

    
    <?php if (! empty($tags)) : ?>

    <!-- Categories Widget -->
    <div class="card my-4">
      <h5 class="card-header">Tag list</h5>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-6">
            <ul class="list-unstyled mb-0">
            <?php foreach($tags as $tag): ?>

              <li>
                <a href="#"><?= $tag; ?></a>
              </li>
            <?php endforeach; ?>
            </ul>
          </div>
           
        </div>
      </div>
    </div>
            <?php endif; ?>
 
  </div>

</div>
<!-- /.row -->

 
</div>
