<?php $this->extend('app/layout/base.php') ?>

<?php $this->startBlock('mainNav') ?>
<?php $this->execute('Extra\\Widget', 'Nav', 'main') ?>
<?php $this->endBlock() ?>

<?php $this->startBlock('footer') ?>
<div class="footer">
    <div class="container">
        <p class="text-muted">VeloxStack. Fast and flexible modern app development stack.</p>
    </div>
</div>
<?php $this->endBlock() ?>
