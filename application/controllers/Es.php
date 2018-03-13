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
		$data['error'] = EXIT_ERROR;
        $data['msj']   = null;
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
                             	    'fecha_cierre'     => $fecha,
                             	    'Id_pers' 		     => $datoInsertPers['Id']);
            $datoInsert  = $this->M_solicitud->insertarDatos($arrayInsert, 'oportunidad');
            $this->sendEmail($email, $Nombre, $Apellido, $rol, $canal, $oportunidad, $cliente, $productos, $attach, $fecha);
            $this->sendEmailCliente($email);
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

    function sendEmail($email, $Nombre, $Apellido, $rol, $canal, $oportunidad, $cliente, $productos, $attach, $fecha) {
      $data['error'] = EXIT_ERROR;
      $data['msj']   = null;
      try {  
       $this->load->library("email");
       $configGmail = array(
                            'protocol'  => 'smtp',
                            'smtp_host' => 'smtpout.secureserver.net',
                            'smtp_port' => 3535,
                            'smtp_user' => 'confirmaciones@merino.com.pe',
                            'smtp_pass' => 'cFm$17Pe',
                            'mailtype'  => 'html',
                            'charset'   => 'utf-8',
                            'newline'   => "\r\n"
                          );    
       $this->email->initialize($configGmail);
       $this->email->from('info@sap-latam.com');
       $this->email->to('dcnlatam@hpe.com');
       $this->email->subject('Registro de oportunidades DCN');
       $texto = '<!DOCTYPE html>
                  <html>
                  <head>
                    <title></title>
                  </head>
                  <body style="font-family: arial">
                      <table align="center" cellspacing="0" cellpadding="0" border="0" style="width: 500px;border: 1px solid #757575;">
                          <tr style="width: 500px;">
                              <td>
                                  <table cellspacing="0" cellpadding="0" border="0" style="background-color: #2B4356;width: 500px;">
                                    <tr>
                                        <td style="width: 500px;text-align: left;">
                                            <table cellspacing="0" cellpadding="0" border="0" style="padding: 10px;">
                                                <tr style="text-align: left;">
                                                    <td style="text-align: left;"><img width="120" src="http://test.brainblue.com/RegistrodeOportunidadesDCN/public/img/logo.png"></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                  </table>
                              </td>
                          </tr>
                          <tr>
                            <td>
                                <table style="width: 500px;padding: 10px;">
                                    <tr style="padding: 25px;">
                                        <td style="text-align: center;"><h2 style="font-family: arial">Datos del Cliente</h2></td>
                                    </tr>
                                    <tr>
                                      <table style="padding: 20px;" cellspacing="0" cellpadding="0" border="0">
                                          <tr style="padding: 0 20px;">
                                              <td width="80"><font style="margin: 3px 0;font-size: 18px;font-family: arial;font-weight: bold;">Cliente:</font></td>
                                              <td><font style="margin: 3px 0;font-family: arial;font-size: 15px;">'.$Nombre.' '.$Apellido.'</font></td>
                                          </tr>
                                          <tr style="padding: 0 20px;">
                                              <td width="80"><font style="margin: 3px 0;font-size: 18px;font-family: arial;font-weight: bold;">Cargo:</font></td>
                                              <td><font  style="margin: 3px 0;font-family: arial;font-size: 15px;">'.$rol.'</font></td>
                                          </tr>
                                          <tr style="padding: 0 20px;">
                                              <td width="80"><font style="margin: 3px 0;font-size: 18px;font-family: arial;font-weight: bold;">Canal:</font></td>
                                              <td><font style="font-family: arial;font-size: 15px;">'.$canal.'</font></td>
                                          </tr>
                                          <tr style="padding: 0 20px;">
                                              <td width="80"><font style="margin: 3px 0;font-size: 18px;font-family: arial;font-weight: bold;">Email:</font></td>
                                              <td><font style="margin: 3px 0;font-family: arial;font-size: 15px;">'.$email.'</font></td>
                                          </tr>
                                      </table>
                                    </tr>
                                    <tr style="padding: 25px;">
                                        <td style="text-align: center;"><h2 style="font-family: arial">Datos de oportunidad</h2></td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <table style="width: 500px;padding: 20px;" cellspacing="0" cellpadding="0">
                                            <tr style="padding: 5px 20px;">
                                                <td rowspan="2">1</td>
                                                <td style="text-align: left;"><font style="margin: 0;font-family: arial">Número de oportunidad</font></td>
                                            </tr>
                                            <tr style="padding: 5px 10px;">
                                                <td style="text-align: left;"><font style="margin: 0;font-family: arial">OPE - '.$oportunidad.'</font></td>
                                            </tr>
                                            <tr style="padding: 5px 10px;">
                                                <td rowspan="2">2</td>
                                                <td style="text-align: left;"><font style="margin: 0;font-family: arial">Nombre del cliente</font></td>
                                            </tr>
                                            <tr style="padding: 5px 10px;">
                                                <td style="text-align: left;"><font style="margin: 0;font-family: arial">'.$cliente.' empleados</font></td>
                                            </tr>
                                            <tr style="padding: 5px 10px;">
                                                <td rowspan="2">3</td>
                                                <td style="text-align: left;"><font style="margin: 0;font-family: arial">Productos asociados a la oportunidad</font></td>
                                            </tr>
                                            <tr style="padding: 5px 10px;">
                                                <td style="text-align: left;"><font style="margin: 0;font-family: arial">'.$productos.'</font></td>
                                            </tr>
                                            <tr style="padding: 5px 10px;">
                                                <td rowspan="2">4</td>
                                                <td style="text-align: left;"><font style="margin: 0;font-family: arial">El attach de DCN que se realizó</font></td>
                                            </tr>
                                            <tr style="padding: 5px 10px;">
                                                <td style="text-align: left;"><font style="margin: 0;font-family: arial">'.$attach.'</font></td>
                                            </tr>
                                            <tr style="padding: 5px 10px;">
                                                <td rowspan="2">5</td>
                                                <td style="text-align: left;"><font style="margin: 0;font-family: arial">Fecha de cierre del negocio</p></td>
                                            </tr>
                                            <tr style="padding: 5px 10px;">
                                                <td style="text-align: left;"><font style="margin: 0;font-family: arial">'.$fecha.'</font></td>
                                            </tr>
                                        </table>
                                      </td>
                                    </tr>
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

    function sendEmailCliente($email) {
      $data['error'] = EXIT_ERROR;
      $data['msj']   = null;
      try {  
       $this->load->library("email");
       $configGmail = array(
                            'protocol'  => 'smtp',
                            'smtp_host' => 'smtpout.secureserver.net',
                            'smtp_port' => 3535,
                            'smtp_user' => 'confirmaciones@merino.com.pe',
                            'smtp_pass' => 'cFm$17Pe',
                            'mailtype'  => 'html',
                            'charset'   => 'utf-8',
                            'newline'   => "\r\n"
                          );    
        $this->email->initialize($configGmail);
        $this->email->from('info@sap-latam.com');
        $this->email->to($email);
        $this->email->subject('Registro de oportunidades DCN');
        $texto = '<!DOCTYPE html>
                  <html>
                  <head>
                    <title></title>
                  </head>
                  <body style="font-family: arial">
                      <table align="center" cellspacing="0" cellpadding="0" border="0" style="width: 500px;border: 1px solid #757575;">
                          <tr style="width: 500px;">
                              <td>
                                  <table cellspacing="0" cellpadding="0" border="0" style="background-color: #2B4356;width: 500px;">
                                    <tr>
                                        <td style="width: 500px;text-align: left;">
                                            <table cellspacing="0" cellpadding="0" border="0" style="padding: 10px;">
                                                <tr style="text-align: left;">
                                                    <td style="text-align: left;"><img width="120" src="http://test.brainblue.com/RegistrodeOportunidadesDCN/public/img/logo.png"></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                  </table>
                              </td>
                          </tr>
                          <tr>
                            <td>
                                <table style="width: 500px;padding: 10px;">
                                    <tr>
                                        <td style="text-align: center;padding: 25px;"><font style="font-family: arial;font-size: 24px;font-weight: bold;">Tu registro ha sido enviado satisfactoriamente.</font></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;padding: 0 25px;"><font style="font-family: arial;font-size: 16px;">Nos pondremos en contacto contigo a la brevedad</font></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;padding-bottom: 20px;"><font style="font-family: arial;font-size: 12px;">Equipo DCN Latinoamerica</font></td>
                                    </tr>
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
