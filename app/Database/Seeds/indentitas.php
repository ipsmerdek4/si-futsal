<?php 
namespace App\Database\Seeds;

class Indentitas extends \CodeIgniter\Database\Seeder{
    public function run(){
        $data = [
            [
                'id_users'              => 1,
                'firstname'             => 'admin',
                'lastname'              => '',
                'email'                 => '',
                'hp'                    => '',
                'tim'                   => 'ADMIN FC',
                'alamat'                => '',
                'provinsi_id'           => '51',
                'kabupaten_id'          => '5103',
                'kecamatan_id'          => '5103010',
                'desa_id'               => '5103010004',
                'gambar'                => '',
                'tgl_pbt_identitas'     =>  date("Y-m-d H:i:s")
            ], 
        ];

        $this->db->table('tbl_identitas')->insertBatch($data);
    }
}