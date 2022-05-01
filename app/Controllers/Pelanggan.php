<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\IdentitasModel;  
use App\Models\UsersModel;  
use App\Models\DesaModel;  
use App\Models\KabupatenModel;  
use App\Models\KecamatanModel;  
use App\Models\ProvinsiModel;   



class Pelanggan extends Controller{


    public function index()
    {
        if(session()->get('level') == 2) {


            $Identitas = new IdentitasModel();
            $Provinsis = new ProvinsiModel();

            $dataIdentitas = $Identitas->join_where_spc('level_users', '1');
           
    
            $data = array(
                'menu'          => '1f',
                'title'         => 'Pelanggan [SI-Futsal]', 
                'dtlv'          => session()->get('level'),
                'unm'           => session()->get('username'), 
                'dataIdentitas' => $dataIdentitas, 
                'Provinsis'     => $Provinsis->findAll(), 
            );

            
            echo view('extent/lv2/header', $data);
            echo view('v_pelanggan', $data);
            echo view('extent/lv2/footer', $data);
         
  


        }
    }

 
    public function progres_add_pelanggan()
    {
        if(session()->get('level') == 2)
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
                    'rules' => 'required|min_length[3]|max_length[15] ',
                    'errors' => [
                        'required'   => 'Password Harus diisi.',
                        'min_length' => 'Password Minimal 3 Karakter.',
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
                session()->setFlashdata('pesan_pelanggan', $this->validator->listErrors());
                return redirect()->to(base_url('/pelanggan'))->withInput(); 
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
            
            if ($new_id_users) { 
                $Users->insert([ 
                    'id_users' => $new_id_users,
                    'username_users' => $this->request->getVar('username'),
                    'password_users' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT), 
                    'level_users' => 1,
                    'tgl_pbt_users' => date('Y-m-d H:i:s'),
                ]);
                $Identitas->insert([ 
                    'gambar' => $newName,
                    'id_users' => $new_id_users,
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
 
                return redirect()->to(base_url('pelanggan'))->withInput(); 
            }else{
                session()->setFlashdata('pesan_pelanggan', 'Maaf, Terjadi Kesalahan Saat Penyimpanan Data. Silahkan Ulangi lagi.');
                return redirect()->to(base_url('pelanggan'))->withInput(); 
            }




        }
    }




    public function a_del_pelanggan()
    {
        if(session()->get('level') == 2)
        {
            $id_identitas = $this->request->getVar('access_val');
            
            echo '
                <div class="modal-header">
                    <h5 class="modal-title text-center title-add-pelanggan" >
                        Hapus Pelanggan
                    </h5> 
                    <hr style="margin:10px 0 0 0; border-top:1px solid ">
                </div> 
            ';

            echo '
                <form action="'.base_url().'/pelanggan/del" method="post" enctype="multipart/form-data">
                <div class="modal-body"> 
                    <h5 class="text-pelanggan">Prosess ini Akan Menghapus Data Anda. <br>Apa Anda Yakin?</h5>
                    <input type="hidden" name="user_id" value="'.$id_identitas.'" readonly>
                    <hr class="hr-modal-spc">
                    <div class="modal-footer text-center">  
                        <button type="button" class="btn btn-danger" data-dismiss="modal">  &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;Batal &nbsp;&nbsp;    &nbsp;  </button>
                    <button type="submit" class="btn btn-success">Lanjutkan  </button>
                </div>
                </form>
            ';
 

        }
    }

    public function progres_del_pelanggan()
    {
        if(session()->get('level') == 2)
        {
            echo $id_identitas = $this->request->getVar('user_id');

            $Identitas = new IdentitasModel();
            $Users = new UsersModel();
            
            $dataIdentitas = $Identitas->where([
                                            'id_identitas' => $id_identitas, 
                                                ])->findAll(); 


            if ($dataIdentitas) {
                if ($dataIdentitas[0]->gambar != "") {
                    unlink("uploads/".$dataIdentitas[0]->gambar); 

                    $Identitas->delete($id_identitas); 
                    $Users->delete($dataIdentitas[0]->id_users); 
                    return redirect()->to(base_url('/pelanggan'))->withInput();   
                }else{
                    $Identitas->delete($id_identitas); 
                    $Users->delete($dataIdentitas[0]->id_users); 
                    return redirect()->to(base_url('/pelanggan'))->withInput();  
                }
               


            }
 
        }
    }


    
    public function a_edit_pelanggan()
    {
        if(session()->get('level') == 2)
        {

            $Identitas = new IdentitasModel(); 
            $Users = new UsersModel(); 

            $id_identitas = $this->request->getVar('access_val'); 

            $dataIdentitas = $Identitas->join_where($id_identitas);

            echo json_encode(array("tampil" => $dataIdentitas));  
        }
    }

     public function p_edit_pelanggan()
    {
        if(session()->get('level') == 2)
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
                session()->setFlashdata('pesan_pelanggan', $this->validator->listErrors());
                return redirect()->to(base_url('/pelanggan'))->withInput(); 
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
                    session()->setFlashdata('pesan_pelanggan', $this->validator->listErrors());
                    return redirect()->to(base_url('/pelanggan'))->withInput(); 
                }   
                $sendcheckboxdata = 1; 
            }else{ 
                $sendcheckboxdata = 0; 
            }
           
            $Users = new UsersModel();
            $Identitas = new IdentitasModel();


            $id_users = $this->request->getVar('pelanggan');
            
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


                return redirect()->to(base_url('pelanggan'))->withInput(); 





        }
    }














    function add_ajax_kab( $id = null)
    {  
        if(session()->get('level') == 2) {

            $WKabupaten = new KabupatenModel(); 
    
            
            $pecah = explode('*', $id);
            $id1 = $pecah[0]; 

            if (isset($pecah[1])) {
 
                $datakabupaten = $WKabupaten->where('provinsi_id', $id1)->findAll(); 

                $data = "<option value=''>- Pilih Kabupaten -</option>"; 
                foreach ($datakabupaten as $value) {
                    if ($value->id == $pecah[1]) {
                        $selec = "selected";
                    }else{
                        $selec = ""; 
                    }
                    $data .= "<option value='".$value->id."' ".$selec." >".$value->nm_kabupaten."</option>";
                }
                echo $data;   

            }else{
                $datakabupaten = $WKabupaten->where('provinsi_id', $id1)->findAll(); 

                $data = "<option value=''>- Pilih Kabupaten -</option>"; 
                foreach ($datakabupaten as $value) {
                    $data .= "<option value='".$value->id."'>".$value->nm_kabupaten."</option>";
                }
                echo $data;   
            }

            
        }
    }

    function add_ajax_kec($id = null)
    { 
        if(session()->get('level') == 2) { 
            $WKecamatan = new KecamatanModel(); 



            $pecah = explode('*', $id);
            $id1 = $pecah[0]; 

            if (isset($pecah[1])) {
                $datakecamatan = $WKecamatan->where('kabupaten_id', $id1)->findAll();


                $data = "<option value=''>- Pilih Kecamatan -</option>"; 
                foreach ($datakecamatan as $value) {
                    if ($value->id == $pecah[1]) {
                        $selec = "selected";
                    }else{
                        $selec = ""; 
                    }
                    $data .= "<option value='".$value->id."' ".$selec."  >".$value->nm_kecamatan."</option>";
                }
                echo $data;  


             }else{
                $datakecamatan = $WKecamatan->where('kabupaten_id', $id1)->findAll();
                $data = "<option value=''>- Pilih Kecamatan -</option>"; 
                foreach ($datakecamatan as $value) {
                    $data .= "<option value='".$value->id."'>".$value->nm_kecamatan."</option>";
                }
                echo $data; 
             }



    
            
           
        }
    }

    function add_ajax_desa($id = null)
    {
        if(session()->get('level') == 2) { 

            $WDesa = new DesaModel(); 

            $pecah = explode('*', $id);
            $id1 = $pecah[0]; 

            if (isset($pecah[1])) {
                $datadesa = $WDesa->where('kecamatan_id', $id1)->findAll();

                $data = "<option value=''>- Pilih Desa -</option>"; 
                foreach ($datadesa as $value) {
                    if ($value->id == $pecah[1]) {
                        $selec = "selected";
                    }else{
                        $selec = ""; 
                    }
                    $data .= "<option value='".$value->id."' ".$selec." >".$value->nm_desa."</option>";
                }
                echo $data; 




            }else{
                $datadesa = $WDesa->where('kecamatan_id', $id1)->findAll();
        
                
                $data = "<option value=''>- Pilih Desa -</option>"; 
                foreach ($datadesa as $value) {
                    $data .= "<option value='".$value->id."'>".$value->nm_desa."</option>";
                }
                echo $data; 
            }

            
        }
    }
    


}