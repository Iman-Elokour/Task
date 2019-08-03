<?php

use yii\helpers\Html;
use yii\widgets\DetailView;         

/* @var $this yii\web\View */
/* @var $model frontend\models\Courses */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="courses-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('enroll', ['enroll', 'id' => $model->id], ['class' => 'btn btn-primary',
        'data' => [
            'confirm' => 'Are you sure you want to enroll to this course?',
            'method' => 'post',]
            ]) ?>   
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <h1 class="display-2"><?= Html::encode($model->name)?></h1>
    <br><br>
    <div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $model->video?>" allowfullscreen></iframe>
</div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'description',
            'img',
            'video',
        ],
    ]) ?>

</div>
