<?php $this->extend('app/layout/base.php') ?>

<?php $this->startBlock('body') ?>
    Hello <?= $this->escape($name) ?>
<?php $this->endBlock() ?>
