<?php

namespace backend\controllers;

use app\models\Category;
use Yii;
use app\models\Product;
use app\models\ProductSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
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
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        //$time = date('Y-m-d');
        $date = date('Y-m-d H:i:s');
        $model->date_create = $date;
        $model->date_update = $date;


//        echo '<pre>';
//        print_r($date);
//        die();

        //lấy dữ liệu từ category truyền vào cate_id trong product
        $data = new Category();
        $dataCate = ArrayHelper::map($data->getAllCate(),'cate_id','cate_name');

        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            $image = UploadedFile::getInstance($model,'pro_image');
            $proId = $model->pro_id;
            $imgName = 'pro_'.$proId.'.'.$image->getExtension();
            $image->saveAs(Yii::getAlias('@productImgPath').'/'.$imgName);
            $model->pro_image = $imgName;
            $model->save();

            return $this->redirect(['view', 'id' => $model->pro_id]);
        }

        return $this->render('create', [
            'model' => $model,
            'dataCate'=>$dataCate,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        //$time = date('Y-m-d');
        $date = date('Y-m-d H:i:s');
        $model->date_create = $date;
        $model->date_update = $date;
        //lấy dữ liệu từ category truyền vào cate_id trong product
        $data = new Category();
        $dataCate = ArrayHelper::map($data->getAllCate(),'cate_id','cate_name');

        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            $image = UploadedFile::getInstance($model,'pro_image');
            $proId = $model->pro_id;
            $imgName = 'pro_'.$proId.'.'.$image->getExtension();
            $image->saveAs(Yii::getAlias('@productImgPath').'/'.$imgName);
            $model->pro_image = $imgName;
            $model->save();
            return $this->redirect(['view', 'id' => $model->pro_id]);
        }

        return $this->render('update', [
            'model' => $model,
            'dataCate'=>$dataCate
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
