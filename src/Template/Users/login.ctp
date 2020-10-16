<?= $this->Html->css('../../../css/login.css'); ?>


<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
    <svg width="5em" height="5em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
            </svg>

    </div>

    <!-- Login Form -->
    <?= $this->Form->create() ?>
    <?= $this->Form->control('email',['label' => false,'class'=>'fadeIn second','placeholder'=>'Enter Email Addres']) ?>

    <?= $this->Form->control('password',['label' => false, 'class'=>'fadeIn third']) ?>
    <?= $this->Flash->render() ?>

    <?= $this->Form->button('Login',['class'=>'fadeIn fourth']) ?>

      <?= $this->Form->end() ?>

      
    <!-- Remind Passowrd -->
    <!-- <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div> -->

  </div>

<!-- 
<div class="wrapper fadeInDown">
  <div id="formContent">
  
  <div class="fadeIn first">
    </div>


  
  </div>
</div> -->