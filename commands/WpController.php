<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use app\models\Queue;
use app\models\Site;

class WpController extends Controller {
	protected $_cli;
	protected $_path;
	protected $_output;
	protected $_return;
	public function init() {
		$this->_cli = Yii::$app->params ['wordpressPath'] . DS . 'vendor' . DS . 'wp-cli' . DS . 'wp-cli' . DS . 'bin' . DS . 'wp';
		$this->_path = Yii::$app->params ['wordpressPath'] . DS . 'web';
	}
	public function actionIndex() {
	}
	public function actionInstall() {
		if ($install = Queue::find ()->one ()) {
			$site = Site::findOne ( [ 
					'id' => $install->domain_id 
			] );
			if ($this->_install ( $site->domain, $install->title, $install->admin, $install->password, $install->email )) {
				$install->delete ();
				$site->status = 'active';
				$site->save ();
			}
		}
	}
	protected function _version() {
		$url = 'test.wemakewp.com';
		return $this->_execute ( 'core version', [ 
				'--url="' . $url . '"' 
		] );
	}
	protected function _install($url, $title, $admin_user, $admin_password, $admin_email) {
		return $this->_execute ( 'core install', [ 
				'--url="' . $url . '"',
				'--title="' . $title . '"',
				'--admin_user="' . $admin_user . '"',
				'--admin_password="' . $admin_password . '"',
				'--admin_email="' . $admin_email . '"' 
		] );
	}
	protected function _execute($command, $args = []) {
		echo $this->_cli . ' ' . $command . ' ' . implode ( ' ', array_merge ( [ 
				'--path="' . $this->_path . '"' 
		], $args ) ) . PHP_EOL;
		exec ( $this->_cli . ' ' . $command . ' ' . implode ( ' ', array_merge ( [ 
				'--path="' . $this->_path . '"' 
		], $args ) ), $this->_output, $this->_return );
		return $this->_return == 0 ? true : false;
	}
}
