<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class tbl_transaksi extends Migration
{
    public function up()
    {
          $this->forge->addField([ 
            'id_transaksi'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ], 
			'id_identitas'         => [
				'type'           => 'INT',
				'constraint'     => '5',
			],     
			'tgl_booking_lapangan'       => [
				'type'           => 'DATE',
            ],   
			'booking_lapangan'       => [
				'type'           => 'INT',
				'constraint'     => '5',
			], 
			'booking_start'       => [
				'type'           => 'TIME', 
			],  
			'booking_play'       => [
				'type'           => 'INT',
				'constraint'     => '5',
			], 
			'total_harga'       => [
				'type'           => 'BIGINT',
				'constraint'     => '12',
			],  
			'booking_status'       => [
				'type'           => 'INT',
				'constraint'     => '5',
			],   
			'tgl_pbt_transaksi' => [
				'type'           => 'DATETIME',
				'null'       	 => true,
			], 
 
		]);
		$this->forge->addPrimaryKey('id_transaksi', true); 
        $this->forge->createTable('tbl_transaksi');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_transaksi');
    }
}
