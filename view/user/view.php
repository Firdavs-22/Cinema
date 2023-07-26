<?php

use config\Config;
use config\Language;

/** @var $user */
/** @var $this */
/** @var $orders */
$this->registerCss('default');
$this->registerCss('table');
$this->registerCss('button');
?>

<h1><?= Language::get('user') ?></h1>
<div class="row">
    <div class="col">
        <a class="btn btn-primary"
           href="<?= Config::get('siteUrl') ?>user/"><?= Language::get('back to list') ?></a>
    </div>
</div>
<div class="row">
    <div class="col">
        <table class="table-fill table-detail">
            <tr>
                <th class="text-left"><?= Language::get('first name') ?></th>
                <td class="text-left"><?= $user->first_name ?></td>
            </tr>
            <tr>
                <th class="text-left"><?= Language::get('last name') ?></th>
                <td class="text-left"><?= $user->last_name ?></td>
            </tr>
            <tr>
                <th class="text-left"><?= Language::get('email') ?></th>
                <td class="text-left"><?= $user->email ?></td>
            </tr>
            <tr>
                <th class="text-left"><?= Language::get('phone number') ?></th>
                <td class="text-left">+<?= $user->phone_number ?></td>
            </tr>
            <tr>
                <th class="text-left"><?= Language::get('created date') ?></th>
                <td class="text-left"><?= date('d/m/y H:i', strtotime($user->created_date)) ?></td>
            </tr>
            <tr>
                <th class="text-left"><?= Language::get('password') ?></th>
                <td class="text-left"><?= $user->password_pure ?></td>
            </tr>
            <tr>
                <th class="text-left"><?= Language::get('seance list') ?>:</th>
                <td class="text-left">
                    <?php
                    if (isset($orders) && !empty($orders)) {
                        foreach ($orders as $order) {
                            ?>

                            <a class="btn btn-primary"
                               href="<?= Config::get('siteUrl') ?>order/view/<?= $order['id'] ?>">
                                <?= Language::get('title ' . Language::get('lang')) ?>
                                ：<?= date('d/m/y H:i', strtotime($order['bought_date'])) ?></a>
                            <?php
                        }
                    }
                    ?>
                </td>
            </tr>

        </table>
    </div>
</div>