<?php

use config\Config;
use config\Language;

/** @var $model */
/** @var $this */
$this->registerCss('default');
$this->registerCss('button');
$this->registerCss('form');
?>

<form method="post" action="<?= Config::get('siteUrl') ?>category/update/<?= $model->id ?>">
    <div class="row">
        <div class="col">
            <h2><?= Language::get('update category') ?></h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="title_uz"><?= Language::get('title uz') ?></label>
                <input minlength="1" type="text" class="form-control" id="title_uz" name="category[title_uz]"
                       placeholder="<?= Language::get('enter title uz') ?>" required value="<?= $model->title_uz ?>">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="title_ru"><?= Language::get('title ru') ?></label>
                <input minlength="1" type="text" class="form-control" id="title_ru" name="category[title_ru]"
                       placeholder="<?= Language::get('enter title ru') ?>" required value="<?= $model->title_ru ?>">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="title_eng"><?= Language::get('title eng') ?></label>
                <input type="text" class="form-control" id="title_eng" name="category[title_eng]"
                       minlength="1" placeholder="<?= Language::get('enter title eng') ?>" required
                       value="<?= $model->title_eng ?>">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="title_jap"><?= Language::get('title jap') ?></label>
                <input type="text" class="form-control" id="title_jap" name="category[title_jap]"
                       minlength="1" placeholder="<?= Language::get('enter title jap') ?>" required
                       value="<?= $model->title_jap ?>">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-success"><?= Language::get('update category') ?></button>
        </div>
    </div>
</form>