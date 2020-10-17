<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample09">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                 <?= $this->Html->link("Home", ['controller' => 'Pages', 'action' => 'display'],['class'=>'nav-link']) ?>
            </li>
            <?php if (!is_null($this->request->getSession()->read('Auth.User.id')) && $this->request->getSession()->read('Auth.User.id') == 1) { ?>
            <li class="nav-item">
                 <?= $this->Html->link("User list", ['controller' => 'Users', 'action' => 'index'],['class'=>'nav-link']) ?>
            </li>
            
            <li class="nav-item">
                 <?= $this->Html->link("Articles list", ['controller' => 'Articles', 'action' => 'index'],['class'=>'nav-link']) ?>
            </li>
              <?php }  if (is_null($this->request->getSession()->read('Auth.User.email'))) 
            { ?>
            <li class="nav-item">
                 <?= $this->Html->link("Login", ['controller' => 'Users', 'action' => 'login'],['class'=>'nav-link']) ?>
            </li>
            <?php } else { ?>
               <?php if (!is_null($this->request->getSession()->read('Auth.User.id')) && $this->request->getSession()->read('Auth.User.id') != 1) { ?>
              
            <li class="nav-item">
                 <?= $this->Html->link("My Articles", ['controller' => 'Articles', 'action' => 'index'],['class'=>'nav-link']) ?>
            </li>
               <?php } ?>
            <li class="nav-item">
                 <?= $this->Html->link("Log Out", ['controller' => 'Users', 'action' => 'logout'],['class'=>'nav-link']) ?>
            </li>
            <?php } ?>
          </ul>
  
        </div>
      </nav>
