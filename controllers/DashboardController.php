<?php

namespace app\controllers;

use Yii;
use app\models\Site;
use app\models\forms\SiteForm;
use app\models\search\SiteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/**
 * DashboardController implements the CRUD actions for Site model.
 */
class DashboardController extends Controller {
	public function behaviors() {
		return [ 
				'verbs' => [ 
						'class' => VerbFilter::className (),
						'actions' => [ 
								'delete' => [ 
										'post' 
								],
								'status' => [ 
										'post' 
								],
								'check' => [ 
										'post' 
								] 
						] 
				] 
		];
	}
	
	/**
	 * Lists all Site models.
	 *
	 * @return mixed
	 */
	public function actionIndex() {
		$searchModel = new SiteSearch ();
		$dataProvider = $searchModel->search ( Yii::$app->request->queryParams );
		
		return $this->render ( 'index', [ 
				'searchModel' => $searchModel,
				'dataProvider' => $dataProvider 
		] );
	}
	
	/**
	 * Displays a single Site model.
	 *
	 * @param string $site        	
	 * @return mixed
	 */
	public function actionManage($site) {
		return $this->render ( 'manage', [ 
				'model' => $this->findModel ( $site ) 
		] );
	}
	
	/**
	 * Creates a new Site model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 *
	 * @return mixed
	 */
	public function actionCreate() {
		$model = new SiteForm ();
		
		if (Yii::$app->request->isAjax && $model->load ( Yii::$app->request->post () )) {
			Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			return ActiveForm::validate ( $model );
		}
		
		if ($model->load ( Yii::$app->request->post () ) && $model->create ()) {
			return $this->redirect ( [ 
					'dashboard/index' 
			] );
		} else {
			return $this->render ( 'create', [ 
					'model' => $model 
			] );
		}
	}
	
	/**
	 * Updates an existing Site model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 *
	 * @param string $site        	
	 * @return mixed
	 */
	public function actionUpdate($site) {
		$model = $this->findModel ( $site );
		
		if ($model->load ( Yii::$app->request->post () ) && $model->save ()) {
			return $this->redirect ( [ 
					'view',
					'site' => $model->domain 
			] );
		} else {
			return $this->render ( 'update', [ 
					'model' => $model 
			] );
		}
	}
	
	/**
	 * Deletes an existing Site model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 *
	 * @param string $site        	
	 * @return mixed
	 */
	public function actionDelete($site) {
		$this->findModel ( $site )->delete ();
		
		return $this->redirect ( [ 
				'index' 
		] );
	}
	
	/**
	 * Change status an existing Site model.
	 *
	 * @param string $site        	
	 * @return mixed
	 */
	public function actionStatus($site) {
		$model = $this->findModel ( $site );
		$model->status = $model->status == 1 ? 0 : 1;
		$model->save ();
		return $this->redirect ( [ 
				'index' 
		] );
	}
	
	/**
	 * Check status an existing Site model.
	 *
	 * @param string $site        	
	 * @return mixed
	 */
	public function actionCheck($site) {
		$model = $this->findModel ( $site );
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		return [ 
				'status' => $model->status 
		];
	}
	
	/**
	 * Finds the Site model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 *
	 * @param string $site        	
	 * @return Site the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($site) {
		if (($model = Site::find ()->where ( [ 
				'domain' => $site,
				'user_id' => Yii::$app->user->id 
		] )->one ()) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException ( 'The requested page does not exist.' );
		}
	}
}
