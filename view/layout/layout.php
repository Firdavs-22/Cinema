<?php

use config\Config;
use config\Language;

/* @var $pageTitle */
/* @var $content */
/* @var $this */
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= $pageTitle ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Klee+One:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <?php $this->registerCss('grid') ?>
    <?php $this->registerCss('layout') ?>
    <?php $this->renderCssFiles() ?>
    <style>
        * {
            font-family: 'Klee One', sans-serif;
        }
    </style>
</head>
<body>

<div class="wrapper">
    <nav id="sidebar">
        <div class="sidebar-header">
            <img src="<?= Config::get('siteBasePath') . 'images/logo.svg'?>"
                 style="width: 150px">
        </div>

        <ul class="list-unstyled components">
            <li class="active">
                <a href="<?= Config::get('siteUrl') ?>user/"><?=Language::get('user')?></a>
                <a href="<?= Config::get('siteUrl') ?>admin/"><?=Language::get('admin')?></a>
                <a href="<?= Config::get('siteUrl') ?>category/"><?=Language::get('category')?></a>
                <a href="<?= Config::get('siteUrl') ?>movie/"><?=Language::get('movie')?></a>
                <a href="<?= Config::get('siteUrl') ?>movieSeance/"><?=Language::get('movie seance')?></a>
                <a href="<?= Config::get('siteUrl') ?>order/"><?=Language::get('order')?></a>
            </li>
        </ul>
        <ul class="list-unstyled components">
            <li class="active">
                <a href="<?= Config::get('siteUrl') ?>language/change/1"><?=Language::get('lang',1)?></a>
                <a href="<?= Config::get('siteUrl') ?>language/change/2"><?=Language::get('lang',2)?></a>
                <a href="<?= Config::get('siteUrl') ?>language/change/3"><?=Language::get('lang',3)?></a>
                <a href="<?= Config::get('siteUrl') ?>language/change/4"><?=Language::get('lang',4)?></a>
                <a href="<?= Config::get('siteUrl') ?>auth/logout"><?=Language::get('logout')?></a>
            </li>
        </ul>
    </nav>
    <div id="content">
        <div class="discription"><?= $content ?></div
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"
        integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php $this->renderJsFiles() ?>
</body>
</html>
