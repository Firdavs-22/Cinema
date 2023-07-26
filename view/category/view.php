<?php

use config\Config;
use config\Language;

/** @var $category */
/** @var $this */
$this->registerCss('default');
$this->registerCss('table');
$this->registerCss('button');
?>
<h1><?=Language::get('category')?></h1>
<div class="row">
    <div class="col">
        <a class="btn btn-primary"
           href="<?= Config::get('siteUrl') ?>category/"><?= Language::get('back to list') ?></a>
        <a class="btn btn-success"
           href="<?= Config::get('siteUrl') ?>category/update/<?= $category->id ?>"><?= Language::get('update category') ?></a>
        <a class="btn btn-danger"
           href="<?= Config::get('siteUrl') ?>category/delete/<?= $category->id ?>"><?= Language::get('delete category') ?></a>
    </div>
</div>
<div class="row">
    <div class="col">
        <table class="table-fill table-detail">
            <tr>
                <th class="text-left"><?= Language::get('title uz') ?></th>
                <td class="text-left"><?= $category->title_uz ?></td>
            </tr>
            <tr>
                <th class="text-left"><?= Language::get('title ru') ?></th>
                <td class="text-left"><?= $category->title_ru ?></td>
            </tr>
            <tr>
                <th class="text-left"><?= Language::get('title eng') ?></th>
                <td class="text-left"><?= $category->title_eng ?></td>
            </tr>
            <tr>
                <th class="text-left"><?= Language::get('title jap') ?></th>
                <td class="text-left"><?= $category->title_jap ?></td>
            </tr>

        </table>
    </div>
</div>