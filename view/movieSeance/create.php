<?php

use config\Config;
use config\Language;

/** @var $this */
/** @var $halls */
/** @var $movies */

$this->registerCss('default');
$this->registerCss('form');
$this->registerCss('button');
$this->registerJs('convert_minute');
$this->registerJs('preview_image');
?>

<form method="post" action="<?= Config::get('siteUrl') ?>movieSeance/create">

    <div class="row">
        <div class="col">
            <h2><?= Language::get('create seance') ?></h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="movie"><?= Language::get('movie list') ?></label>
                <select name="movie_seance[movie]" id="movie" class="form-control">
                    <?php
                    if (isset($movies) && !empty($movies)) {
                        foreach ($movies as $movie) {
                            ?>
                            <option value="<?=$movie['id']?>"><?=$movie['title_'.Language::get('lang')]?></option>
                            <?php
                        }
                    }
                    ?>

                </select>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="hall"><?= Language::get('hall') ?></label>
                <select name="movie_seance[hall]" id="hall" class="form-control">
                    <?php
                    if (isset($halls) && !empty($halls)) {
                        foreach ($halls as $hall) {
                            ?>
                            <option value="<?=$hall['id']?>"><?=$hall['title']?></option>
                            <?php
                        }
                    }
                    ?>

                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="lang"><?= Language::get('language type') ?></label>
                <select name="movie_seance[lang]" id="lang" class="form-control">
                    <option value="1">Uzb</option>
                    <option value="2">Ru</option>
                    <option value="3">Eng</option>
                    <option value="4" selected>Jap</option>
                </select>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="price"><?= Language::get('price') ?></label>
                <input min="1" type="number" class="form-control" id="price" name="movie_seance[price]" required
                       value="1">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="seance_date"><?= Language::get('price') ?></label>
                <input type="datetime-local" id="seance_date" class="form-control" name="movie_seance[seance_date]" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-success"><?= Language::get('create movie') ?></button>
        </div>
    </div>
</form>