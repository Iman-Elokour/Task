<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Courses;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use frontend\models\UserCourses;

/**
 * CoursesController implements the CRUD actions for Courses model.
 */
class CoursesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Courses models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Courses::find(),
        ]);
        $query = Courses::find();
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $courses = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'courses' => $courses,
            'pagination' => $pagination,
        ]);
    }

    /**
     * Displays a single Courses model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (Yii::$app->user->isGuest) {
            $this->redirect(Yii::$app->urlManager->createUrl(['site/signup']));
        } else {
            return $this->render('view', [
            'model' => $this->findModel($id),
            
        ]);
        }
    }


    /**
     * Finds the Courses model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Courses the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Courses::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /*Adds course to myCourses*/

    public function actionEnroll($id)
    {
        $user = Yii::$app->user->identity;
        $course =  $this->findModel($id);
        $course->link('users', $user);
        Yii::$app->session->setFlash('success', "You have been enrolled.");
        return $this->redirect(['view', 'id' => $id]);
    }

    /*Displays courses in myCourses*/

    public function actionMyCourses()
    {
        $courses = Yii::$app->user->identity->courses;
        return $this->render('myCourses', ['courses' => $courses]);
    }
}
