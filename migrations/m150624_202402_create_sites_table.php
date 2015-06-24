<?php
use yii\db\Schema;
use yii\db\Migration;
class m150624_202402_create_sites_table extends Migration {
	public function up() {
		if ($this->db->schema->getTableSchema ( 'sites', true ) === null) {
			$this->createTable ( 'sites', [ 
					'id' => Schema::TYPE_PK,
					'domain' => Schema::TYPE_STRING,
					'DB_NAME' => Schema::TYPE_STRING,
					'DB_USER' => Schema::TYPE_STRING,
					'DB_PASSWORD' => Schema::TYPE_STRING,
					'DB_HOST' => Schema::TYPE_STRING,
					'DB_CHARSET' => Schema::TYPE_STRING,
					'DB_COLLATE' => Schema::TYPE_STRING,
					'AUTH_KEY' => Schema::TYPE_STRING,
					'SECURE_AUTH_KEY' => Schema::TYPE_STRING,
					'LOGGED_IN_KEY' => Schema::TYPE_STRING,
					'NONCE_KEY' => Schema::TYPE_STRING,
					'AUTH_SALT' => Schema::TYPE_STRING,
					'SECURE_AUTH_SALT' => Schema::TYPE_STRING,
					'LOGGED_IN_SALT' => Schema::TYPE_STRING,
					'NONCE_SALT' => Schema::TYPE_STRING,
					'DB_PREFIX' => Schema::TYPE_STRING,
					'WP_DEBUG' => Schema::TYPE_STRING 
			] );
			$this->alterColumn ( 'sites', 'id', 'INT(11) UNSIGNED NOT NULL AUTO_INCREMENT' );
		}
	}
	public function down() {
		if ($this->db->schema->getTableSchema ( 'sites', true ) !== null) {
			$this->dropTable ( 'sites' );
		}
	}
}
