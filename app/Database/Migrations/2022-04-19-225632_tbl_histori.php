<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class tbl_histori extends Migration
{
    public function up()
    {
        $this->forge->addField([ 
            'id_histori'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ], 
			'kode_transaksi' 		=> [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
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
			'booking_bukti'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],   
			'booking_TOKEN'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '20',
			],   
			'booking_status'       => [
				'type'           => 'INT',
				'constraint'     => '5',
			],     
			'kode_unix'       => [
				'type'           => 'INT',
				'constraint'     => '5',
			],  
			'tgl_pbt_histori' => [
				'type'           => 'DATETIME',
				'null'       	 => true,
			], 
 
		]);
		$this->forge->addPrimaryKey('id_histori', true); 
        $this->forge->createTable('tbl_histori');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_histori');
    }
}
