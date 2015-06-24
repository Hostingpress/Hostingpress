<?php

namespace app\components;

use Yii;
use yii\base\Component;
use app\models\Sites;

class Wordpress extends Component {
	public function init() {
	}
	public function check() {
		return Sites::find ()->where ( [ 
				'domain' => Yii::$app->getRequest ()->serverName 
		] )->one ();
	}
	public function notFound() {
		die ( 'Site not found' );
	}
}