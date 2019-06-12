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
    * {box-sizing: border-box;}

    .container {
        position: relative;

    }

    .image {
        display: block;
        width: 100%;
        height: auto;
        border-radius:5%;
        -moz-border-radius:5%;
        -webkit-border-radius:5%;
    }
   * {box-sizing: border-box;}

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
        background: rgba(0, 0, 0, 0);
        color: #f1f1f1;
        width: 100%;
        transition: .5s ease;
        opacity:0;
        color: white;
        font-size: 20px;
        padding: 1%;
        text-align: right;
    }

    .container:hover .overlay {
        opacity: 1;
    }  
</style>
<!--style="overflow-x: hidden;"-->
<body >
<span class="mdc-typography mdc-typography--heading6" style="padding-left: 10px;color: blue"><b>ALBUM</b></span>
<div class="row">
    <div class="column">
        <a href="#" style="text-decoration: none;color: black">
            <img src="<?php echo Yii::$app->homeUrl."frontend/web/uploads/add.png"?>" class="image">
            <span class="mdc-typography--subtitle2"><b>Tạo album</b></span>
        </a>
    </div>
    <?php
    foreach ($albums as $key =>$value) {
        ?>
        <div class="column " style="padding: 5px">
            <a href="#" style="text-decoration: none;color: black;">
                <div class="container">
                    <img src="<?php echo Yii::$app->homeUrl."frontend/web/uploads/5aeb1f62f6cd496dc81c07d58b82f143.jpg"?>" class="image">
                    <div class="overlay">
                        <a class="material-icons mdc-top-app-bar__action-item" aria-label="User" onclick="myFunctionAlbum()">more_vert</a>
                    </div>
                </div>
                <span class="mdc-typography--subtitle2"><b><?php echo $value["title"];?></b></span>
            </a>
            
        </div>
        <?php
    }
    ?>
</div>

<!-- menu album -->
<div class="mdc-menu mdc-menu-album mdc-menu-surface">
    <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1">
        <li class="mdc-list-item" role="menuitem">
            <span class="mdc-list-item__text">Đổi tên album</span>
        </li>
        <li class="mdc-list-item" role="menuitem">
            <span class="mdc-list-item__text">Xóa album</span>
        </li>
    </ul>
</div>
<script>
    const MDCMenu = mdc.menu.MDCMenu;
    const menualbum = new MDCMenu(document.querySelector('.mdc-menu-album'));
    menualbum.open = false;
    menualbum.setAbsolutePosition(1330, 50);
    function myFunctionAlbum(){
        menualbum.open = !menualbum.open;
    }
</script>
</body>