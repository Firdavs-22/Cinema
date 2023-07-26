<?php

use config\Config;
use config\Language;

/** @var $sheet */
/** @var $places */
/** @var $this */

$this->registerCss('default');
$this->registerCss('table');
$this->registerCss('button');
$this->registerCss('badge');
?>
<h1><?=Language::get('order')?></h1>
<div class="row">
    <div class="col">
        <a class="btn btn-primary"
           href="<?= Config::get('siteUrl') ?>order/"><?= Language::get('back to list') ?></a>
    </div>
</div>
<div class="row">
    <div class="col">
        <table class="table-fill table-detail">
            <tr>
                <th class="text-left"><?= Language::get('movie image') ?></th>
                <td class="text-left"><img src="<?= Config::get('siteBasePath') . 'images/' . $sheet['img'] ?>"
                                           style="max-width: 300px; max-height: 300px;"></td>
            </tr>
            <tr>
                <th class="text-left"><?= Language::get('user') ?></th>
                <td class="text-left"><?= $sheet['username'] ?></td>
            </tr>
            <tr>
                <th class="text-left"><?= Language::get('title ' . Language::get('lang')) ?></th>
                <td class="text-left"><?= $sheet['title_' . Language::get('lang')] ?></td>
            </tr>
            <tr>
                <th class="text-left"><?= Language::get('description ' . Language::get('lang')) ?></th>
                <td class="text-left"><?= $sheet['description_' . Language::get('lang')] ?></td>
            </tr>
            <tr>
                <th class="text-left"><?= Language::get('price') ?>：</th>
                <td class="text-left"><?= $sheet['price'] ?></td>
            </tr>
            <tr>
                <th class="text-left"><?= Language::get('language type') ?>：</th>
                <td class="text-left"><?= Language::get('lang', $sheet['language_type']) ?></td>
            </tr>
            <tr>
                <th class="text-left"><?= Language::get('seance date') ?>：</th>
                <td class="text-left"><?= date('d/m/y H:i', strtotime($sheet['seance_date'])) ?></td>
            </tr>
            <tr>
                <th class="text-left"><?= Language::get('duration') ?>：</th>
                <td class="text-left"><?= $this->convertToHourMinute($sheet['duration']) ?></td>
            </tr>
            <tr>
                <th class="text-left"><?= Language::get('hall') ?>：</th>
                <td class="text-left"><?= $sheet['hall_title'] ?></td>
            </tr>
            <tr>
                <th class="text-left"><?= Language::get('place') ?>：</th>
                <td class="text-left">
                    <?php
                    if (isset($places) && !empty($places))
                        foreach ($places as $place) {
                            ?>
                            <span class="badge badge-primary"><?= $place['place'] ?></span>
                            <?php
                        }
                    ?>
                </td>
            </tr>
        </table>
    </div>
</div>