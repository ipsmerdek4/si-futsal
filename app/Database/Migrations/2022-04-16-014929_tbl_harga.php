<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class tbl_harga extends Migration
{
    public function up()
    {
          $this->forge->addField([ 
            'id_harga'           => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ], 
			'booking_time'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '10',
			], 
			'harga'              => [
				'type'           => 'BIGINT',
				'constraint'     => '20',
			],  
			'tgl_pbt_harga'      => [
				'type'           => 'DATETIME',
				'null'       	 => true,
			], 
 
		]);
		$this->forge->addPrimaryKey('id_harga', true); 
        $this->forge->createTable('tbl_harga');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_harga');
    }
}
