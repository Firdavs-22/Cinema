<?php

use config\Config;
use config\Language;

/** @var $seances */
/** @var $this */
$this->registerCss('default');
$this->registerCss('table');
$this->registerCss('button');
?>

<h1><?=Language::get('movie seance')?></h1>
<div class="row">
    <div class="col">
        <a class="btn btn-success"
           href="<?= Config::get('siteUrl') ?>movieSeance/create"><?= Language::get('create seance') ?></a>
    </div>
</div>
<div class="row">
    <div class="col">
        <table class="table-fill">
            <thead>
            <tr>
                <th class="text-left">#</th>
                <th class="text-left"><?= Language::get('title '.Language::get('lang')) ?></th>
                <th class="text-left"><?= Language::get('seance date') ?></th>
                <th class="text-left"><?= Language::get('hall') ?></th>
                <th class="text-left"><?= Language::get('price') ?></th>
                <th class="text-left"><?= Language::get('language type') ?></th>
                <th class="text-left"><?= Language::get('duration') ?></th>
                <th class="text-left"></th>
            </tr>
            </thead>
            <tbody class="table-hover">
            <?php
            if (isset($seances) && !empty($seances)) {
                $i = 0;
                foreach ($seances as $seance) {
                    ?>
                    <tr>
                        <td class="text-left"><?= ++$i ?></td>
                        <td class="text-left"><?= $seance['title_'.Language::get('lang')] ?></td>
                        <td class="text-left"><?= date('d/m/y H:i',strtotime($seance['seance_date'])) ?></td>
                        <td class="text-left"><?= $seance['title'] ?></td>
                        <td class="text-left"><?= $seance['price'] ?></td>
                        <td class="text-left"><?= Language::get('lang',$seance['language_type']) ?></td>
                        <td class="text-left"><?= $this->convertToHourMinute($seance['duration']) ?></td>
                        </td>
                        <td class="text-left">
                            <a class="icon view"
                               href="<?= Config::get('siteUrl') ?>movieSeance/view/<?= $seance['id'] ?>"><i
                                        class="fa-regular fa-eye"></i></a>
                            
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
