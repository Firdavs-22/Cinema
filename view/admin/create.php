<?php

use config\Config;
use config\Language;

/** @var $this */
$this->registerCss('default');
$this->registerCss('form');
$this->registerCss('button');
?>

<form method="post" action="<?= Config::get('siteUrl') ?>admin/create">
    <div class="row">
        <div class="col">
            <h2><?= Language::get('create　admin') ?></h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="first_name"><?= Language::get('first name') ?></label>
                <input minlength="1" type="text" class="form-control" id="first_name" name="admin[first_name]"
                       placeholder="<?= Language::get('enter first name') ?>" required>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="last_name"><?= Language::get('last name') ?></label>
                <input minlength="1" type="text" class="form-control" id="last_name" name="admin[last_name]"
                       placeholder="<?= Language::get('enter last name') ?>" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="email"><?= Language::get('email') ?></label>
                <input type="email" class="form-control" id="email" name="admin[email]"
                       minlength="6" placeholder="<?= Language::get('enter email') ?>" required>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="phone_number"><?= Language::get('phone number') ?></label>
                <input type="text" class="form-control" id="phone_number" name="admin[phone_number]"
                       minlength="6" placeholder="<?= Language::get('enter phone number') ?>" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="password"><?= Language::get('password') ?></label>
                <input type="password" class="form-control" id="password" name="admin[password]"
                       minlength="4" placeholder="<?= Language::get('enter password') ?>" required>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="role"><?= Language::get('role') ?></label>
                <select class="form-select" name="admin[role]" id="role" required>
                    <option value="1" selected><?= Language::get('simple admin') ?></option>
                    <option value="2"><?= Language::get('super admin') ?></option>
                </select>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-success"><?= Language::get('create　admin') ?></button>
        </div>
    </div>
</form>