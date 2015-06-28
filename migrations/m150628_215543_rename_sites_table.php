<?php
use yii\db\Schema;
use yii\db\Migration;
class m150628_215543_rename_sites_table extends Migration {
	public function up() {
		if ($this->db->schema->getTableSchema ( 'sites', true ) !== null) {
			$this->renameTable ( 'sites', 'site' );
		}
	}
	public function down() {
		echo "m150628_215543_rename_sites_table cannot be reverted.\n";
		return false;
	}
}
