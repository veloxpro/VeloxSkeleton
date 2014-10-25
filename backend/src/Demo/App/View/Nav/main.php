<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?= $projectName ?></a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <?php $uri = $this->uri(); ?>
                <?php foreach ($navItems as $i): ?>
                    <?php $i['href'] = isset($i['route']) ? $this->route($i['route'], isset($i['routeParams']) ? $i['routeParams'] : []) : '' ?>
                    <?php $href = empty($i['href']) ? '#' : $i['href']; ?>
                    <?php $hasChildren = isset($i['children']); ?>
                    <li class="<?= $href == $uri ? 'active' : '' ?>">
                        <a href="<?= $href ?>" <?php if ($hasChildren) : ?>class="dropdown-toggle" data-toggle="dropdown"<?php endif; ?>>
                            <?= $i['title'] ?>
                            <?php if ($hasChildren): ?><span class="caret"></span><?php endif; ?>
                        </a>
                        <?php if ($hasChildren): ?>
                            <ul class="dropdown-menu" role="menu">
                            <?php foreach ($i['children'] as $child) : ?>
                                <?php $href = empty($child['href']) ? '#' : $child['href']; ?>
                                <li><a href="<?= $href ?>"><?= $child['title'] ?></a></li>
                            <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
                <!--li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li-->
            </ul>
        </div>
    </div>
</div>
