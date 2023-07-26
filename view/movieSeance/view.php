<?php

use config\Config;
use config\Language;

/** @var $seance */
/** @var $this */
$this->registerCss('default');
$this->registerCss('table');
$this->registerCss('button');
$this->registerCss('badge');
?>

<h1><?=Language::get('movie seance')?></h1>
<div class="row">
    <div class="col">
        <a class="btn btn-primary"
           href="<?= Config::get('siteUrl') ?>movieSeance/"><?= Language::get('back to list') ?></a>
    </div>
</div>
<div class="row">
    <div class="col">
        <table class="table-fill table-detail">
            <tr>
                <th class="text-left"><?= Language::get('movie image') ?></th>
                <td class="text-left"><img src="<?= Config::get('siteBasePath') . 'images/' . $seance['img'] ?>"
                                           style="max-width: 300px; max-height: 300px;"></td>
            </tr>
            <tr>
                <th class="text-left"><?= Language::get('title '.Language::get('lang')) ?></th>
                <td class="text-left"><?= $seance['title_'.Language::get('lang')] ?></td>
            </tr>
            <tr>
                <th class="text-left"><?= Language::get('price') ?>：</th>
                <td class="text-left"><?= $seance['price']?></td>
            </tr>
            <tr>
                <th class="text-left"><?= Language::get('language type') ?>：</th>
                <td class="text-left"><?= Language::get('lang', $seance['language_type'])?></td>
            </tr>
            <tr>
                <th class="text-left"><?= Language::get('duration') ?>：</th>
                <td class="text-left"><?= $this->convertToHourMinute($seance['duration']) ?></td>
            </tr>
            <tr>
                <th class="text-left"><?= Language::get('hall') ?>：</th>
                <td class="text-left"><?= $seance['title'] ?></td>
            </tr>

        </table>
    </div>
</div>