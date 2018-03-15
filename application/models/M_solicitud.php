<?php

class M_solicitud extends  CI_Model{
    function __construct(){
        parent::__construct();
    }

    function insertarDatos($arrayInsert, $tabla){
        $this->db->insert($tabla, $arrayInsert);
        $sol = $this->db->insert_id();
        if($this->db->affected_rows() != 1) {
            throw new Exception('Error al insertar');
            $data['error'] = EXIT_ERROR;
        }
        return array("error" => EXIT_SUCCESS, "msj" => MSJ_INS, "Id" => $sol);
    }

    function getRegistros(){
        $sql = "SELECT p.*,
                       o.*,
                       DATE_FORMAT(o.fecha_cierre, '%d/%m/%Y') AS fec_cierre
                  FROM persona p,
                       oportunidad o
                WHERE o.id_pers = p.Id";
        $result = $this->db->query($sql);
        return $result->result();
    }
}