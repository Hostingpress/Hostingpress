<?php
use yii\db\Schema;
use yii\db\Migration;
class m150701_085354_change_site_status extends Migration {
	public function up() {
		if ($this->db->schema->getTableSchema ( 'site', true ) !== null) {
			$this->alterColumn ( 'site', 'status', "ENUM('new','active','suspended','deleted') NOT NULL DEFAULT 'new'" );
		}
	}
	public function down() {
		echo "m150701_085354_change_site_status cannot be reverted.\n";
		return false;
	}
}
