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
                'provinsi_name'         => 'Bali',
                'kabupaten_name'        => 'Denpasar',
                'kecamatan_name'        => 'Denpasar Barat',
                'desa_name'             => 'Pemecutan Klod',
                'gambar'                => '',
                'tgl_pbt_identitas'     =>  date("Y-m-d H:i:s")
            ], 
        ];

        $this->db->table('tbl_identitas')->insertBatch($data);
    }
}