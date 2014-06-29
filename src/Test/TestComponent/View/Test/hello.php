<?php $this->extend('app/layout/base.php') ?>

<?php $this->startBlock('body') ?>
    <?php if (empty($name)) : ?>
        <h1>VeloxStack Skeleton App</h1>
        <p class="lead">Use this as a way to quickly start any new VeloxStack project.</p>
    <?php else : ?>
        <h1>Hello <?= $this->escape($name) ?></h1>
    <?php endif; ?>
    <script>VeloxView.push('Test/Test/hello');</script>
<?php $this->endBlock() ?>
