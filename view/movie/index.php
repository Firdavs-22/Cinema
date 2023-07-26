<?php

use config\Config;
use config\Language;

/** @var $movies */
/** @var $this */
$this->registerCss('default');
$this->registerCss('table');
$this->registerCss('button');
?>
<h1><?=Language::get('movie')?></h1>
<div class="row">
    <div class="col">
        <a class="btn btn-success"
           href="<?= Config::get('siteUrl') ?>movie/create"><?= Language::get('create movie') ?></a>
    </div>
</div>
<div class="row">
    <div class="col">
        <table class="table-fill">
            <thead>
            <tr>
                <th class="text-left">#</th>
                <th class="text-left"><?= Language::get('title uz') ?></th>
                <th class="text-left"><?= Language::get('title ru') ?></th>
                <th class="text-left"><?= Language::get('title eng') ?></th>
                <th class="text-left"><?= Language::get('title jap') ?></th>
                <th class="text-left"><?= Language::get('created date') ?></th>
                <th class="text-left"><?= Language::get('duration') ?></th>
                <th class="text-left"></th>
            </tr>
            </thead>
            <tbody class="table-hover">
            <?php
            if (isset($movies) && !empty($movies)) {
                $i = 0;
                foreach ($movies as $movie) {
                    ?>
                    <tr>
                        <td class="text-left"><?= ++$i ?></td>
                        <td class="text-left"><?= $movie['title_uz'] ?></td>
                        <td class="text-left"><?= $movie['title_ru'] ?></td>
                        <td class="text-left"><?= $movie['title_eng'] ?></td>
                        <td class="text-left"><?= $movie['title_jap'] ?></td>
                        <td class="text-left"><?= date('d/m/y H:i',strtotime($movie['created_date'])) ?></td>
                        <td class="text-left"><?= $this->convertToHourMinute($movie['duration']) ?></td>
                        </td>
                        <td class="text-left">
                            <a class="icon view"
                               href="<?= Config::get('siteUrl') ?>movie/view/<?= $movie['id'] ?>"><i
                                        class="fa-regular fa-eye"></i></a>
                            <a class="icon update"
                               href="<?= Config::get('siteUrl') ?>movie/update/<?= $movie['id'] ?>"><i
                                        class="fa-solid fa-pen"></i></a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td class="text-center" colspan="8"><?= Language::get('not found') ?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
