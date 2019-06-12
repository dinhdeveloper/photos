<aside class="mdc-drawer mdc-drawer--modal ">
    <div class="mdc-drawer__content">
        <nav class="mdc-list">
            <a href="<?= Yii::$app->homeUrl ?>" style="text-decoration: none;color: blue;">
                <span class="mdc-top-app-bar__title ">My Photos</span>
            </a>

            <a class="mdc-list-item mdc-list-item--activated" href="<?= Yii::$app->homeUrl ?>" aria-selected="true">
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">image</i>
                <span class="mdc-list-item__text">Ảnh</span>
            </a>
            <a class="mdc-list-item" href="<?= Yii::$app->homeUrl."site/albums" ?>">
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">collections_bookmark</i>
                <span class="mdc-list-item__text">Album</span>
            </a>
            <a class="mdc-list-item" href="<?= Yii::$app->homeUrl."sharing" ?>">
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">share</i>
                <span class="mdc-list-item__text">Chia sẻ</span>
            </a>
            <hr>
            <a class="mdc-list-item" href="<?= Yii::$app->homeUrl."archive" ?>">
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">get_app</i>
                <span class="mdc-list-item__text">Lưu trữ</span>
            </a>
            <a class="mdc-list-item" href="<?= Yii::$app->homeUrl."trash" ?>">
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">delete</i>
                <span class="mdc-list-item__text">Thùng rác</span>
            </a>
            <hr>
            <a class="mdc-list-item" href="#">
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">settings</i>
                <span class="mdc-list-item__text">Cài đặt</span>
            </a>
        </nav>
    </div>
</aside>