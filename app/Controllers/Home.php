<?php

namespace App\Controllers; 
use CodeIgniter\Controller;




class Home extends BaseController
{
   
    
   public function index()
    { 
/* 

         'username' => $dataUser->username_users,
                            'ID' => $dataUser->id_users ,
                            'level' => $dataUser->level_users,
                            'logged_in' => TRUE
         */
       $data = array(
                'menu' => '1b',
                'title' => 'Home [SI-Futsal]', 
                'dtlv' => session()->get('level'),
            );

        if(session()->get('level') == 1)
        {
            
            echo view('extent/header', $data);
            echo view('v_home', $data);
            echo view('extent/footer', $data);
        }else{ 
            echo view('extent/header', $data);
            echo view('v_home', $data);
            echo view('extent/footer', $data);
        }
        
    }




}
