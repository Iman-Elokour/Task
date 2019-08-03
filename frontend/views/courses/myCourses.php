<?php
use yii\helpers\Html;

foreach ($courses as $course): ?>
<div class="row">
    <div class="col-sm-4">
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