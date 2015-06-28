<?php

namespace app\components;

use Yii;
use yii\base\Component;
use app\models\Site;

class Wordpress extends Component {
	public function init() {
	}
	public function check() {
		if ($site = Site::find ()->where ( [ 
				'domain' => Yii::$app->getRequest ()->serverName 
		] )->one ()) {
			$this->_checkAccess ( $site );
			return $site;
		}
		return false;
	}
	protected function _checkAccess(Site $site) {
	}
	public function generatePassword($passwordLength = 64, $specialChars = true, $extraSpecialChars = true) {
		$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		if ($specialChars)
			$chars .= '!@#$%^&*()';
		if ($extraSpecialChars)
			$chars .= '-_ []{}<>~`+=,.;:/?|';
		$password = '';
		$length = strlen ( $chars ) - 1;
		for($i = 0; $i < $passwordLength; $i ++) {
			$password .= substr ( $chars, rand ( 0, $length ), 1 );
		}
		return $password;
	}
	public function notFound() {
		die ( 'Site not found' );
	}
}