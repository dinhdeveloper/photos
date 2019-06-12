<header class="mdc-top-app-bar app-bar header-detail" id="app-bar">
    <div class="mdc-top-app-bar__row">
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">              
            <a href="<?= Yii::$app->homeUrl?>" class="material-icons mdc-top-app-bar__action-item" aria-label="Backspace">keyboard_backspace</a>
        </section>

        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-content">

        </section>

        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end" role="toolbar">  
                <a href="#" class="material-icons mdc-top-app-bar__action-item" aria-label="Create">share_outline</a>
                <a href="#" class="material-icons mdc-top-app-bar__action-item" aria-label="Upload">tune</a>
                <a href="#" class="material-icons mdc-top-app-bar__action-item" aria-label="User">zoom_in</a>
                <a href="#" class="material-icons mdc-top-app-bar__navigation-icon " aria-label="Create">infor</a>
                <a href="#" class="material-icons mdc-top-app-bar__action-item" aria-label="Upload">star_border</a>
                <a href="<?php echo Yii::$app->homeUrl."frontend/web/image/delete?id=".$data["image_id"]?>" class="material-icons mdc-top-app-bar__action-item" aria-label="User" >delete_outline</a>
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


<script>
    //menu
    const MDCMenu = mdc.menu.MDCMenu;
    const menu = new MDCMenu(document.querySelector('.mdc-menu'));
    menu.open = false;
    menu.setAbsolutePosition(1330, 50);
    function myFunction(){
        menu.open = !menu.open;
    }
</script>
