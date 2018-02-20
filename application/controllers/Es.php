<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Es extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->helper("url");//BORRAR CACHÉ DE LA PÁGINA
        $this->load->model('M_solicitud');
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
    }
	public function index(){
		$data['nombre'] = '';
		$this->load->view('v_es', $data);
	}

	function registrar(){
		$data['error']   = EXIT_ERROR;
        $data['msj'] = null;
        try {
            $Nombre 	   = $this->input->post('Nombre');
            $Apellido    = $this->input->post('Apellido');
            $email 		   = $this->input->post('email');
            $re_email    = $this->input->post('re_email');
            $rol 		     = $this->input->post('rol');
            $canal 		   = $this->input->post('canal');
            $oportunidad = $this->input->post('oportunidad');
            $cliente     = $this->input->post('cliente');
            $productos 	 = $this->input->post('productos');
            $attach 	   = $this->input->post('attach');
            $fecha       = $this->input->post('fecha');
            $arrayInsertPers = array('Nombre' 	    => $Nombre,
                                     'Apellido' 	  => $Apellido,
                                     'Correo'       => $email,
                                     'conf_correo'  => $re_email,
                                     'Rol'  		    => $rol,
                                     'Nombre_canal' => $canal);
            $datoInsertPers = $this->M_solicitud->insertarDatos($arrayInsertPers, 'persona');
            $arrayInsert    = array('Numero_opp'     => $oportunidad,
                                    'Nombre_cliente' => $cliente,
                                    'Productos'      => $productos,
                                    'attach'         => $attach,
                             	      'fecha_cierre'   => $fecha,
                             	      'Id_pers' 		   => $datoInsertPers['Id']);
            $datoInsert  = $this->M_solicitud->insertarDatos($arrayInsert, 'oportunidad');
          $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e) {
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
	}

  function cambiarIdioma(){
    $data['error']   = EXIT_ERROR;
        $data['msj'] = null;
        try {
            $idioma  = $this->input->post('idioma');
            $session = array('idioma' => $idioma);
            $this->session->set_userdata($session);
            $data['error'] = EXIT_SUCCESS;
        }catch(Exception $e) {
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
}
