<?php

use config\Config;
use config\Language;

/** @var $movie */
/** @var $this */
/** @var categories */
$this->registerCss('default');
$this->registerCss('table');
$this->registerCss('button');
$this->registerCss('badge');

?>
<h1><?=Language::get('movie')?></h1>
<div class="row">
    <div class="col">
        <a class="btn btn-primary"
           href="<?= Config::get('siteUrl') ?>movie/"><?= Language::get('back to list') ?></a>
        <a class="btn btn-success"
           href="<?= Config::get('siteUrl') ?>movie/update/<?= $movie->id ?>"><?= Language::get('update movie') ?></a>
    </div>
</div>
<div class="row">
    <div class="col">
        <table class="table-fill table-detail">
            <tr>
                <th class="text-left"><?= Language::get('movie image') ?></th>
                <td class="text-left"><img src="<?= Config::get('siteBasePath') . 'images/' . $movie->img ?>"
                                           style="max-width: 300px; max-height: 300px;"></td>
            </tr>
            <tr>
                <th class="text-left"><?= Language::get('title uz') ?></th>
                <td class="text-left"><?= $movie->title_uz ?></td>
            </tr>
            <tr>
                <th class="text-left"><?= Language::get('title ru') ?></th>
                <td class="text-left"><?= $movie->title_ru ?></td>
            </tr>
            <tr>
                <th class="text-left"><?= Language::get('title eng') ?></th>
                <td class="text-left"><?= $movie->title_eng ?></td>
            </tr>
            <tr>
                <th class="text-left"><?= Language::get('title jap') ?></th>
                <td class="text-left"><?= $movie->title_jap ?></td>
            </tr>
            <tr>
                <th class="text-left"><?= Language::get('description uz') ?></th>
                <td class="text-left"><?= $movie->description_uz ?></td>
            </tr>
            <tr>
                <th class="text-left"><?= Language::get('description ru') ?></th>
                <td class="text-left"><?= $movie->description_ru ?></td>
            </tr>
            <tr>
                <th class="text-left"><?= Language::get('description eng') ?></th>
                <td class="text-left"><?= $movie->description_eng ?></td>
            </tr>
            <tr>
                <th class="text-left"><?= Language::get('description jap') ?></th>
                <td class="text-left"><?= $movie->description_jap ?></td>
            </tr>
            <tr>
                <th class="text-left"><?= Language::get('created date') ?></th>
                <td class="text-left"><?= date('d/m/y H:i', strtotime($movie->created_date)) ?></td>
            </tr>
            <tr>
                <th class="text-left"><?= Language::get('duration') ?></th>
                <td class="text-left"><?= $this->convertToHourMinute($movie->duration) ?></td>
            </tr>
            <tr>
                <th class="text-left"><?= Language::get('category list') ?>：</th>
                <td class="text-left">
                    <?php
                    if (isset($categories) && !empty($categories)) {
                        foreach ($categories as $category) {
                            ?>
                            <span class="badge badge-primary"><?= $category['title_' . Language::get('lang')] ?></span>
                            <?php
                        }
                    }
                    ?>
                </td>
            </tr>

        </table>
    </div>
</div>