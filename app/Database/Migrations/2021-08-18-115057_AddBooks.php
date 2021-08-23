<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddBooks extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false
            ],
            'isbn_no' => [
                'type' => 'INT',
                'constraint' => 10,
                'null' => false
            ],
			'author' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ],
            'created_at datetime default current_timestamp'
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('books');
	}

	public function down()
	{
		$this->forge->dropTable('books');
	}
}
