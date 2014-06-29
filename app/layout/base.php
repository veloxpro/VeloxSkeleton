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
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">VeloxStack</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container">
        <?php $this->renderBlock('body') ?>
    </div>

    <div class="footer">
        <div class="container">
            <p class="text-muted">Footer content here.</p>
        </div>
    </div>

    <script src="/dist/js/main.js"></script>
</body>
</html>
