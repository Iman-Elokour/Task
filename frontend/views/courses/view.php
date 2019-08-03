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
        <?= Html::a('Enroll', ['enroll', 'id' => $model->id], ['class' => 'btn btn-primary',
        'data' => [
            'confirm' => 'Are you sure you want to enroll to this course?',
            'method' => 'post',]
            ]) ?>   
    </p>

    <br><br>
    
    <div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $model->video?>" allowfullscreen></iframe>
</div>

    <h2><?= Html::encode($model->description) ?></h2>

</div>
