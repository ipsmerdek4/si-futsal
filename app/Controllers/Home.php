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
       

        if(session()->get('level') == 1)
        {
            $data = array(
                'menu' => '1b',
                'title' => 'Home [SI-Futsal]', 
                'dtlv' => session()->get('level'),
                'unm' => session()->get('username'),
            );
            echo view('extent/header', $data);
            echo view('v_home', $data);
            echo view('extent/footer', $data);
        }else{ 
            $data = array(
                'menu' => '1b',
                'title' => 'Home [SI-Futsal]', 
                'dtlv' => session()->get('level'),
            );
            echo view('extent/header', $data);
            echo view('v_home', $data);
            echo view('extent/footer', $data);
        }
        
    }




}
