<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\IdentitasModel;  
use App\Models\TransaksiModel;  
use App\Models\HistoriModel;  

class History extends Controller{



    public function index()
    {
      if(session()->get('level') == 1)
        {
            $Identitas = new IdentitasModel();
            $Transaksi = new TransaksiModel();
            $Histori = new HistoriModel();

            $id_user    = session()->get('ID');

            $dataidentitas = $Identitas->where([
                                        'id_user' => $id_user,
                                    ])->first();

            $tgl = date("Y-m-d"); 


            $dataTransaksi = $Transaksi->where([
                                        'id_identitas' => $dataidentitas->id_identitas,
                                        'tgl_booking_lapangan' => $tgl,
                                        'booking_status' => 1,
                                    ])->orderBy('booking_status', 'ASC')->findAll();

            $dataTransaksi2 = $Transaksi->where([
                                        'id_identitas' => $dataidentitas->id_identitas, 
                                        'booking_status' => 1,
                                    ])->findAll(); 

            if (isset($dataTransaksi[0]->kode_transaksi)) {
                $newkodetrans = $dataTransaksi[0]->kode_transaksi;
            }else{
                $newkodetrans = "";
            }
            $dataHistori = $Histori->where([ 
                                        'id_identitas' => $dataidentitas->id_identitas,
                                        'tgl_booking_lapangan' => $tgl,
                                        'booking_status' => 1,  
                                    ])->findAll();
            
 
            /*  */
                foreach ($dataTransaksi2 as $v_Transaksi2) {  
                    if ( $v_Transaksi2->tgl_booking_lapangan < date("Y-m-d") ) {   
                        $Transaksi->update($v_Transaksi2->id_transaksi, ['booking_status' => 9]);  
                        //
                        $dataHistorix = $Histori->where([
                                        'kode_transaksi' => $v_Transaksi2->kode_transaksi,
                                        'id_identitas' => $dataidentitas->id_identitas, 
                                        'booking_status' => 1,  
                                    ])->findAll(); 
                        foreach ($dataHistorix as $v_dataHistorix) {
                            $Histori->update($v_dataHistorix->id_histori , ['booking_status' => 9]);  
                        }
                    }   
                } 
            /*  */


            $data = array(
                'menu' => '1e',
                'title' => 'Histori [SI-Futsal]', 
                'dtlv' => session()->get('level'),
                'unm' => session()->get('username'),
                'dataidentitas' => $dataidentitas,
                'dataTransaksi' => $dataTransaksi,
                'dataHistori' => $dataHistori,
            );
            echo view('extent/header', $data);
            echo view('v_history', $data);
            echo view('extent/footer', $data);
 
            
        }
    }

    
    public function upload_prosess()
    {
      if(session()->get('level') == 1)
        {


             if (!$this->validate([
                 'gambarnya' => [
                      'rules' =>    'is_image[gbrbukti]'
                                    .'|mime_in[gbrbukti,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                                    .'|max_size[gbrbukti,1000]',  
                      'errors' => [    
                          'is_image' => 'File harus berformat Gambar.',
                          'mime_in' => 'File yang di izinkan image/jpg, image/jpeg,image/gif,image/png, image/webp.',   
                          'max_size' => 'Ukuran File Paling besar 1Mb.',   
                      ]
                  ],  
              ])) {
                  session()->setFlashdata('alert', $this->validator->listErrors());
                  return redirect()->to(base_url('/history'))->withInput(); 
              } 

            $Histori = new HistoriModel();
            $Transaksi = new TransaksiModel();

            $data = $this->request->getVar('bukti');
            $pecah_data = explode('-', $data);
            $id_histori = $pecah_data[0];
            $kodetransaksi = $pecah_data[1];
            $id_identitas = $pecah_data[2];


            $dataTransaksi_X = $Transaksi->where([
                                    'kode_transaksi' => $kodetransaksi, 
                                    'id_identitas' => $id_identitas, 
                                    'booking_status' => 1,
                                ])->findAll();
  
            if ($img = $this->request->getFile('gbrbukti')) { 
                if ($img->isValid() && ! $img->hasMoved())
                {
                    $newName = $img->getRandomName();
                    $img->move('uploads/bukti/', $newName);                
                }  else{
                    session()->setFlashdata('alert', '<ul><li>File Gambar Tidak terdeteksi</li></ul>');
                    return redirect()->to(base_url('/history'))->withInput(); 
                }
            }   
            
            $data = [
                'booking_bukti' => $newName,  //status cancel 
                'booking_status' => 2,  //status waitting setelah upload bukti 
                'booking_TOKEN' => rand(100000,999999), 
            ]; 
            $Histori->update($id_histori , $data);  

           
            foreach ($dataTransaksi_X as $valueX) {   
                $data2 = [ 
                    'booking_status' => 2,  //status waitting setelah upload bukti 
                ];  
                $Transaksi->update($valueX->id_transaksi, $data2);
            }
            
            

            session()->setFlashdata('error', 'Berhasil Terdaftar, Silahkan login.');
            return redirect()->to(base_url('history/'))->withInput(); 
   

        }
    }

    
    public function view_all()
    {
        if(session()->get('level') == 1)
        { 
            $Identitas = new IdentitasModel();
            $Histori = new HistoriModel();

            $id_user    = session()->get('ID'); 
            $dataidentitas = $Identitas->where([
                                        'id_user' => $id_user,
                                    ])->first(); 


            $tglview = $this->request->getVar('tglallv');
            if (isset($tglview)) { 
                $tgl2 = $tglview;
                $pecah_tgl_book = explode('-', $tglview);
                $tahunedit      = explode(' ', $pecah_tgl_book[2]);
                $tgl   = $tahunedit[0].'-'.$pecah_tgl_book[1].'-'.$pecah_tgl_book[0];   
            }else{
                $tgl = date("Y-m-d"); 
                $tgl2 = date('d-m-Y');

            }
 
            $dataHistori = $Histori->where([ 
                                    'id_identitas' => $dataidentitas->id_identitas,
                                    'tgl_booking_lapangan' => $tgl, 
                                ])->findAll();


            $data = array(
                            'menu'          => '1e',
                            'title'         => 'Histori [SI-Futsal]', 
                            'dtlv'          => session()->get('level'),
                            'unm'           => session()->get('username'),
                            'dataHistori'   => $dataHistori,
                            'lockviewall'   => 1,
                            'tgl2'          => $tgl2,
                             
                        );
            echo view('extent/header', $data);
            echo view('v_history', $data);
            echo view('extent/footer', $data);
        }
    }


    public function view_all_cancel()
    { 
            $Identitas = new IdentitasModel();
            $Histori = new HistoriModel();
            $Transaksi = new TransaksiModel();

            $id_history = $this->request->getVar('history_one');


            $id_user    = session()->get('ID');

            $dataidentitas = $Identitas->where([
                                        'id_user' => $id_user,
                                    ])->first();

            $dataHistori = $Histori->where([ 
                                            'id_histori ' => $id_history , 
                                        ])->findAll();
            
            foreach ($dataHistori as $v_dataHistori) {  
                    $datatransaksi = $Transaksi->where([
                                            'kode_transaksi' => $v_dataHistori->kode_transaksi,
                                            'id_identitas' => $dataidentitas->id_identitas, 
                                        ])->findAll(); 
                    foreach ($datatransaksi as $v_datatransaksi) { 
                      $Transaksi->update($v_datatransaksi->id_transaksi, ['booking_status' => 9]);  
                    }        
            }

            $Histori->update($id_history, ['booking_status' => 9]);

            return redirect()->to(base_url('history/viewall'))->withInput(); 

 


    }

    

}