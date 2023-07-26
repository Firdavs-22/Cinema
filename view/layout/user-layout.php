<?php

use config\Config;
use config\Language;

/* @var $pageTitle */
/* @var $content */
/* @var $this */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $pageTitle ?></title>
    <?php $this->registerCss('style') ?>
    <?php $this->renderCssFiles() ?>
</head>
<body>
<div class="body_content">
    <?= $content ?>
    
</div>

<?php $this->renderJsFiles() ?>
</body>
</html>