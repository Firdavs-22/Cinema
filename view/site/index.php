<?php

use config\Config;
use config\Language;

/* @var $slider */
/* @var $this */

$this->registerCss('slider');
$this->registerJs('slider');
$this->registerJs('card');

?>
<header>
    <nav id="navbar">
        <div class="container">
            <h1 class="logo"><a href="#"><img src="<?= Config::get('siteBasePath') . 'images/logo.svg'?>"
                    style="width: 150px"></a></h1>
            <ul>
                <li><a href="<?= Config::get('siteUrl') . 'site/' ?>" class="current">Home</a></li>
                <!--                <li><a href="profil.html">Profil</a></li>-->
                <!--                <li><a href="Yoqganlar.html">Yoqganlar</a></li>-->
                <li><a href="<?= Config::get('siteUrl') . 'site/order/' ?>">Buyurtmalar</a></li>
            </ul>
        </div>
    </nav>
</header>
<div class="carousel-container">
    <div class="carousel">
        <div class="nav nav-left">
            <div class="carousel-arrow-icon-left">⮜</div>
        </div>

        <div class="carousel-content">
            <?php
            if (isset($slider) && !empty($slider)) {
                foreach ($slider
                         as $item) {
                    ?>
                    <div class="slide"
                         style="background-image: url('<?= Config::get('siteBasePath') . 'images/' . $item['img'] ?>')">
                        <h2>
                            <?php
                            if (!empty($item['closest_seance_date'])) {
                                echo '<p style="font-size: 40px;">' . $item['title_uz'] . '</p>
                          <p>' . $this->convertToHourMinute($item['duration']) . '</p>
                          <p>' . Language::get('lang', $item['language_type']) . '</p>
                          <p>' . date('d/m', strtotime($item['closest_seance_date'])) . '</p>
                    <p>' . date('H:i', strtotime($item['closest_seance_date'])) . '</p>';
                            } else {
                                echo 'Seanslar yoq';
                            }
                            ?>
                        </h2>
                    </div>
                    <?php
                }
            } else {
                ?>
                <div class="slide">
                    <div>No Cinema</div>
                </div>
                <?php
            }
            ?>
        </div>

        <div class="nav nav-right">
            <div class="carousel-arrow-icon-right">⮞</div>
        </div>
    </div>
</div>
<div class="container-card">
    <div class="cards">
        <?php
        if (isset($slider) && !empty($slider)) {
            foreach ($slider as $item) { ?>
                <div class="card">
                    <div class="card__image-holder">
                        <img class="card__image" src="<?= Config::get('siteBasePath') . 'images/' . $item['img'] ?>"
                             alt="img"/>
                    </div>
                    <div class="card-title">
                        <?php
                        if ($item['seance_id']) {
                            ?>

                            <a class="toggle-info btn">
                                <span class="left"></span>
                                <span class="right"></span>
                            </a>
                            <?php
                        }
                        ?>
                        <h2>
                            <?= $item['title_uz'] ?>
                            <small>
                                <span><?= $item['closest_seance_date'] ? date('d/m H:i', strtotime($item['closest_seance_date'])) : 'Seans yoq' ?></span>
                                <span><?= $item['language_type'] ? Language::get('lang', $item['language_type']) : '' ?></span>
                            </small>
                        </h2>
                    </div>
                    <?php
                    if ($item['seance_id']) {
                        ?>
                        <div class="card-flap flap1">
                            <div class="card-description">
                                <span><?= $this->convertToHourMinute($item['duration']) ?></span>
                                <span><?= $item['description_uz'] ?></span>
                            </div>
                            <div class="card-flap flap2">
                                <div class="card-actions">
                                    <a href="<?= Config::get('siteUrl') . 'site/add/' . $item['seance_id'] ?>"
                                       class="btn">Sotib olish</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                </div>
                <?php
            }
        } else {
            ?>
            <div class="slide">
                <div>No Cinema</div>
            </div>
            <?php
        }
        ?>
    </div>
</div>