<?php

use config\Config;
use config\Language;

/** @var $users */
/** @var $this */
$this->registerCss('default');
$this->registerCss('table');
?>
<h1><?=Language::get('user')?></h1>
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
                <th class="text-left"><?= Language::get('created date') ?></th>
                <th class="text-left"></th>
            </tr>
            </thead>
            <tbody class="table-hover">
            <?php
            if (isset($users) && !empty($users)) {
                $i = 0;
                foreach ($users as $user) {
                    ?>
                    <tr>
                        <td class="text-left"><?= ++$i ?></td>
                        <td class="text-left"><?= $user['first_name'] ?></td>
                        <td class="text-left"><?= $user['last_name'] ?></td>
                        <td class="text-left"><?= $user['email'] ?></td>
                        <td class="text-left">+<?= $user['phone_number'] ?></td>
                        <td class="text-left"><?= date('d/m/y H:i', strtotime($user['created_date'])) ?></td>
                        <td class="text-left">
                            <a class="icon view"
                               href="<?= Config::get('siteUrl') ?>user/view/<?= $user['id'] ?>"><i
                                        class="fa-regular fa-eye"></i></a>
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
