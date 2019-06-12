<!-- <aside class="demo-drawer mdc-drawer mdc-typography">
  <div class="mdc-drawer__content">
    <nav id="icon-with-text-demo" class="mdc-list">
      <a class="mdc-list-item mdc-list-item--activated" href="<?= Yii::$app->homeUrl ?>" aria-selected="true">
        <i class="material-icons mdc-list-item__graphic" aria-hidden="true">photo</i>Ảnh
      </a>
      <a class="mdc-list-item" href="<?= Yii::$app->homeUrl."albums" ?>">
        <i class="material-icons mdc-list-item__graphic" aria-hidden="true">collections_bookmark</i>Album
      </a>
      <a class="mdc-list-item" href="<?= Yii::$app->homeUrl."sharing" ?>">
        <i class="material-icons mdc-list-item__graphic" aria-hidden="true">group</i>Chia sẻ
      </a>
    </nav>
  </div>
</aside> -->
<div class="demo-drawer">
    <div class="menu-item ">
        <button class="mdc-fab" aria-label="Favorite" onclick="location.href='<?= Yii::$app->homeUrl ?>';">
            <span class="mdc-fab__icon material-icons">photo</span>
        </button>
    </div>
    <div class="menu-item">
        <button class="mdc-fab" aria-label="Favorite" onclick="location.href='<?= Yii::$app->homeUrl."site/albums" ?>';">
            <span class="mdc-fab__icon material-icons">collections_bookmark</span>
        </button>
    </div>
    <div class="menu-item">
        <button class="mdc-fab" aria-label="Favorite" onclick="location.href='<?= Yii::$app->homeUrl."sharing" ?>';">
            <span class="mdc-fab__icon material-icons">group</span>
        </button>
    </div>
</div>
<script>

</script>