<?php

use config\Config;
use config\Language;

/* @var $this */
/* @var $model */
/* @var $places */

?>
<header>
    <nav id="navbar">
        <div class="container">
            <h1 class="logo"><a href="#"><img src="<?= Config::get('siteBasePath') . 'images/logo.svg'?>"
                                             style="width: 150px"></a></h1>
            <ul>
            <ul>
                <li><a href="<?= Config::get('siteUrl') . 'site/' ?>">Home</a></li>
                <!--                <li><a href="profil.html">Profil</a></li>-->
                <!--                <li><a href="Yoqganlar.html">Yoqganlar</a></li>-->
                <li><a href="<?= Config::get('siteUrl') . 'site/order/' ?>">Buyurtmalar</a></li>
            </ul>
        </div>
    </nav>
</header>
<div class="container"
     style="margin-top: 50px;margin-bottom: 50px;width: 100%;display:flex;align-items:center;flex-direction: column;border-radius: 20px">
    <div style="width: 80%; background:#7a7a7a">
        <img src="<?= Config::get('siteBasePath') . 'images/' . $model['img'] ?>" width="100%" alt="">
        <div style="padding: 10px;display:flex; justify-content: space-between">
            <div>
                <h2><?= $model['title_uz'] ?></h2>
                <div><?= date('d/m H:i', strtotime($model['seance_date'])) ?></div>
                <div>
                    <span><?= ucfirst(Language::get('lang', $model['language_type'])) ?></span>
                    <span><?= $this->convertToHourMinute($model['duration']) ?></span>
                    <span><?= $model['price'] ?></span>
                </div>
            </div>
            <div>
                <?= $model['description_uz'] ?>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <hr>
</div>
<div class="container">
    <?php
    if (isset($places) && !empty($places)) {
        foreach ($places as $place) {
            ?>
<!--            <input type="checkbox" name="" id="">-->
            <?php
        }
    }
    ?>
</div>