<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pt extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->helper("url");//BORRAR CACHÉ DE LA PÁGINA
        $this->load->model('M_solicitud');
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
    }
	public function index()
	{
		$data['nombre'] = '';
		$this->load->view('v_pt', $data);
	}
	function registrar() {
		$data['error'] = EXIT_ERROR;
    $data['msj']   = null;
        try {
            $Nombre 	   = $this->input->post('Nombre');
            $Apellido 	 = $this->input->post('Apellido');
            $email 		   = $this->input->post('email');
            $re_email 	 = $this->input->post('re_email');
            $rol 		     = $this->input->post('rol');
            $canal 		   = $this->input->post('canal');
            $oportunidad = $this->input->post('oportunidad');
            $cliente     = $this->input->post('cliente');
            $productos 	 = $this->input->post('productos');
            $attach 	   = $this->input->post('attach');
            $fecha       = $this->input->post('fecha');
            $arrayInsertPers = array('Nombre' 		  => $Nombre,
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
            $datoInsert = $this->M_solicitud->insertarDatos($arrayInsert, 'oportunidad');
            $this->sendEmail($email, $Nombre, $Apellido, $rol, $canal, $oportunidad, $cliente, $productos, $attach, $fecha);
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e) {
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
	}
    function cambiarIdioma() {
    $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $idioma = $this->input->post('idioma');
            $session = array('idioma' => $idioma);
            $this->session->set_userdata($session);
            $data['error'] = EXIT_SUCCESS;
        }catch(Exception $e) {
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }

    function sendEmail($email, $Nombre, $Apellido, $rol, $canal, $oportunidad, $cliente, $productos, $attach, $fecha) {
      $data['error'] = EXIT_ERROR;
      $data['msj']   = null;
      try {  
       $this->load->library("email");
       $configGmail = array(
                            'protocol'  => 'smtp',
                            'smtp_host' => 'smtpout.secureserver.net',
                            'smtp_port' => 3535,
                            'smtp_user' => 'info@marketinghpe.com',
                            'smtp_pass' => 'hpEmSac$18',
                            'mailtype'  => 'html',
                            'charset'   => 'utf-8',
                            'newline'   => "\r\n"
                          );    
       $this->email->initialize($configGmail);
       $this->email->from('info@sap-latam.com');
       $this->email->to('jhonatanibericom@gmail.com');
       $this->email->subject('Registro de oportunidades DCN');
       $texto = '<!DOCTYPE html>
                  <html>
                  <head>
                    <title></title>
                  </head>
                  <body style="font-family: "Open Sans",Arial,Helvetica,sans-serif;">
                    <table align="center" cellspacing="0" cellpadding="0" border="0" style="max-width: 500px; width: 100%; margin: auto;border: 1px solid #757575;">
                      <tr>
                        <th>
                          <table cellspacing="0" cellpadding="0" border="0" style="background-color: #000000;">
                            <tbody>
                              <tr>
                                <th style="width: 425px;text-align: left;padding-left: 20px;">
                                  <table cellspacing="0" cellpadding="0" border="0">
                                    <tbody>
                                      <tr style="text-align: left;">
                                        <th style="text-align: left;"><img width="150" src="http://www.sap-latam.com/sap_business_one/public/img/logo/logo_header.png"></th>
                                      </tr>
                                    </tbody>
                                  </table>
                                </th>
                                <th style="width: 75px;">
                                  <table cellspacing="0" cellpadding="0" border="0">
                                    <tbody>
                                      <tr>
                                        <td style="height: 100px;width: 25px;background-color: #54442E;"></td>
                                        <td style="height: 100px;width: 25px;background-color: #8D6832;"></td>
                                        <td style="height: 100px;width: 25px;background-color: #E29D2E;"></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </th>
                              </tr>
                            </tbody>
                          </table>
                        </th>
                      </tr>
                      <tr>
                        <td>
                          <table style="width: 100%;padding: 10px;">
                            <tbody>
                              <tr style="padding: 25px;margin: 30px;">
                                <td style="text-align: center;"><h2 style="font-family: "Open Sans",Arial,Helvetica,sans-serif;">Datos del Cliente</h2></td>
                              </tr>
                              <tr>
                                <table style="padding: 20px;" cellspacing="0" cellpadding="0" border="0">
                                  <tbody>
                                    <tr style="padding: 0 20px;">
                                      <td><h2 style="margin: 3px 0;font-size: 18px;font-family: "Open Sans",Arial,Helvetica,sans-serif;">Cliente:</h2></td>
                                      <td><p style="margin: 3px 0;font-family: "Open Sans",Arial,Helvetica,sans-serif;">'.$Nombre.'</p></td>
                                    </tr>
                                    <tr style="padding: 0 20px;">
                                      <td><h2 style="margin: 3px 0;font-size: 18px;font-family: "Open Sans",Arial,Helvetica,sans-serif;">Cargo:</h2></td>
                                      <td><p  style="margin: 3px 0;font-family: "Open Sans",Arial,Helvetica,sans-serif;">'.$rol.'</p></td>
                                    </tr>
                                    <tr style="padding: 0 20px;">
                                      <td><h2 style="margin: 3px 0;font-size: 18px;font-family: "Open Sans",Arial,Helvetica,sans-serif;">Canal:</td>
                                      <td><p style="font-family: "Open Sans",Arial,Helvetica,sans-serif;">'.$canal.'</p></td>
                                    </tr>
                                    <tr style="padding: 0 20px;">
                                      <td><h2 style="margin: 3px 0;font-size: 18px;font-family: "Open Sans",Arial,Helvetica,sans-serif;">Email:</h2></td>
                                      <td><p style="margin: 3px 0;font-family: "Open Sans",Arial,Helvetica,sans-serif;">'.$email.'</p></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </tr>
                              <tr style="padding: 25px;margin: 30px;">
                                <td style="text-align: center;"><h2 style="font-family: "Open Sans",Arial,Helvetica,sans-serif;">Datos de oportunidad</h2></td>
                              </tr>
                              <tr>
                                <td>
                                  <table style="width: 100%;padding: 20px;" cellspacing="0" cellpadding="0">
                                    <tbody>
                                      <tr style="padding: 5px 20px;">
                                        <td rowspan="2"><img width="35" src="http://www.sap-latam.com/sap_business_one/public/img/1.jpg""></td>
                                        <td style="text-align: left;"><p style="margin: 0;font-family: "Open Sans",Arial,Helvetica,sans-serif;">Número de oportunidad</p></td>
                                      </tr>
                                      <tr style="padding: 5px 20px;">
                                        <td style="text-align: left;"><p style="margin: 0;font-family: "Open Sans",Arial,Helvetica,sans-serif;">OPE - '.$oportunidad.'</p></td>
                                      </tr>
                                      <tr style="padding: 5px 20px;">
                                        <td rowspan="2"><img width="35" src="http://www.sap-latam.com/sap_business_one/public/img/2.jpg""></td>
                                        <td style="text-align: left;"><p style="margin: 0;font-family: "Open Sans",Arial,Helvetica,sans-serif;">Nombre del cliente</p></td>
                                      </tr>
                                      <tr style="padding: 5px 20px;">
                                        <td style="text-align: left;"><p style="margin: 0;font-family: "Open Sans",Arial,Helvetica,sans-serif;">'.$cliente.' empleados</p></td>
                                      </tr>
                                      <tr style="padding: 5px 20px;">
                                        <td rowspan="2"><img width="35" src="http://www.sap-latam.com/sap_business_one/public/img/3.jpg""></td>
                                        <td style="text-align: left;"><p style="margin: 0;font-family: "Open Sans",Arial,Helvetica,sans-serif;">Productos asociados a la oportunidad</p></td>
                                      </tr>
                                      <tr style="padding: 5px 20px;">
                                        <td style="text-align: left;"><p style="margin: 0;font-family: "Open Sans",Arial,Helvetica,sans-serif;">'.$productos.'</p></td>
                                      </tr>
                                      <tr style="padding: 5px 20px;">
                                        <td rowspan="2"><img width="35" src="http://www.sap-latam.com/sap_business_one/public/img/4.jpg""></td>
                                        <td style="text-align: left;"><p style="margin: 0;font-family: "Open Sans",Arial,Helvetica,sans-serif;">El attach de DCN que se realizó</p></td>
                                      </tr>
                                      <tr style="padding: 5px 20px;">
                                        <td style="text-align: left;"><p style="margin: 0;font-family: "Open Sans",Arial,Helvetica,sans-serif;">'.$attach.'</p></td>
                                      </tr>
                                      <tr style="padding: 5px 20px;">
                                        <td rowspan="2"><img width="35" src="http://www.sap-latam.com/sap_business_one/public/img/5.jpg""></td>
                                        <td style="text-align: left;"><p style="margin: 0;font-family: "Open Sans",Arial,Helvetica,sans-serif;">Fecha de cierre del negocio</p></td>
                                      </tr>
                                      <tr style="padding: 5px 20px;">
                                        <td style="text-align: left;"><p style="margin: 0;font-family: "Open Sans",Arial,Helvetica,sans-serif;">'.$fecha.'</p></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </body>
                  </html>';
        $this->email->message($texto);
        $this->email->send();
        $data['error'] = EXIT_SUCCESS;
      }catch (Exception $e){
        $data['msj'] = $e->getMessage();
      }
      return json_encode(array_map('utf8_encode', $data));
    }
}