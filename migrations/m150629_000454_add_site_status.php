<?php
use yii\db\Schema;
use yii\db\Migration;
class m150629_000454_add_site_status extends Migration {
	public function up() {
		if ($this->db->schema->getTableSchema ( 'site', true ) !== null) {
			$this->addColumn ( 'site', 'status', Schema::TYPE_BOOLEAN . ' not null default 1' );
		}
	}
	public function down() {
		if ($this->db->schema->getTableSchema ( 'site', true ) !== null) {
			$this->dropColumn ( 'site', 'status' );
		}
	}
}
