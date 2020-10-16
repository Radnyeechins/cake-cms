<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->element('head') ?>
</head>
<body>
    <?= $this->element('header') ?>
    <!-- Page Content -->
    <div id="content" class="container">
        <div class="row">
            <?= $this->fetch('content') ?>
        </div>


    </div>
    <?= $this->element('footer') ?>
    
    
    <?= $this->Html->script('https://code.jquery.com/jquery-3.5.1.min.js'); ?>
    <?= $this->Html->script('https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js'); ?>
    <?= $this->Html->script('https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js'); ?>

    <?= $this->fetch('scriptBottom')?>
</body>
</html>