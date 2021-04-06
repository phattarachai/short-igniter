<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUrlsTable extends Migration
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
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'url_destination' => [
                'type' => 'TEXT',
            ],
            'visit_count' => [
                'type' => 'INT',
                'unsigned' => true,
                'default' => 0,
            ],
            'last_visit_at' => [
                'type' => 'datetime',
                'null' => true
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp',
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('urls', true);
    }

    public function down()
    {
        //
    }
}
