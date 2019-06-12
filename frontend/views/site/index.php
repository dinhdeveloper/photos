<?php

use yii\widgets\ActiveForm;

?>
<style>
    * {
        box-sizing: border-box;
    }

    .row {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        padding: 0 4px;
    }

    /*/ Create four equal columns that sits next to each other /*/
    .column {
        -ms-flex: 25%;
        flex: 25%;
        max-width: 25%;
        padding: 0 4px;
    }

    .column img {
        margin-top: 8px;
        vertical-align: middle;
    }

    /*/ Responsive layout - makes a two column-layout instead of four columns /*/
    @media screen and (max-width: 800px) {
        .column {
            -ms-flex: 50%;
            flex: 50%;
            max-width: 50%;
            float: left;
        }
    }

    /*/ Responsive layout - makes the two columns stack on top of each other instead of next to each other /*/
    @media screen and (max-width: 600px) {
        .column {
            -ms-flex: 100%;
            flex: 100%;
            max-width: 100%;
        }
    }

    * {
        box-sizing: border-box;
    }

    .container {
        position: relative;

    }

    .image {
        display: block;
        width: 100%;
        height: auto;
    }

    .overlay {
        position: absolute;
        top: 0;
        background: rgb(0, 0, 0);
        background: rgba(0, 0, 0, 0.2);
        color: #f1f1f1;
        width: 100%;
        transition: .5s ease;
        opacity: 0;
        color: white;
        font-size: 20px;
        padding: 1%;
        text-align: left;
    }

    .container:hover .overlay {
        opacity: 1;
    }
</style>
<!--style="overflow-x: hidden;"-->
<body>

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
                'action' => 'upload'
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
<!--end header-->
<div class="demo-drawer">
    <div class="menu-item ">
        <button class="mdc-fab" aria-label="Favorite" onclick="location.href='<?= Yii::$app->homeUrl ?>';">
            <span class="mdc-fab__icon material-icons">photo</span>
        </button>
    </div>
    <div class="menu-item">
        <button class="mdc-fab" aria-label="Favorite"
                onclick="location.href='<?= Yii::$app->homeUrl . "site/albums" ?>';">
            <span class="mdc-fab__icon material-icons">collections_bookmark</span>
        </button>
    </div>
    <div class="menu-item">
        <button class="mdc-fab" aria-label="Favorite" onclick="location.href='<?= Yii::$app->homeUrl . "sharing" ?>';">
            <span class="mdc-fab__icon material-icons">group</span>
        </button>
    </div>
</div>
<!--end menuleft-->
<div>

    <span class="mdc-typography mdc-typography--heading6"
          style="padding-left: 10px;color: blue"><b>DANH SÁCH ẢNH</b></span>
    <div class="row">

        <?php
        $pss = date_default_timezone_set('Asia/Ho_Chi_Minh');
        //$tomorrow  = mktime(0, 0, 0, date("m")  , date("d")+1, date("Y"));
        foreach ($image as $key => $value) {
            ?>
            <div class="column " style="padding: 5px">
            <span class="mdc-typography--subtitle2"><?php
                echo $value["date_create"] . " " . $value["location"];
                ?></span>
                <a href="<?php echo Yii::$app->homeUrl . "image/detail?id=" . $value["image_id"] ?>">
                    <div class="container">
                        <img src="<?php echo Yii::$app->homeUrl . "frontend/web/" . $value["path_image"] ?>"
                             class="image">
                        <div class="overlay">
                            <div class="mdc-form-field" style="color: white">
                                <div class="mdc-checkbox">
                                    <input type="checkbox"
                                           class="mdc-checkbox__native-control"
                                           id="checkbox-1" style="color: white"/>
                                    <div class="mdc-checkbox__background">
                                        <svg class="mdc-checkbox__checkmark"
                                             viewBox="0 0 24 24">
                                            <path class="mdc-checkbox__checkmark-path" fill="none"
                                                  d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                        </svg>
                                        <div class="mdc-checkbox__mixedmark"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

            </div>
            <?php
        }
        ?>
    </div>

</div>


<script>
    const checkbox = new MDCCheckbox(document.querySelector('.mdc-checkbox'));
    const formField = new MDCFormField(document.querySelector('.mdc-form-field'));
    formField.input = checkbox;
</script>
</body>