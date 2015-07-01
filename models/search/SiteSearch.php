<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Site;

/**
 * SiteSearch represents the model behind the search form about `app\models\Site`.
 */
class SiteSearch extends Site {
	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [ 
				[ 
						[ 
								'id',
								'user_id' 
						],
						'integer' 
				],
				[ 
						[ 
								'domain',
								'DB_NAME',
								'DB_USER',
								'DB_PASSWORD',
								'DB_HOST',
								'DB_CHARSET',
								'DB_COLLATE',
								'AUTH_KEY',
								'SECURE_AUTH_KEY',
								'LOGGED_IN_KEY',
								'NONCE_KEY',
								'AUTH_SALT',
								'SECURE_AUTH_SALT',
								'LOGGED_IN_SALT',
								'NONCE_SALT',
								'DB_PREFIX',
								'WP_DEBUG' 
						],
						'safe' 
				] 
		];
	}
	
	/**
	 * @inheritdoc
	 */
	public function scenarios() {
		// bypass scenarios() implementation in the parent class
		return Model::scenarios ();
	}
	
	/**
	 * Creates data provider instance with search query applied
	 *
	 * @param array $params        	
	 *
	 * @return ActiveDataProvider
	 */
	public function search($params) {
		$query = Site::find ()->where ( [ 
				'user_id' => Yii::$app->user->id 
		] );
		
		$dataProvider = new ActiveDataProvider ( [ 
				'query' => $query,
				'pagination' => [ 
						'pageSize' => 50 
				] 
		] );
		
		$this->load ( $params );
		
		if (! $this->validate ()) {
			// uncomment the following line if you do not want to return any records when validation fails
			// $query->where('0=1');
			return $dataProvider;
		}
		
		$query->andFilterWhere ( [ 
				'id' => $this->id,
				'user_id' => $this->user_id 
		] );
		
		$query->andFilterWhere ( [ 
				'like',
				'domain',
				$this->domain 
		] );
		
		return $dataProvider;
	}
}
