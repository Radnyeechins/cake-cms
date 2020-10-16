
<div class="col-lg-12">
<?= $this->Form->create($article,['class'=>'needs-validation','novalidate', 'enctype' => 'multipart/form-data']) ?>
<?= $this->Form->control('user_id', ['type' => 'hidden', 'value' =>  $article->user_id ]); ?>
 
<div class="row">
  <div class="col-lg-6">
    <div class="form-group">
        <?= $this->Form->control('title',['label' => 'Title','class'=>'form-control','placeholder'=>'Enter the title','required'=>'required']) ?>
  
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
      </div>

  </div>

  <div class="col-lg-6">
  <div class="form-group"> 
      <?= $this->Form->control('body',['label' => 'Description','rows' => '5','class'=>'form-control','placeholder'=>'Enter the description','required'=>'required']) ?>

      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
  </div>
</div>
 <div class="row">
   <div class="col-lg-6">
   <div class="form-group"> 
    <label for="uname">Tags</label>
      <?=  $this->Form->select('tags._ids',$tags, ['multiple' => true,'class'=>'form-control']); ?>
    
   </div>

   </div>
   <div class="col-lg-6">
   <div class="form-group"> 
      <?= $this->Form->input('upload', array('type' => 'file','class'=>'form-control')); ?>
    </div>

   </div>
 </div>   
    
  


    <?= $this->Form->button(__('Save Article'),['class'=>'btn btn-primary']); ?>
    <?= $this->Form->end(); ?>
  
</div>

 
<?= 
$this->Html->scriptBlock(
    "(function() {
        'use strict';
        window.addEventListener('load', function() {
          // Get the forms we want to add validation styles to
          var forms = document.getElementsByClassName('needs-validation');
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();",
    array('block' => 'scriptBottom')
);
?>