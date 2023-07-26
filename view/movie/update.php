<?php

use config\Config;
use config\Language;

/** @var $this */
/** @var $model */
/** @var $categories */
$this->registerCss('default');
$this->registerCss('form');
$this->registerCss('button');
$this->registerJs('convert_minute');
$this->registerJs('preview_image');
?>

<form method="post" action="<?= Config::get('siteUrl') ?>movie/update/<?= $model->id ?>" enctype="multipart/form-data">
    <div class="row">
        <div class="col">
            <h2><?= Language::get('update movie') ?></h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="title_uz"><?= Language::get('title uz') ?></label>
                <input minlength="1" type="text" class="form-control" id="title_uz" name="movie[title_uz]"
                       placeholder="<?= Language::get('enter title uz') ?>" required
                       value="<?= $model->title_uz ?>">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="title_ru"><?= Language::get('title ru') ?></label>
                <input minlength="1" type="text" class="form-control" id="title_ru" name="movie[title_ru]"
                       placeholder="<?= Language::get('enter title ru') ?>" required
                       value="<?= $model->title_ru ?>">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="title_eng"><?= Language::get('title eng') ?></label>
                <input type="text" class="form-control" id="title_eng" name="movie[title_eng]"
                       minlength="1" placeholder="<?= Language::get('enter title eng') ?>" required
                       value="<?= $model->title_eng ?>">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="title_jap"><?= Language::get('title jap') ?></label>
                <input type="text" class="form-control" id="title_jap" name="movie[title_jap]"
                       minlength="1" placeholder="<?= Language::get('enter title jap') ?>" required
                       value="<?= $model->title_jap ?>">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="description_uz"><?= Language::get('description uz') ?></label>
                <textarea class="form-control" id="description_uz" name="movie[description_uz]" cols="1" rows="1"
                          minlength="1" placeholder="<?= Language::get('enter description uz') ?>"
                          required><?= $model->description_uz ?></textarea>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="description_ru"><?= Language::get('description ru') ?></label>
                <textarea class="form-control" id="description_ru" name="movie[description_ru]" cols="1" rows="1"
                          minlength="1" placeholder="<?= Language::get('enter description ru') ?>"
                          required><?= $model->description_ru ?></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="description_eng"><?= Language::get('description eng') ?></label>
                <textarea class="form-control" id="description_eng" name="movie[description_eng]" cols="1" rows="1"
                          minlength="1" placeholder="<?= Language::get('enter description eng') ?>"
                          required><?= $model->description_eng ?></textarea>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="description_jap"><?= Language::get('description jap') ?></label>
                <textarea class="form-control" id="description_jap" name="movie[description_jap]" cols="1" rows="1"
                          minlength="1" placeholder="<?= Language::get('enter description jap') ?>"
                          required><?= $model->description_jap ?></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col col-4">
            <div class="form-group">
                <label><?= Language::get('category list') ?>：</label>
                <section style="display: flex; flex-wrap: wrap">
                    <?php
                    if (isset($categories) && !empty($categories)) {
                        foreach ($categories as $category) {
                            ?>
                            <label style="margin-left: 10px">
                                <input type="checkbox"
                                       name="movie[categories][]" <?= $category['have_category'] ? 'checked' : '' ?>
                                       value="<?= $category['id'] ?>"><?= $category['title_' . Language::get('lang')] ?>
                            </label>
                            <?php
                        }
                    }
                    ?>
                </section>
            </div>
        </div>
        <div class="col col-3">
            <div class="form-group">
                <label for="duration"><?= Language::get('duration') ?>: <span id="duration_result">0h 1m</span></label>
                <input type="number" name="movie[duration]" class="form-control" id="duration" min="1"
                       value="<?= $model->duration ?>" placeholder="<?= Language::get('enter duration') ?>" required>
            </div>
        </div>
        <div class="col col-5">
            <div class="form-group">
                <label for="description_jap"><?= Language::get('movie image') ?></label>
                <input type="file" class="form-control" name="image" id="image" accept="image/*" onchange="previewImage(event)">
                <img id="preview" src="<?= Config::get('siteBasePath').'images/'.$model->img ?>"
                     style="max-width: 300px; max-height: 300px;">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-success"><?= Language::get('update movie') ?></button>
        </div>
    </div>
</form>