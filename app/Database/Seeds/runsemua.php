<?php 
namespace App\Database\Seeds;

class Runsemua extends \CodeIgniter\Database\Seeder{
    public function run(){
        $this->call('harga');
        $this->call('user');
        $this->call('indentitas');
        $this->call('desa');
        $this->call('kabupaten');
        $this->call('kecamatan');
        $this->call('provinsi');
    }
}