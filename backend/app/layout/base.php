<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Velox Skeleton</title>
    <link rel="shortcut icon" type="image/png" href="favicon.png">
    <link rel="stylesheet" href="/dist/css/styles.min.css">
    <script>var VeloxView = [];</script>
</head>
<body>
    <?php $this->renderBlock('mainNav') ?>
    <div class="container">
        <?php $this->renderBlock('body') ?>
    </div>
    <?php $this->renderBlock('footer') ?>
    <script src="/dist/js/main.js"></script>
</body>
</html>
