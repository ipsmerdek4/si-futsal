<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsersModel;   

class Users extends Controller{

    public function login()
    { 
        $data = array(
			'menu' => '1a',
			'title' => 'Login [SI-Futsal]',  
		);

        
        echo view('v_login', $data); 
    }


    public function login_p()
    {
         
                if (!$this->validate([
                    'u_name' => [
                        'rules' => 'required|min_length[4]|max_length[20]',
                        'errors' => [
                            'required'   => 'Username Harus diisi',
                            'min_length' => 'Username Minimal 4 Karakter',
                            'max_length' => 'Username Maksimal 20 Karakter',  
                        ]
                    ], 
                    'p_name' => [
                        'rules' => 'required|min_length[4]|max_length[20]',
                        'errors' => [
                            'required'   => 'Password Harus diisi',
                            'min_length' => 'Password Minimal 4 Karakter',
                            'max_length' => 'Password Maksimal 20 Karakter',  
                        ]
                    ], 
                ])) {
                    session()->setFlashdata('error', ' <b style="text-transform: capitalize; letter-spacing:1px;"'.$this->validator->listErrors().'</b>');
                    return redirect()->to(base_url('/login'))->withInput(); 
                } 

                $users = new UsersModel();
                $username = $this->request->getVar('u_name');
                $password = $this->request->getVar('p_name');
                $dataUser = $users->where([
                    'username_users	' => $username,
                ])->first();

                if ($dataUser) {
                    if (password_verify($password, $dataUser->password_users)) {

                          session()->set([
                            'username' => $dataUser->username_users,
                            'ID' => $dataUser->id_users ,
                            'level' => $dataUser->level_users,
                            'logged_in' => TRUE
                        ]);
                        session()->setFlashdata('logingo','1');
                        return redirect()->to(base_url());
 

                    } else {
                        session()->setFlashdata('error', ' <b style="text-transform: capitalize;letter-spacing:1px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;Password Salah.</b> ');
                        return redirect()->to(base_url('/login'))->withInput(); 
                    }
                } else {
                    session()->setFlashdata('error', ' <b style="text-transform: capitalize;letter-spacing:1px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;Username Salah.</b> ');
                    return redirect()->to(base_url('/login'))->withInput(); 
                }

               


    }


    function logout()
    {         
        
        /* 
                session()->destroy();
                return redirect()->to(base_url());
        
        */

        $itemget = ['username', 'ID', 'level', 'logged_in'];
        session()->remove($itemget);
        session()->setFlashdata('logingo','1');  

        return redirect()->to(base_url());


    }








}