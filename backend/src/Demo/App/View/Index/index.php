<?php $this->extend(__DIR__ . '/../../layout/front.php') ?>

<?php $this->startBlock('body') ?>
    <?php if (empty($name)) : ?>
        <h1>VeloxStack Skeleton App</h1>
        <p class="lead">Use this as a way to quickly start any new VeloxStack project.</p>
    <?php else : ?>
        <h1>Hello <?= $this->escape($name) ?></h1>
    <?php endif; ?>
    <script>Velox.run('Demo.App', 'Index', 'index')</script>
<?php $this->endBlock() ?>
