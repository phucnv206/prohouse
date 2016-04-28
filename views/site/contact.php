<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<!--GOOGLE MAPS-->
<div id="map-canvas" style="height: 300px; width: 100%;  border: 1px solid #CCC;"></div>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
    function initialize() {
        var mapDiv = document.getElementById('map-canvas');
        var map = new google.maps.Map(mapDiv, {
            center: new google.maps.LatLng(10.799835, 106.718496),
            zoom: 16,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        var content = '<div><strong style="color:red;">Pro House</strong> <br/>'
                + '0917 187 909</br>'
                + ' info@prohouse.vn</br></div>';

        var infowindow = new google.maps.InfoWindow({
            content: content
        });

        var marker = new google.maps.Marker({
            map: map,
            position: map.getCenter(),
            draggable: true
        });

        google.maps.event.addListener(marker, 'mouseover', function () {
            infowindow.open(map, marker);
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);

</script>
<!--END GOOGLE MAPS-->
<div class="container">
    <div><a>Contact ProHouse</a></div>
    <div class="col-md-4">
        <p>Add: 130/19 Điện Biên Phủ Street, Ward 17, Binh Thanh District, HCM City, Viet Nam</p>
        <p>[E]: <a href="mailto:prohousevietnam@gmail.com">prohousevietnam@gmail.com</a></p>
        <p>[F]: <a href="https://www.facebook.com/prohousevietnam" target="_blank">https://www.facebook.com/prohousevietnam</a></p>
    </div>
    <div class="col-md-8">
        <?php if (Yii::$app->session->hasFlash('success') || Yii::$app->session->hasFlash('error')): ?>
        <p class="text-success text-center"><?=Yii::t('app', 'Message has been sent')?></p>
        <?php else: ?>
        <?php $form = ActiveForm::begin(['id' => 'contact-form']);?>
        <div class="row">
            <div class="col-md-6">
                <?=$form->field($model, 'name', ['template' => '{input}<p>{error}</p>'])
->textInput(['autofocus' => true, 'placeholder' => $model->getAttributeLabel('name')])?>
            </div>
            <div class="col-md-6">
                <?=$form->field($model, 'phone', ['template' => '{input}<p>{error}</p>'])
->textInput(['placeholder' => $model->getAttributeLabel('phone')])?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?=$form->field($model, 'email', ['template' => '{input}<p>{error}</p>'])
->textInput(['autofocus' => true, 'placeholder' => $model->getAttributeLabel('email')])?>
            </div>
            <div class="col-md-6">
                <?=$form->field($model, 'address', ['template' => '{input}<p>{error}</p>'])
->textInput(['placeholder' => $model->getAttributeLabel('address')])?>
            </div>
        </div>

        <?=$form->field($model, 'message', ['template' => '{input}<p>{error}</p>'])
->textArea(['rows' => 6, 'placeholder' => $model->getAttributeLabel('message')])?>

        <div class="form-group">
            <?=Html::submitButton(Yii::t('app', 'Submit'))?>
        </div>

        <?php ActiveForm::end();?>
        <?php endif?>
    </div>
</div>