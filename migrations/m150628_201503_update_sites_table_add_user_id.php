<?php
use yii\db\Schema;
use yii\db\Migration;
class m150628_201503_update_sites_table_add_user_id extends Migration {
	public function up() {
		if ($this->db->schema->getTableSchema ( 'sites', true ) !== null) {
			$this->addColumn ( 'sites', 'user_id', Schema::TYPE_INTEGER . ' after id' );
		}
	}
	public function down() {
		if ($this->db->schema->getTableSchema ( 'sites', true ) !== null) {
			$this->dropColumn ( 'sites', 'user_id' );
		}
	}
}
