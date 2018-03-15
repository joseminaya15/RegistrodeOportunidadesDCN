<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('M_solicitud');
        $this->load->helper("url");//BORRAR CACHÉ DE LA PÁGINA
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
    }

	public function index(){
		if($this->session->userdata('usuario') == null){
			header("location: Login");
		}
		$data['html'] = $this->getTable();
		$this->load->view('v_admin', $data);
	}

	function getTable(){
		$datos = $this->M_solicitud->getRegistros();
		$html  = '';
		$cont  = 1;
		foreach ($datos as $key){
			$html .= '<tr class="tr-cursor-pointer tr-ver-info-solicitud" data-idSolicitud="'.$cont.'">
                        <td class="text-center">'.$key->Numero_opp.'</td>
                        <td class="text-center">'.$key->Nombre_cliente.'</td>
                        <td class="text-center">'.$key->Productos.'</td>
                        <td class="text-center">'.$key->attach.'</td>
                        <td class="text-center">'.$key->fec_cierre.'</td>
                        <td class="text-center">'.$key->Nombre.' '.$key->Apellido.'</td>
                        <td class="text-center">'.$key->Correo.'</td>
                        <td class="text-center">'.$key->Rol.'</td>
                        <td class="text-center">'.$key->Nombre_canal.'</td>
                    </tr>';
            $cont++;
		}
		return $html;
	}

    function cerrarCesion(){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $this->session->unset_userdata('usuario');
            $this->session->unset_userdata('Id_user');
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
}
