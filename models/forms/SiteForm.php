<?php

namespace app\models\forms;

use Yii;
use yii\base\Model;
use app\models\Site;
use app\models\Queue;

/**
 * SiteForm is the model behind the create site form.
 */
class SiteForm extends Model {
	public $domain;
	public $title;
	public $admin;
	public $password;
	public $email;
	
	/**
	 *
	 * @return array the validation rules.
	 */
	public function rules() {
		return [ 
				[ 
						[ 
								'domain',
								'title',
								'admin',
								'password',
								'email' 
						],
						'required' 
				],
				[ 
						[ 
								'domain' 
						],
						'unique',
						'targetClass' => 'app\models\Site' 
				],
				[ 
						[ 
								'email' 
						],
						'email' 
				],
				[ 
						[ 
								'domain',
								'title',
								'admin',
								'password' 
						],
						'string',
						'max' => 255 
				] 
		];
	}
	
	/**
	 *
	 * @return array customized attribute labels
	 */
	public function attributeLabels() {
		return [ ];
	}
	public function create() {
		$dsn = explode ( '=', Yii::$app->db->dsn );
		if (! $this->validate ())
			return false;
		$model = new Site ();
		$model->attributes = $this->attributes;
		$model->user_id = Yii::$app->user->id;
		$model->DB_NAME = $dsn [2];
		$model->DB_USER = Yii::$app->db->username;
		$model->DB_PASSWORD = Yii::$app->db->password;
		$model->DB_HOST = 'localhost';
		$model->DB_CHARSET = 'utf8';
		$model->DB_COLLATE = null;
		$model->AUTH_KEY = Yii::$app->wordpress->generatePassword ();
		$model->SECURE_AUTH_KEY = Yii::$app->wordpress->generatePassword ();
		$model->LOGGED_IN_KEY = Yii::$app->wordpress->generatePassword ();
		$model->NONCE_KEY = Yii::$app->wordpress->generatePassword ();
		$model->AUTH_SALT = Yii::$app->wordpress->generatePassword ();
		$model->SECURE_AUTH_SALT = Yii::$app->wordpress->generatePassword ();
		$model->LOGGED_IN_SALT = Yii::$app->wordpress->generatePassword ();
		$model->NONCE_SALT = Yii::$app->wordpress->generatePassword ();
		$model->DB_PREFIX = str_replace ( [ 
				'.' 
		], [ ], $this->domain ) . '_';
		$model->WP_DEBUG = null;
		if ($model->save ()) {
			$queue = new Queue ();
			$queue->attributes = [ 
					'domain_id' => $model->id,
					'title' => $this->title,
					'admin' => $this->admin,
					'password' => $this->password,
					'email' => $this->email 
			];
			return $queue->save ();
		}
	}
}
