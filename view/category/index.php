<?php

use config\Config;
use config\Language;

/** @var $categories */
/** @var $this */
$this->registerCss('default');
$this->registerCss('table');
$this->registerCss('button');
?>
<h1><?=Language::get('category')?></h1>
<div class="row">
    <div class="col">
        <a class="btn btn-success"
           href="<?= Config::get('siteUrl') ?>category/create"><?= Language::get('create category') ?></a>
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
                <th class="text-left"></th>
            </tr>
            </thead>
            <tbody class="table-hover">
            <?php
            if (isset($categories) && !empty($categories)) {
                $i = 0;
                foreach ($categories as $category) {
                    ?>
                    <tr>
                        <td class="text-left"><?= ++$i ?></td>
                        <td class="text-left"><?= $category['title_uz'] ?></td>
                        <td class="text-left"><?= $category['title_ru'] ?></td>
                        <td class="text-left"><?= $category['title_eng'] ?></td>
                        <td class="text-left"><?= $category['title_jap'] ?></td>
                        </td>
                        <td class="text-left">
                            <a class="icon view"
                               href="<?= Config::get('siteUrl') ?>category/view/<?= $category['id'] ?>"><i
                                        class="fa-regular fa-eye"></i></a>
                            <a class="icon update"
                               href="<?= Config::get('siteUrl') ?>category/update/<?= $category['id'] ?>"><i
                                        class="fa-solid fa-pen"></i></a>
                            <a class="icon delete"
                               href="<?= Config::get('siteUrl') ?>category/delete/<?= $category['id'] ?>"><i
                                        class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td class="text-center" colspan="6"><?= Language::get('not found') ?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
