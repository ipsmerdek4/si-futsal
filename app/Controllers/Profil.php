<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\IdentitasModel;  
use App\Models\UsersModel;  
use App\Models\ProvinsiModel;   
use App\Models\DesaModel;  
use App\Models\KabupatenModel;  
use App\Models\KecamatanModel;  

class Profil extends Controller{


    public function index()
    { 
   
        if(session()->get('level') == 1)
        {
            $Identitas = new IdentitasModel();
            $Users = new UsersModel();
            $Provinsis = new ProvinsiModel();
            $Kabupaten = new KabupatenModel();
            $Kecamatan = new KecamatanModel();
            $Desa = new DesaModel();

            $getidentitas = $Identitas->join_profil_a(session()->get('ID'));
            $dataProvinsis = $Provinsis->findAll();
            $dataKabupaten = $Kabupaten->where([
                                        'provinsi_id' => $getidentitas[0]->provinsi_id,
                                    ])->findAll(); 
            $dataKecamatan = $Kecamatan->where([
                                        'kabupaten_id' => $getidentitas[0]->kabupaten_id,
                                    ])->findAll(); 
            $datadesa = $Desa->where([
                                        'kecamatan_id' => $getidentitas[0]->kecamatan_id,
                                    ])->findAll(); 


            $data = array(
                'menu'          => '1z',
                'title'         => 'profil [SI-Futsal]', 
                'dtlv'          => session()->get('level'),
                'unm'           => session()->get('username'), 
                'getidentitas'  => $getidentitas,
                'dataProvinsis' => $dataProvinsis, 
                'dataKabupaten' => $dataKabupaten,
                'dataKecamatan' => $dataKecamatan,
                'datadesa'      => $datadesa,
            );


            echo view('extent/header', $data);
            echo view('v_profil', $data);
            echo view('extent/footer', $data);

        }          
    }


    public function edit_profil_P()
    {   
        if(session()->get('level') == 1)
        {
 
             if (!$this->validate([
                'gambarnya' => [
                    'rules' =>  'is_image[gambarnya]'
                                .'|mime_in[gambarnya,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                                .'|max_size[gambarnya,5000]' ,  
                    'errors' => [  
                        'is_image' => 'File harus berformat Gambar.',
                        'mime_in' => 'File yang di izinkan image/jpg, image/jpeg,image/gif,image/png, image/webp.',   
                        'max_size' => 'Ukuran File Paling besar 1Mb.',    
                        'max_dims' => 'Ukuran Gambar Max 800x800.',   
                    ]
                ], 
                'firstname' => [
                    'rules' => 'required|min_length[5]|max_length[100] ',
                    'errors' => [
                        'required'   => 'Nama Lengkap Harus diisi.',
                        'min_length' => 'Nama Lengkap Minimal 5 Karakter.',
                        'max_length' => 'Nama Lengkap Maksimal 100 Karakter.',   
                    ]
                ], 
                'lastname' => [
                    'rules' => 'required|min_length[2]|max_length[20] ',
                    'errors' => [
                        'required'   => 'Nama Panggilan Harus diisi.',
                        'min_length' => 'Nama Panggilan Minimal 2 Karakter.',
                        'max_length' => 'Nama Panggilan Maksimal 20 Karakter.',   
                    ]
                ], 
                'email' => [
                    'rules' => 'required|min_length[5]|max_length[100] ',
                    'errors' => [
                        'required'   => 'Email Harus diisi.',
                        'min_length' => 'Nama Panggilan Minimal 5 Karakter.',
                        'max_length' => 'Nama Panggilan Maksimal 100 Karakter.',   
                    ]
                ], 
                'hp' => [
                    'rules' => 'required|min_length[9]|max_length[15] ',
                    'errors' => [
                        'required'   => 'Nomer HP/Wa Harus diisi.',
                        'min_length' => 'Nomer HP/Wa Minimal 9 Karakter.',
                        'max_length' => 'Nomer HP/Wa Maksimal 15 Karakter.',   
                    ]
                ],   
                'username' => [
                    'rules' => 'required|min_length[3]|max_length[15] ',
                    'errors' => [
                        'required'   => 'Username Harus diisi.',
                        'min_length' => 'Username Minimal 3 Karakter.',
                        'max_length' => 'Username Maksimal 15 Karakter.',   
                    ]
                ], 
                
                'alamat' => [
                    'rules' => 'required|min_length[6]',
                    'errors' => [
                        'required'   => 'Alamat Harus diisi.',
                        'min_length' => 'Alamat Minimal 6 Karakter.',  
                    ]
                ], 
                'provinsi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Provinsi Harus di Pilih.',   
                    ]
                ], 
                'kabupaten' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Kabupaten Harus di Pilih.',   
                    ]
                ], 
                'kecamatan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Kecamatan Harus di Pilih.',   
                    ]
                ], 
                'desa' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Desa Harus di Pilih.',   
                    ]
                ], 
            ])) {
                session()->setFlashdata('pesan_profil', $this->validator->listErrors());
                return redirect()->to(base_url('/profil'))->withInput(); 
            }  

            $check = $this->request->getVar('checkbox');
            $sendcheckboxdata = 0;
            if (isset($check)) {
                if (!$this->validate([
                    'password' => [
                        'rules' => 'required|min_length[3]|max_length[15] ',
                        'errors' => [
                            'required'   => 'Password Harus diisi.',
                            'min_length' => 'Password Minimal 3 Karakter.',
                            'max_length' => 'Password Maksimal 15 Karakter.',   
                        ]
                    ],  
                ])) {
                    session()->setFlashdata('pesan_profil', $this->validator->listErrors());
                    return redirect()->to(base_url('/profil'))->withInput(); 
                }   
                $sendcheckboxdata = 1; 
            }else{ 
                $sendcheckboxdata = 0; 
            }


            $Users = new UsersModel();
            $Identitas = new IdentitasModel();


            $id_users = $this->request->getVar('profil');
            
            $dataIdentitas = $Identitas->where([
                                                'id_users' => $id_users, 
                                            ])->findAll();    
 
            if ($img = $this->request->getFile('gambarnya')) { 
                if ($img->isValid() && ! $img->hasMoved())
                {
                    $newName = $img->getRandomName();
                    $img->move('uploads/', $newName);     
                }  else{
                    $newName = "";             
                }
            }


            
            if ($sendcheckboxdata == 0) { 
                $dataUsersup = [ 
                    'username_users'    => $this->request->getVar('username'),
                    'level_users'       => 1,  
                ];   
                
                if ($newName == "") {
                    $dataIdentitasup = [  
                        'id_users' => $id_users,
                        'firstname' => $this->request->getVar('firstname'),
                        'lastname' => $this->request->getVar('lastname'),
                        'email' => $this->request->getVar('email'),
                        'hp' => $this->request->getVar('hp'),
                        'tim' => $this->request->getVar('tim'),
                        'alamat' => $this->request->getVar('alamat'),
                        'provinsi_id' => $this->request->getVar('provinsi'),
                        'kabupaten_id' => $this->request->getVar('kabupaten'),
                        'kecamatan_id' => $this->request->getVar('kecamatan'),
                        'desa_id' => $this->request->getVar('desa'),  
                    ]; 
                }else{ 
                    @unlink("uploads/".$dataIdentitas[0]->gambar);
                    $dataIdentitasup = [ 
                        'gambar' => $newName,
                        'id_users' => $id_users,
                        'firstname' => $this->request->getVar('firstname'),
                        'lastname' => $this->request->getVar('lastname'),
                        'email' => $this->request->getVar('email'),
                        'hp' => $this->request->getVar('hp'),
                        'tim' => $this->request->getVar('tim'),
                        'alamat' => $this->request->getVar('alamat'),
                        'provinsi_id' => $this->request->getVar('provinsi'),
                        'kabupaten_id' => $this->request->getVar('kabupaten'),
                        'kecamatan_id' => $this->request->getVar('kecamatan'),
                        'desa_id' => $this->request->getVar('desa'),  
                    ];  
                } 

            }elseif ($sendcheckboxdata == 1) {  
                $dataUsersup = [ 
                    'username_users'    => $this->request->getVar('username'),
                    'password_users'    => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT), 
                    'level_users'       => 1,  
                ];   
                
                if ($newName == "") {
                    $dataIdentitasup = [  
                        'id_users' => $id_users,
                        'firstname' => $this->request->getVar('firstname'),
                        'lastname' => $this->request->getVar('lastname'),
                        'email' => $this->request->getVar('email'),
                        'hp' => $this->request->getVar('hp'),
                        'tim' => $this->request->getVar('tim'),
                        'alamat' => $this->request->getVar('alamat'),
                        'provinsi_id' => $this->request->getVar('provinsi'),
                        'kabupaten_id' => $this->request->getVar('kabupaten'),
                        'kecamatan_id' => $this->request->getVar('kecamatan'),
                        'desa_id' => $this->request->getVar('desa'),  
                    ]; 
                }else{
                    @unlink("uploads/".$dataIdentitas[0]->gambar);
                    $dataIdentitasup = [ 
                        'gambar' => $newName,
                        'id_users' => $id_users,
                        'firstname' => $this->request->getVar('firstname'),
                        'lastname' => $this->request->getVar('lastname'),
                        'email' => $this->request->getVar('email'),
                        'hp' => $this->request->getVar('hp'),
                        'tim' => $this->request->getVar('tim'),
                        'alamat' => $this->request->getVar('alamat'),
                        'provinsi_id' => $this->request->getVar('provinsi'),
                        'kabupaten_id' => $this->request->getVar('kabupaten'),
                        'kecamatan_id' => $this->request->getVar('kecamatan'),
                        'desa_id' => $this->request->getVar('desa'),  
                    ];  
                } 

            }   

            
  
                $Users->update($id_users, $dataUsersup);
                $Identitas->update($dataIdentitas[0]->id_identitas, $dataIdentitasup);


                return redirect()->to(base_url('profil'))->withInput(); 




        }
    }

    



    public function a_edit_prfil()
    { 
        if(session()->get('level') == 1) 
        {

            $Identitas = new IdentitasModel(); 
            $Users = new UsersModel(); 

            $id_identitas = $this->request->getVar('access_val'); 

            $dataIdentitas = $Identitas->join_where($id_identitas);

            echo json_encode(array("tampil" => $dataIdentitas));  
        }
    }










    
    function add_ajax_kab($id = null)
    {  
        $WKabupaten = new KabupatenModel(); 
        $datakabupaten = $WKabupaten->where('provinsi_id', $id)->findAll();
 
          
        $data = "<option value=''>- Select Kabupaten -</option>"; 
        foreach ($datakabupaten as $value) {
            $data .= "<option value='".$value->id."'>".$value->nm_kabupaten."</option>";
        }
        echo $data;   
    }

    function add_ajax_kec($id = null)
    { 
            

        $WKecamatan = new KecamatanModel(); 
        $datakecamatan = $WKecamatan->where('kabupaten_id', $id)->findAll();
 
          
        $data = "<option value=''>- Select Kecamatan -</option>"; 
        foreach ($datakecamatan as $value) {
            $data .= "<option value='".$value->id."'>".$value->nm_kecamatan."</option>";
        }
        echo $data; 
    }

    function add_ajax_desa($id = null)
    {
        $WDesa = new DesaModel(); 
        $datadesa = $WDesa->where('kecamatan_id', $id)->findAll();
 
          
        $data = "<option value=''>- Select Desa -</option>"; 
        foreach ($datadesa as $value) {
            $data .= "<option value='".$value->id."'>".$value->nm_desa."</option>";
        }
        echo $data; 
    }
    






}