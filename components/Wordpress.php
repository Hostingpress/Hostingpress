<?php

namespace app\components;

use Yii;
use yii\base\Component;
use app\models\Site;
use app\components\Wordpress\WordpressCommon;
use app\components\Wordpress\WordpressFront;
use app\components\Wordpress\WordpressAdmin;

class Wordpress extends Component {
	public function init() {
	}
	/**
	 *
	 * @param boolean $active        	
	 * @return Ambigous <\yii\db\ActiveRecord, multitype:, NULL>|boolean
	 */
	public function check($active = true) {
		$args = [ 
				'domain' => Yii::$app->getRequest ()->serverName 
		];
		if ($active)
			$args ['status'] = 'active';
		if ($site = Site::find ()->where ( $args )->one ()) {
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