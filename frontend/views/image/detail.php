<?php

use app\widgets\Alert;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\widgets\headerdetailWidget;
use yii\helpers\Url;

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
            background-color:rgba(0, 0, 0, 0.3);
        }
        body{
            background-color: black;
            display: flex;
            height: 100vh;
        }
        /* .image-show{
            display: block;
             margin-left: 0 auto;
             margin-right: 0 auto;
        } */
        .img-center{
            display: block;
            margin-left: auto;
            margin-right: auto;

            width: auto;
            height: auto;
            max-height: 100%;
            max-width: 100%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
        }
        .mdc-drawer-app-content {
            flex: auto;
            overflow: auto;
            position: relative;
        }

        .main-content {
            overflow: auto;
            height: 100%;
        }

        .app-bar {
            position: absolute;
        }
        .mdc-drawer{
            width: 260px;
        }
    </style>
</head>
<body>
<?php $this->beginBody() ?>
<aside class="mdc-drawer mdc-drawer--dismissible">
    <header class="mdc-top-app-bar app-bar header-detail" style="background-color: white; color: black;">
        <div class="mdc-top-app-bar__row">
            <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
                <a href="#" class="mdc-icon-button material-icons" aria-label="Backspace" onclick="close()">close</a>
                <span class="mdc-typography--subtitle1">Thông tin</span>
            </section>
        </div>
        <div class="mdc-layout-grid">
          <div class="mdc-layout-grid__inner">
            <div class="mdc-layout-grid__cell--span-4"><?php echo "Tên hình:" ?></div>
            <div class="mdc-layout-grid__cell--span-8"><?php echo $data["image"]; ?></div>
            <div class="mdc-layout-grid__cell--span-6"><?php echo "Ngày, giờ tải lên:"?></div>
            <div class="mdc-layout-grid__cell--span-6"><?php echo $data["date_create"]; ?></div>
          </div>
        </div>
        
        
    </header>
</aside>

<div class="mdc-drawer-app-content" id="main-content">

    <header class="mdc-top-app-bar app-bar header-detail" id="app-bar">
        <div class="mdc-top-app-bar__row">
            <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">              
                <a href="<?= Yii::$app->homeUrl?>" class="material-icons mdc-top-app-bar__action-item" aria-label="Backspace">keyboard_backspace</a>
            </section>

            <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-content">

            </section>

            <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end" role="toolbar">  
                    <a class="material-icons mdc-top-app-bar__action-item" aria-label="Create">share_outline</a>
                    <a class="material-icons mdc-top-app-bar__action-item" aria-label="Upload">tune</a>
                    <a class="material-icons mdc-top-app-bar__action-item" aria-label="User">zoom_in</a>
                    <a class="material-icons mdc-top-app-bar__navigation-icon " aria-label="Create">infor</a>
                    <a onclick="addWist(<?=$data['image_id']?>)" href="javascript:void(0)" class="material-icons mdc-top-app-bar__navigation-icon">star_border</a>
                    <a class="material-icons mdc-top-app-bar__action-item" aria-label="User" onclick="myFunctionDelete()">delete_outline</a>
                    <a class="material-icons mdc-top-app-bar__action-item" aria-label="User" onclick="myFunction()">more_vert</a>
            </section>
        </div>
    </header>
<!--menu-->
    <div class="mdc-menu mdc-menu-surface">
        <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1">
            <li class="mdc-list-item" role="menuitem">
                <span class="mdc-list-item__text">Trình chiếu</span>
            </li>
            <li class="mdc-list-item" role="menuitem">
                <span class="mdc-list-item__text">Tải xuống</span>
            </li>
            <li class="mdc-list-item" role="menuitem">
                <span class="mdc-list-item__text">Xoay</span>
            </li>
            <li class="mdc-list-item" role="menuitem">
                <span class="mdc-list-item__text">Thêm vào album</span>
            </li>
            <li class="mdc-list-item" role="menuitem">
                <span class="mdc-list-item__text">Thêm vào album được chia sẽ</span>
            </li>
            <li class="mdc-list-item" role="menuitem">
                <span class="mdc-list-item__text">Lưu trữ</span>
            </li>
        </ul>
    </div>
    
    <!-- menu delete -->
    <div class="mdc-menu mdc-menu-delete mdc-menu-surface">
        <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1">
        <li>
            <span class="mdc-typography mdc-typography--subtitle1" style="padding-left: 15px;">Bạn có muốn xóa hình ảnh này?</span>
        </li>
        <li class="mdc-list-item" role="menuitem">
            <button class="mdc-button" onclick="functionHuyDelete()">Hủy</button>
            <button class="mdc-button mdc-button--raised" onclick="window.location.href='<?php echo Yii::$app->homeUrl."image/delete?id=".$data["image_id"]?>'">Chuyển vào thùng rác</button>
        </li>
    </ul>
    </div>
    <!-- menu thêm vào yêu thích -->
    <div class="mdc-menu mdc-menu-like mdc-menu-surface">
        <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1">
        <li>
            <span class="mdc-typography mdc-typography--subtitle1" style="padding-left: 15px;">Đã thêm vào album ảnh yêu thích nhé !</span>
        </li>
        <li class="mdc-list-item" role="menuitem">
            <button class="mdc-button" onclick="functionCloseLike()">Đóng</button>
            <button class="mdc-button mdc-button--raised" onclick="window.location.href='#'">Đến album ảnh yêu thích</button>
        </li>
    </ul>
    </div>


    <img class="img-center" src="<?php echo Yii::$app->homeUrl."frontend/web/".$data["path_image"]?>">

</div>

<script>

    mdc.autoInit();
    // xem thong tin
    var drawer = new mdc.drawer.MDCDrawer(document.querySelector('.mdc-drawer'));
    const topAppBar = mdc.topAppBar.MDCTopAppBar.attachTo(document.getElementById('app-bar'));
    topAppBar.setScrollTarget(document.getElementById('main-content'));
    topAppBar.listen('MDCTopAppBar:nav', () => {
        drawer.open = !drawer.open;
    });
    function close() {
        alert("okok");
    }
        //menu header
    const MDCMenu = mdc.menu.MDCMenu;
    const menu = new MDCMenu(document.querySelector('.mdc-menu'));
    menu.open = false;
    menu.setAbsolutePosition(1330, 50);
    function myFunction(){
        menu.open = !menu.open;
    }
    //menu xóa
    const menudelete = new MDCMenu(document.querySelector('.mdc-menu-delete'));
    menudelete.open = false;
    menudelete.setAbsolutePosition(1300, 50);
    function myFunctionDelete(){
        menudelete.open = !menudelete.open;
    }
    function functionHuyDelete(){
        menudelete.close = !menudelete.close;
    }

    //menu yêu thích
    const menulike = new MDCMenu(document.querySelector('.mdc-menu-like'));
    menulike.open = false;
    menulike.setAbsolutePosition(900, 50);
    // function myFunctionLike(){
    //     menulike.open = !menulike.open;
    // }
    function functionCloseLike(){
        menulike.close = !menulike.close;
    }




    function addWist(id) {
        $.get('<?php echo Yii::$app->homeUrl.'image/add' ?>',{'id':id},function (data) {
        });
    }
</script>
<?php $this->endBody() ?>
</body>
</html>
