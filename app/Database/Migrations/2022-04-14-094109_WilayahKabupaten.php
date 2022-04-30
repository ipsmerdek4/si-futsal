<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class WilayahKabupaten extends Migration
{
    public function up()
    {
        $this->forge->addField([ 
			'id'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '8',
			], 
			'provinsi_id'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '5',
			], 
			'nm_kabupaten'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '30',
			], 
 
		]);
		$this->forge->addPrimaryKey('id', true);
		$this->forge->createTable('wilayah_kabupaten');
    }

    public function down()
    {
        $this->forge->dropTable('wilayah_kabupaten'); 
    }
}
