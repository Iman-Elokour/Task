<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Courses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="courses-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Courses', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
 
    <?php foreach ($courses as $course): ?>
      <div class="row">
    <div class="col-lg-4">
    <div class="card" style="width: 18rem;">
     <img src="<?php echo $course->img ?>" width="200px" height="100px" class="card-img-top"/> 
     <div class="card-body">
    <h3 class="card-title" align="center"><?= Html::encode($course->name)?></h3>
    <p class="card-text" ><?= Html::encode($course->description)?></p>
    <?= Html::a('View', ['view', 'id' => $course->id], ['class' => 'btn btn-primary'])  ?>
  </div>
</div>
</div>
<?php endforeach; ?>
</div>
<?= LinkPager::widget(['pagination' => $pagination]) ?>
    


</div>
