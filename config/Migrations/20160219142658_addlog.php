<?php

use Phinx\Migration\AbstractMigration;

class AddLog extends AbstractMigration {

	public function change() {
		$table = $this->table('queued_tasks');
		$table->addColumn('log', 'text', [
			'default' => null,
			'null' => true,
		])->update();
	}
}
