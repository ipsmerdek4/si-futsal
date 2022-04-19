<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsersModel;  
use App\Models\DesaModel;  
use App\Models\KabupatenModel;  
use App\Models\KecamatanModel;  
use App\Models\ProvinsiModel;   
use App\Models\IdentitasModel;  

class Register extends Controller{
   
   
    
    public function index()
    { 

            $Provinsis = new ProvinsiModel();
           
         
            $data = array(
                'menu' => '1z',
                'title' => 'Register [SI-Futsal]', 
                'Provinsis' => $Provinsis->findAll(), 
            ); 
            echo view('v_register', $data); 
 

    }


    public function reg_add_prosess()
    { 

             if (!$this->validate([
                 'gambarnya' => [
                      'rules' =>  'is_image[gambarnya]'
                                    .'|mime_in[gambarnya,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                                    .'|max_size[gambarnya,1000]'
                                    .'|max_dims[gambarnya,800,800]', //ukuran gambar 1024x768
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
                        /*  */ 
                  'username' => [
                      'rules' => 'required|min_length[3]|max_length[15] ',
                      'errors' => [
                          'required'   => 'Username Harus diisi.',
                          'min_length' => 'Username Minimal 3 Karakter.',
                          'max_length' => 'Username Maksimal 15 Karakter.',   
                      ]
                  ], 
                  'password' => [
                      'rules' => 'required|min_length[6]|max_length[15] ',
                      'errors' => [
                          'required'   => 'Password Harus diisi.',
                          'min_length' => 'Password Minimal 6 Karakter.',
                          'max_length' => 'Password Maksimal 15 Karakter.',   
                      ]
                  ], 
                  'tim' => [
                      'rules' => 'required|min_length[6]|max_length[15]|is_unique[tbl_identitas.tim]',
                      'errors' => [
                          'required'   => 'Nama Tim Harus diisi.',
                          'min_length' => 'Nama Tim Minimal 6 Karakter.',
                          'max_length' => 'Nama Tim Maksimal 15 Karakter.',   
                          'is_unique' => 'Nama Tim Sudah Ada, Silahkan gunakan yang lain.',   
                      ]
                  ], 
                        /*  */
                  
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
                  session()->setFlashdata('error', $this->validator->listErrors());
                  return redirect()->to(base_url('/register'))->withInput(); 
              } 

            $Users = new UsersModel();
            $Identitas = new IdentitasModel();

            $cek_total_data = $Users->getcountall('username_users');  
            $new_id_users = $cek_total_data[0]->username_users+1;
 
          
  
            if ($img = $this->request->getFile('gambarnya')) { 
                if ($img->isValid() && ! $img->hasMoved())
                {
                    $newName = $img->getRandomName();
                    $img->move('uploads/', $newName);                
                }  else{
                    $newName = "";
                }
            }     
            $Identitas->insert([ 
                'gambar' => $newName,
                'id_user' => $new_id_users,
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
                'tgl_pbt_identitas' => date('Y-m-d H:i:s'),
            ]);

            $Users->insert([ 
                'id_users' => $new_id_users,
                'username_users' => $this->request->getVar('username'),
                'password_users' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT), 
                'level_users' => 1,
                'tgl_pbt_users' => date('Y-m-d H:i:s'),
            ]);

            session()->setFlashdata('error', 'Berhasil Terdaftar, Silahkan login.');
            return redirect()->to(base_url('login/'))->withInput(); 
 

  



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