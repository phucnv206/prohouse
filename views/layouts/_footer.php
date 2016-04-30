<?php
use yii\helpers\Url;
?>
<footer>
    <div class="container" style="padding: 5px;">
        <div class="clearfix text-center">
            <div class="pull-left" style="line-height: 35px;">
                <a title="Copyright" style=" color:white">Copyrights © 2016 Prohouse. All Rights Reserved</a>
            </div>
            <div class="pull-right">
                <span style="color:white">Hotline: 0917 187 909 - Email: prohousevietnam@gmail.com
                    <img src="/Content/new_images/gplus.png" />
                    <a href="https://www.facebook.com/prohousevietnam" target="_blank"><img src="/Content/new_images/fb.png" /></a>
                </span>
                <a href="<?=Url::to(['site/location', 'lang' => 'en'])?>"><img src="/Content/new_images/us.png" height="20" /></a>
                <a href="<?=Url::to(['site/location', 'lang' => 'vi'])?>"><img src="/Content/new_images/vn.png" height="20" /></a>
            </div>
        </div>
    </div>
</footer>
