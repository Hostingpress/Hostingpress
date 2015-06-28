<?php
use yii\db\Schema;
use yii\db\Migration;
class m150628_200121_create_security_table extends Migration {
	public function up() {
		if ($this->db->schema->getTableSchema ( 'security', true ) === null) {
			$this->createTable ( 'security', [ 
					'id' => Schema::TYPE_PK,
					'domain_id' => Schema::TYPE_INTEGER,
					'user' => Schema::TYPE_STRING,
					'password' => Schema::TYPE_STRING 
			] );
			$this->alterColumn ( 'security', 'id', 'INT(11) UNSIGNED NOT NULL AUTO_INCREMENT' );
			$this->alterColumn ( 'security', 'domain_id', 'INT(11) UNSIGNED NOT NULL' );
			$this->createIndex ( 'domain_id', 'security', 'domain_id' );
			$this->addForeignKey ( 'FK_Security_Sites', 'security', 'domain_id', 'sites', 'id', 'CASCADE', 'RESTRICT' );
		}
	}
	public function down() {
		if ($this->db->schema->getTableSchema ( 'security', true ) !== null) {
			$this->dropTable ( 'security' );
		}
	}
}
