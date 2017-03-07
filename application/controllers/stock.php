<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class stock extends CI_Controller {
	 function __construct(){
        parent::__construct();
        $this->load->model("model_stock");
        $this->load->model("model_menu");
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
    }

	public function index()
	{
		if($this->session->userdata('login'))
        {
		$session = $this->session->userdata('login');
		$menu_kd_menu_details = "T03";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
		$data['id_user'] = $session['id_user'];
        $data['nm_user'] = $session['nm_user'];
        $data['session_level'] = $session['id_level'];
		$id_cabang = $session['id_cabang'];
		$id_level = $session['id_level'];
        
        
		$data['liststock'] = $this->model_stock->getAllstock($id_cabang, $id_level);
		$this->load->view('stock/index', $data);
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.stock.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}
	
	
} 