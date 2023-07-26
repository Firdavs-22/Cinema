<?php

use config\Config;
use config\Language;

/** @var $admin */
/** @var $this */
$this->registerCss('default');
$this->registerCss('table');
$this->registerCss('button');
?>
<h1><?=Language::get('admin')?></h1>
<div class="row">
    <div class="col">
        <a class="btn btn-primary"
           href="<?= Config::get('siteUrl') ?>admin/"><?= Language::get('back to list') ?></a>
        <a class="btn btn-success"
           href="<?= Config::get('siteUrl') ?>admin/update/<?= $admin->id ?>"><?= Language::get('update admin') ?></a>
        <a class="btn btn-danger"
           href="<?= Config::get('siteUrl') ?>admin/delete/<?= $admin->id ?>"><?= Language::get('delete admin') ?></a>
    </div>
</div>
<div class="row">
    <div class="col">
        <table class="table-fill table-detail">
            <tr>
                <th class="text-left"><?= Language::get('first name') ?></th>
                <td class="text-left"><?= $admin->first_name ?></td>
            </tr>
            <tr>
                <th class="text-left"><?= Language::get('last name') ?></th>
                <td class="text-left"><?= $admin->last_name ?></td>
            </tr>
            <tr>
                <th class="text-left"><?= Language::get('email') ?></th>
                <td class="text-left"><?= $admin->email ?></td>
            </tr>
            <tr>
                <th class="text-left"><?= Language::get('phone number') ?></th>
                <td class="text-left">+<?= $admin->phone_number ?></td>

            </tr>
            <tr>
                <th class="text-left"><?= Language::get('role') ?></th>
                <td class="text-left"><?= $admin->role == 2 ? Language::get('super admin') : Language::get('simple admin') ?>
            </tr>
        </table>
    </div>
</div>