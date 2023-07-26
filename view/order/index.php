<?php

use config\Config;
use config\Language;

/** @var $orders */
/** @var $this */
$this->registerCss('default');
$this->registerCss('table');
$this->registerCss('button');

?>
<h1><?=Language::get('order')?></h1>
<div class="row">
    <div class="col">
        <table class="table-fill">
            <thead>
            <tr>
                <th class="text-left">#</th>
                <th class="text-left"><?= Language::get('user') ?></th>
                <th class="text-left"><?= Language::get('title '.Language::get('lang')) ?></th>
                <th class="text-left"><?= Language::get('seance date') ?></th>
                <th class="text-left"><?= Language::get('hall') ?></th>
                <th class="text-left"><?= Language::get('price') ?></th>
                <th class="text-left"><?= Language::get('place count') ?></th>
                <th class="text-left"></th>
            </tr>
            </thead>
            <tbody class="table-hover">
            <?php
            if (isset($orders) && !empty($orders)) {
                $i = 0;
                foreach ($orders as $order) {
                    ?>
                    <tr>
                        <td class="text-left"><?= ++$i ?></td>
                        <td class="text-left"><?= $order['username'] ?></td>
                        <td class="text-left"><?= $order['title_'.Language::get('lang')] ?></td>
                        <td class="text-left"><?= date('d/m/y H:i',strtotime($order['seance_date'])) ?></td>
                        <td class="text-left"><?= $order['hall_title'] ?></td>
                        <td class="text-left"><?= $order['price'] ?></td>
                        <td class="text-left"><?= $order['order_place_count'] ?></td>
                        </td>
                        <td class="text-left">
                            <a class="icon view"
                               href="<?= Config::get('siteUrl') ?>order/view/<?= $order['id'] ?>"><i
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
