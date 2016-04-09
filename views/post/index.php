<div class="container">
    <div class="breadcrumb">
        <p>
            <a href="/">Home</a> >
            <?= $model->details[0]->title ?>
        </p>
    </div>
    <div class="clearfix">
        <h3 class="pull-left"><?= $model->details[0]->title ?></h3>
        <em class="pull-right"><?= date('d/m/Y', $model->modified) ?></em>
    </div>
    <div class="text-justify responsive-content">
        <?= $model->details[0]->content ?>
    </div>
    
</div>