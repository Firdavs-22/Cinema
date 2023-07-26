<?php

use config\Config;
use config\Language;

/** @var $this */
$this->registerCss('default');
$this->registerCss('form');
$this->registerCss('button');
?>

<form method="post" action="<?= Config::get('siteUrl') ?>category/create">
    <div class="row">
        <div class="col">
            <h2><?= Language::get('create category') ?></h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="title_uz"><?= Language::get('title uz') ?></label>
                <input minlength="1" type="text" class="form-control" id="title_uz" name="category[title_uz]"
                       placeholder="<?= Language::get('enter title uz') ?>" required>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="title_ru"><?= Language::get('title ru') ?></label>
                <input minlength="1" type="text" class="form-control" id="title_ru" name="category[title_ru]"
                       placeholder="<?= Language::get('enter title ru') ?>" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="title_eng"><?= Language::get('title eng') ?></label>
                <input type="text" class="form-control" id="title_eng" name="category[title_eng]"
                       minlength="1" placeholder="<?= Language::get('enter title eng') ?>" required>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="title_jap"><?= Language::get('title jap') ?></label>
                <input type="text" class="form-control" id="title_jap" name="category[title_jap]"
                       minlength="1" placeholder="<?= Language::get('enter title jap') ?>" required>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-success"><?= Language::get('create category') ?></button>
        </div>
    </div>
</form>