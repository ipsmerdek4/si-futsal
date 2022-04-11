<?php 
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tbl_user extends Migration{
    public function up(){

        $this->forge->addField([ 
            'id_users'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ], 
			'username_users'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '20',
			], 
			'password_users'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			], 
			'level_users'       => [
                'type'           => 'INT',
                'constraint'     => 5, 
			],  
			'tgl_pbt_users' => [
				'type'           => 'DATETIME',
				'null'       	 => true,
			], 
 
		]);
		$this->forge->addPrimaryKey('id_users', true); 
        $this->forge->createTable('tbl_user');
    }

    public function down(){
        $this->forge->dropTable('tbl_user');
    }
}