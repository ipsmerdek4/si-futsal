<?php 
namespace App\Database\Seeds;

class User extends \CodeIgniter\Database\Seeder{
    public function run(){
        $data = [
            [
                'id_users'          =>  1,
                'username_users'    =>  'admin',
                'password_users'    =>  password_hash('admin', PASSWORD_BCRYPT),
                'level_users'       =>  3,
                'tgl_pbt_users'     =>  date("Y-m-d H:i:s")
            ], 
        ];

        $this->db->table('tbl_user')->insertBatch($data);
    }
}