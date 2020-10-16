


 
<div class="col-lg-12 text-right">
<?= $this->Html->link('Edit', ['action' => 'edit', $article->slug]) ?>

</div>
<div class="col-lg-12">
<h1><?= h($article->title) ?></h1>
<p><?= h($article->body) ?></p>
<p><b>Tags:</b> <?= h($article->tag_string) ?></p>
<p><small>Created: <?= $article->created->format(DATE_RFC850) ?></small></p>
<p></p>
</div>
 

