<?php

use app\widgets\Alert;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\widgets\headerdetailWidget;

?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="<?php echo Yii::$app->homeUrl?>css/style.css">
    <style>
        .header-detail{

        }
        body{
            display: flex;
            height: 100vh;
        }
        /* .image-show{
            display: block;
            margin-left: 0 auto;
            margin-right: 0 auto;
        } */
        /*  .mdc-list{
             margin: 16px auto;
             margin-top: 64px;
             max-width: 720px;
             position: relative;
             width: 50%;
             border: 1;
         } */
        .mdc-elevation--z4{
            margin: 16px auto;
            margin-top: 70px;
            max-width: 562.67px;
            position: relative;
            width: 50%;
            border: 1;
        }
    </style>
</head>
<body>
<?php $this->beginBody() ?>
<header class="mdc-top-app-bar mdc-top-app-bar--fixed header-detail" id="app-bar">
    <div class="mdc-top-app-bar__row">
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start color-icon">
            <a href="<?= Yii::$app->homeUrl ?>" class="material-icons mdc-top-app-bar__action-item" aria-label="Backspace">keyboard_backspace</a>
        </section>

        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-content">
            <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon" style="background-color:#651fff">
                <i class="material-icons mdc-text-field__icon icon-search" style="color: white">search</i>
                <input type="text" id="my-input" class="mdc-text-field__input" style="color: white">
                <div class="mdc-notched-outline">
                    <div class="mdc-notched-outline__leading"></div>
                    <div class="mdc-notched-outline__notch">
                        
                    </div>
                    <div class="mdc-notched-outline__trailing"></div>
                </div>
            </div>

        </section>

        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end" role="toolbar">
            <a href="#" class="material-icons mdc-top-app-bar__action-item" aria-label="User">more_vert</a>
        </section>
    </div>
</header>

<div class="mdc-elevation--z4">
    <ul class="mdc-list">
        <?php foreach ($albums as $key => $value): ?>
            <li class="mdc-list-item" tabindex="0">
            <span class="mdc-list-item__graphic material-icons">star_border</span>
            <?php echo $value["title"] ?>
        </li>
        <?php endforeach ?>  
    </ul>
</div>

<script>
    const list = new MDCList(document.querySelector('.mdc-list'));
</script>
<?php $this->endBody() ?>
</body>
</html>
