<?php

namespace app\models\forms;

use Yii;
use yii\base\Model;

/**
 * SiteForm is the model behind the create site form.
 */
class SiteForm extends Model {
	public $name;
	public $email;
	public $subject;
	public $body;
	
	/**
	 *
	 * @return array the validation rules.
	 */
	public function rules() {
		return [ 
				[ 
						[ 
								'name',
								'email',
								'subject',
								'body' 
						],
						'required' 
				],
				[ 
						'email',
						'email' 
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
}
