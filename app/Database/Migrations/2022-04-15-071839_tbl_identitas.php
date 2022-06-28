<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class tbl_identitas extends Migration
{
    public function up()
    {
        $this->forge->addField([ 
            'id_identitas'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ], 
			'id_users'               => [
				'type'           => 'INT',
				'constraint'     => '5',
			], 
			'firstname'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			], 
			'lastname'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '20', 
			],  
			'email'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100', 
			],  
			'hp'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '15', 
			],  
			'tim'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '15', 
			],   
			'alamat'       => [
                'type'           => 'TEXT', 
			],  
			'provinsi_name'       => [
                'type'           => 'VARCHAR', 
                'constraint'     => '100', 
			],  
			'kabupaten_name'       => [
                'type'           => 'VARCHAR', 
                'constraint'     => '100', 
			],  
			'kecamatan_name'       => [
                'type'           => 'VARCHAR', 
                'constraint'     => '100', 
			],  
			'desa_name'       => [
                'type'           => 'VARCHAR', 
                'constraint'     => '100', 
			],  
			'gambar'       => [
                'type'           => 'TEXT',  
			],  
			'tgl_pbt_identitas' => [
				'type'           => 'DATETIME',
				'null'       	 => true,
			], 
 
		]);
		$this->forge->addPrimaryKey('id_identitas', true); 
        $this->forge->createTable('tbl_identitas');
    }

    public function down()
    {
         $this->forge->dropTable('tbl_identitas');
    }
}
