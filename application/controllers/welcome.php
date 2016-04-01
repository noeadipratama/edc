<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Welcome extends CI_Controller {
	public function index()
	{
        $data['alert'] = "";
		$this->load->view('login', $data);
		
		//jika seasson login belum sudah ada maka tampilkan home
            if($this->session->userdata('login'))
            {
                //jika seasson ada direct ke home
                redirect('home','refresh');
            }
	}
	
    public function logout(){    
        $this->session->unset_userdata('login');
        redirect('welcome','refresh');
    }

    public function relogin()
    {
        $data['alert'] = "Silahkan login kembali";
        $this->load->view('login',$data);
        
        //jika seasson login belum sudah ada maka tampilkan home
            if($this->session->userdata('login'))
            {
                //jika seasson ada direct ke home
                redirect('home','refresh');
            }
    }

    public function faillogin()
    {
        $data['alert'] = "Username atau Password tidak valid. Silahkan login kembali";
        $this->load->view('login',$data);
        
        //jika seasson login belum sudah ada maka tampilkan home
            if($this->session->userdata('login'))
            {
                //jika seasson ada direct ke home
                redirect('home','refresh');
            }
    }

  	
    
   
}