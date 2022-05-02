<?php 
namespace App\Database\Seeds;

class Provinsi extends \CodeIgniter\Database\Seeder{
    public function run(){
        $data = [
            [
            "id" => "11",
            "nm_provinsi" => "Aceh",
            ],
            [
            "id" => "12",
            "nm_provinsi" => "Sumatera Utara",
            ],
            [
            "id" => "13",
            "nm_provinsi" => "Sumatera Barat",
            ],
            [
            "id" => "14",
            "nm_provinsi" => "Riau",
            ],
            [
            "id" => "15",
            "nm_provinsi" => "Jambi",
            ],
            [
            "id" => "16",
            "nm_provinsi" => "Sumatera Selatan",
            ],
            [
            "id" => "17",
            "nm_provinsi" => "Bengkulu",
            ],
            [
            "id" => "18",
            "nm_provinsi" => "Lampung",
            ],
            [
            "id" => "19",
            "nm_provinsi" => "Kepulauan Bangka Belitung",
            ],
            [
            "id" => "21",
            "nm_provinsi" => "Kepulauan Riau",
            ],
            [
            "id" => "31",
            "nm_provinsi" => "Dki Jakarta",
            ],
            [
            "id" => "32",
            "nm_provinsi" => "Jawa Barat",
            ],
            [
            "id" => "33",
            "nm_provinsi" => "Jawa Tengah",
            ],
            [
            "id" => "34",
            "nm_provinsi" => "Di Yogyakarta",
            ],
            [
            "id" => "35",
            "nm_provinsi" => "Jawa Timur",
            ],
            [
            "id" => "36",
            "nm_provinsi" => "Banten",
            ],
            [
            "id" => "51",
            "nm_provinsi" => "Bali",
            ],
            [
            "id" => "52",
            "nm_provinsi" => "Nusa Tenggara Barat",
            ],
            [
            "id" => "53",
            "nm_provinsi" => "Nusa Tenggara Timur",
            ],
            [
            "id" => "61",
            "nm_provinsi" => "Kalimantan Barat",
            ],
            [
            "id" => "62",
            "nm_provinsi" => "Kalimantan Tengah",
            ],
            [
            "id" => "63",
            "nm_provinsi" => "Kalimantan Selatan",
            ],
            [
            "id" => "64",
            "nm_provinsi" => "Kalimantan Timur",
            ],
            [
            "id" => "65",
            "nm_provinsi" => "Kalimantan Utara",
            ],
            [
            "id" => "71",
            "nm_provinsi" => "Sulawesi Utara",
            ],
            [
            "id" => "72",
            "nm_provinsi" => "Sulawesi Tengah",
            ],
            [
            "id" => "73",
            "nm_provinsi" => "Sulawesi Selatan",
            ],
            [
            "id" => "74",
            "nm_provinsi" => "Sulawesi Tenggara",
            ],
            [
            "id" => "75",
            "nm_provinsi" => "Gorontalo",
            ],
            [
            "id" => "76",
            "nm_provinsi" => "Sulawesi Barat",
            ],
            [
            "id" => "81",
            "nm_provinsi" => "Maluku",
            ],
            [
            "id" => "82",
            "nm_provinsi" => "Maluku Utara",
            ],
            [
            "id" => "91",
            "nm_provinsi" => "Papua Barat",
            ],
            [
            "id" => "94",
            "nm_provinsi" => "Papua",
            ],



        ];

        $this->db->table('wilayah_provinsi')->insertBatch($data);
    }
}