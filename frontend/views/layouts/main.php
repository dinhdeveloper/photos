<?php

use app\widgets\Alert;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\widgets\categoryWidget;
use app\widgets\contentWidget;
use app\widgets\headermainWidget;
use app\widgets\menuhideWidget;

?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title>Photo</title>
    <?php $this->head() ?>

    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="<?php echo Yii::$app->homeUrl?>css/style.css">

</head>
<body>
<?php $this->beginBody() ?>

    <?= menuhideWidget::widget(); ?>

<div class="mdc-drawer-scrim "></div>
<div class="mdc-drawer-app-content">
    <main id="main-content">

        <?=$content?>

    </main>
</div>

<script>
    mdc.autoInit();

    var drawer = new mdc.drawer.MDCDrawer(document.querySelector('.mdc-drawer'));
    const topAppBar = mdc.topAppBar.MDCTopAppBar.attachTo(document.getElementById('app-bar'));
    topAppBar.setScrollTarget(document.getElementById('main-content'));
    topAppBar.listen('MDCTopAppBar:nav', () => {
        drawer.open = !drawer.open;
    });
</script>
<?php $this->endBody() ?>
</body>
</html>
