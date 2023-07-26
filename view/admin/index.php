<?php

use config\Config;
use config\Language;

/** @var $admins */
/** @var $this */
$this->registerCss('default');
$this->registerCss('table');
$this->registerCss('button');
?>
<h1><?=Language::get('admin')?></h1>
<div class="row">
    <div class="col">
        <a class="btn btn-success"
           href="<?= Config::get('siteUrl') ?>admin/create"><?= Language::get('create　admin') ?></a>
    </div>
</div>
<div class="row">
    <div class="col">
        <table class="table-fill">
            <thead>
            <tr>
                <th class="text-left">#</th>
                <th class="text-left"><?= Language::get('first name') ?></th>
                <th class="text-left"><?= Language::get('last name') ?></th>
                <th class="text-left"><?= Language::get('email') ?></th>
                <th class="text-left"><?= Language::get('phone number') ?></th>
                <th class="text-left"><?= Language::get('role') ?></th>
                <th class="text-left"></th>
            </tr>
            </thead>
            <tbody class="table-hover">
            <?php
            if (isset($admins) && !empty($admins)) {
                $i = 0;
                foreach ($admins as $admin) {
                    ?>
                    <tr>
                        <td class="text-left"><?= ++$i ?></td>
                        <td class="text-left"><?= $admin['first_name'] ?></td>
                        <td class="text-left"><?= $admin['last_name'] ?></td>
                        <td class="text-left"><?= $admin['email'] ?></td>
                        <td class="text-left">+<?= $admin['phone_number'] ?></td>
                        <td class="text-left"><?= $admin['role'] == 2 ? Language::get('super admin') : Language::get('simple admin') ?>
                        </td>
                        <td class="text-left">
                            <a class="icon view"
                               href="<?= Config::get('siteUrl') ?>admin/view/<?= $admin['id'] ?>"><i
                                        class="fa-regular fa-eye"></i></a>
                            <a class="icon update"
                               href="<?= Config::get('siteUrl') ?>admin/update/<?= $admin['id'] ?>"><i
                                        class="fa-solid fa-pen"></i></a>
                            <a class="icon delete"
                               href="<?= Config::get('siteUrl') ?>admin/delete/<?= $admin['id'] ?>"><i
                                        class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td class="text-center" colspan="7"><?= Language::get('not found') ?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
