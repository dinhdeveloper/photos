<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>
<header class="mdc-top-app-bar mdc-top-app-bar--fixed" id="app-bar">
    <div class="mdc-top-app-bar__row">
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
            <a href="#" class="demo-menu material-icons mdc-top-app-bar__navigation-icon">menu</a>
            <a href="<?= Yii::$app->homeUrl ?>" style="text-decoration: none;color: white;padding-left: 27px;"><span
                        class="mdc-top-app-bar__title">My Photos</span></a>
        </section>
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-content">

            <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon"
                 style="background-color:#651fff">
                <i class="material-icons mdc-text-field__icon icon-search" style="color: white">search</i>
                <input type="text" id="my-input" class="mdc-text-field__input" style="color: white"
                       onclick="location.href='<?= Yii::$app->homeUrl . "search" ?>'">
                <div class="mdc-notched-outline">
                    <div class="mdc-notched-outline__leading"></div>
                    <div class="mdc-notched-outline__notch">
                        <label for="my-input" class="mdc-floating-label" style="color: #CDCDCD;">Tìm kiếm ảnh của
                            bạn</label>
                    </div>
                    <div class="mdc-notched-outline__trailing"></div>
                </div>
            </div>

        </section>
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end" role="toolbar">
            <a class="material-icons mdc-top-app-bar__navigation-icon" aria-label="Create" onclick="myFunction()">add_box</a>
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data',
            'action'=>'upload'
            ]]); ?>
            <?= $form->field($model, 'image[]')->fileInput(['multiple' => true, 'accept' => 'image/*',
                'onchange' => 'this.form.submit()', 'style' => 'display:none']) ?>
            <?php ActiveForm::end(); ?>
            <!--            <a href="#" class="material-icons mdc-top-app-bar__action-item" aria-label="Upload" id="btnFileUpload">cloud_upload</a>-->
            <a href="#" class="material-icons mdc-top-app-bar__action-item" aria-label="User" onclick="myFunction2()">account_circle</a>
        </section>
    </div>
</header>
<div class="mdc-menu mdc-menu-1 mdc-menu-surface">
    <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1">
        <li>
            <span class="mdc-typography mdc-typography--subtitle2" style="padding-left: 15px;">TẠO MỚI</span>
        </li>
        <li class="mdc-list-item" role="menuitem">
            <div class="material-icons" style="color: blue">collections</div>
            <span class="mdc-list-item__text" style="padding-left: 15px;">Album</span>
        </li>
        <li class="mdc-list-item" role="menuitem">
            <div class="material-icons" style="color: blue">group</div>
            <span class="mdc-list-item__text" style="padding-left: 15px;">Album được chia sẻ</span>
        </li>
        <li class="mdc-list-item" role="menuitem">
            <div class="material-icons" style="color: blue">movie</div>
            <span class="mdc-list-item__text" style="padding-left: 15px;">Phim</span>
        </li>
        <li class="mdc-list-item" role="menuitem">
            <div class="material-icons" style="color: blue">filter_none</div>
            <span class="mdc-list-item__text" style="padding-left: 15px;">Hoạt ảnh</span>
        </li>
        <li class="mdc-list-item" role="menuitem">
            <div class="material-icons" style="color: blue">web</div>
            <span class="mdc-list-item__text" style="padding-left: 15px;">Ảnh ghép</span>
        </li>
    </ul>
</div>
<div class="mdc-menu mdc-menu-2 mdc-menu-surface">
    <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1">
        <li>
            <span class="mdc-typography mdc-typography--subtitle2" style="padding-left: 15px;">TÀI KHOẢN</span>
        </li>
        <li class="mdc-list-item" role="menuitem">
            <div class="material-icons" style="color: blue">account_circle</div>
            <span class="mdc-list-item__text" style="padding-left: 15px;">Đào Minh Thái</span>
        </li>
        <li class="mdc-list-item">
            <button class="mdc-button" style="background-color: blue; color: white;">Đăng Xuất</button>
        </li>
    </ul>
</div>
<!--end menu-->
<script type="text/javascript">
    const MDCMenu = mdc.menu.MDCMenu;
    const menu = new MDCMenu(document.querySelector('.mdc-menu-1'));
    menu.setFixedPosition(true);
    menu.hoistMenuToBody(); // Not required if the menu is already positioned on the body
    menu.setAbsolutePosition(1000, 50); //tạm thời set cứng
    menu.open = false;

    function myFunction() {
        menu.open = !menu.open;
    }
    const menu2 = new MDCMenu(document.querySelector('.mdc-menu-2'));
    menu2.setFixedPosition(true);
    menu2.hoistMenuToBody(); // Not required if the menu is already positioned on the body
    menu2.setAbsolutePosition(1150,50); //tạm thời set cứng
    menu2.open = false;
    function myFunction2(){
        menu2.open = !menu2.open;
    }
</script>
<!--<script type="text/javascript">-->
<!--    window.onload = function () {-->
<!--        var fileupload = document.getElementById("FileUpload");-->
<!--        var submit = document.getElementById("form");-->
<!--        //var filePath = document.getElementById("spnFilePath");-->
<!--        var button = document.getElementById("btnFileUpload");-->
<!--        button.onclick = function () {-->
<!--            fileupload.click();-->
<!--        };-->
<!--        fileupload.onchange = function () {-->
<!--            var fileName = fileupload.value.split('\\')[fileupload.value.split('\\').length - 1];-->
<!--            document.getElementById("form").submit();-->
<!--            //filePath.innerHTML = "<b>Selected File: </b>" + fileName;-->
<!--            console.log(fileName);-->
<!--            //console.log(fileType);-->
<!--        };-->
<!--    };-->
<!--</script>-->

