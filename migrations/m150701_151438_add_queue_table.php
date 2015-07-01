<?php
use yii\db\Schema;
use yii\db\Migration;
class m150701_151438_add_queue_table extends Migration {
	public function up() {
		if ($this->db->schema->getTableSchema ( 'queue', true ) === null) {
			$this->createTable ( 'queue', [ 
					'id' => Schema::TYPE_PK,
					'domain_id' => Schema::TYPE_INTEGER,
					'title' => Schema::TYPE_STRING,
					'admin' => Schema::TYPE_STRING,
					'password' => Schema::TYPE_STRING,
					'email' => Schema::TYPE_STRING 
			] );
			$this->alterColumn ( 'queue', 'id', 'INT(11) UNSIGNED NOT NULL AUTO_INCREMENT' );
		}
	}
	public function down() {
		if ($this->db->schema->getTableSchema ( 'queue', true ) !== null) {
			$this->dropTable ( 'queue' );
		}
	}
}
