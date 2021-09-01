<?php
class Usuarios_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_items($usr_id = FALSE)
    {
        if ($usr_id === FALSE)
        {
            $query = $this->db->query('SELECT *
                                        FROM usuarios AS U
                                        INNER JOIN usuarios_tipos AS UT ON U.ut_id = UT.ut_id');
            return $query->result_array();
        }

        $query = $this->db->query('SELECT *
                                    FROM usuarios AS U
                                    INNER JOIN usuarios_tipos AS UT ON U.ut_id = UT.ut_id
                                    WHERE U.usr_id ='.$usr_id);
        return $query->row_array();
    }

    public function get_items_x_tipo($emp_id = FALSE, $tipo = FALSE)
    {
        if($tipo === FALSE)
        {
            return FALSE;
        }

        if($emp_id == FALSE)
        {
            $query = $this->db->query('SELECT U.*, UT.*
                                        FROM usuarios AS U
                                        INNER JOIN usuarios_tipos AS UT ON U.ut_id = UT.ut_id
                                        WHERE U.ut_id = '.$tipo);
            return $query->result_array();
        }

        $query = $this->db->query('SELECT U.*, UT.*
                                    FROM usuarios AS U
                                    INNER JOIN usuarios_tipos AS UT ON U.ut_id = UT.ut_id
                                    WHERE U.ut_id = '.$tipo.'
                                    AND U.emp_id ='.$emp_id);
        return $query->result_array();
    }

    public function get_items_x_especialidad($emp_id = FALSE, $esp_id = FALSE)
    {
        if($emp_id === FALSE || $esp_id === FALSE)
        {
            return FALSE;
        }

        $query = $this->db->query('SELECT *
                                    FROM usuarios AS U
                                    INNER JOIN usuarios_especialidades AS UE ON U.usr_id = UE.usr_id
                                    WHERE UE.esp_id = '.$esp_id.'
                                    AND U.emp_id ='.$emp_id);
        return $query->result_array();
    }

    public function get_item_x_mail($emp_id = FALSE, $mail = FALSE)
    {
        if($emp_id === FALSE || $mail === FALSE)
        {
            return FALSE;
        }

        $query = $this->db->query('SELECT *
                                    FROM usuarios AS U
                                    WHERE U.usr_mail = "'.$mail.'"
                                    AND U.emp_id ='.$emp_id);
        return $query->row_array();
    }

    public function get_item_x_dni($emp_id = FALSE, $dni = FALSE)
    {
        if($emp_id === FALSE || $dni === FALSE)
        {
            return FALSE;
        }

        $query = $this->db->query('SELECT *
                                    FROM usuarios AS U
                                    WHERE U.usr_dni = '.$dni.'
                                    AND U.emp_id ='.$emp_id);
        return $query->row_array();
    }

    public function login($usuario, $clave)
    {
        if ($usuario === FALSE || $clave === FALSE)
        {
            return FALSE;
        }

        $query = $this->db->query('SELECT *
                                    FROM usuarios AS U
                                    WHERE U.usr_mail = "'.$usuario.'"
                                    AND U.usr_clave = "'.$clave.'"');
        return $query->row_array();
    }

    public function check_login()
    {
        if($this->session->userdata('usr_id') != "")
        {
            return TRUE;
        }
        return FALSE;
    }

    public function check_permisos($ut_id = FALSE, $class = FALSE, $method = FALSE)
    {
        if($ut_id === FALSE)
        {
            $ut_id = $this->session->userdata('ut_id');
        }
        if($class === FALSE)
        {
            $class = $this->router->fetch_class();
        }
        if($method === FALSE)
        {
            $method = $this->router->fetch_method();
        }

        if($this->check_login())
        {
            if($ut_id == SUPER_ADMIN)
            {
                return TRUE;
            }
            else
            {
                $query = $this->db->query('SELECT *
                                            FROM permisos AS P
                                            INNER JOIN paginas AS PA ON P.pag_id = PA.pag_id
                                            WHERE P.ut_id = '.$ut_id.'
                                            AND PA.pag_class LIKE "'.$class.'"
                                            AND PA.pag_method LIKE "'.$method.'"');
                $result = $query->row_array();
                if($result)
                {
                    return TRUE;
                }
            }
        }

        return FALSE;
    }

    public function set_item($emp_id, $nombre, $apellido, $mail, $usuario, $clave, $tipo, $telefono = NULL, $dni = NULL)
    {
        $data = array(
            'usr_id' => NULL,
            'emp_id' => $emp_id,
            'usr_nombre' => $nombre,
            'usr_apellido' => $apellido,
            'usr_clave' => $clave,
            'usr_mail' => $mail,
            'usr_usuario' => $usuario,
            'usr_fecha' => date('Y-m-d H:i:s'),
            'ut_id' => $tipo,
            'usr_telefono' => $telefono,
            'usr_dni' => $dni
        );

        $this->db->insert('usuarios', $data);
        return $this->db->insert_id();
    }

    public function update_item($usr_id, $nombre, $apellido, $mail, $usuario, $clave, $tipo)
    {
        $data = array(
            'usr_nombre' => $nombre,
            'usr_apellido' => $apellido,
            'usr_clave' => $clave,
            'usr_usuario' => $usuario,
            'usr_mail' => $mail,
            'ut_id' => $tipo
        );

        $this->db->where('usr_id', $usr_id);
        return $this->db->update('usuarios', $data);
    }

    public function delete_item($usr_id)
    {
        if ($usr_id === FALSE)
        {
            return FALSE;
        }

        $this->db->where('usr_id',$usr_id);
        return $this->db->delete('usuarios');
    }


    /***************
    TIPOS de USUARIO
    ***************/

    public function get_tipos($ut_id = FALSE)
    {
        if ($ut_id === FALSE)
        {
            $query = $this->db->query('SELECT *
                                        FROM usuarios_tipos AS UT');
            return $query->result_array();
        }

        $query = $this->db->query('SELECT *
                                    FROM usuarios_tipos AS UT
                                    WHERE UT.ut_id='.$ut_id);
        return $query->row_array();
    }

    public function get_tipos_inferiores($ut_id = FALSE)
    {
        if ($ut_id === FALSE)
        {
            $query = $this->db->query('SELECT *
                                        FROM usuarios_tipos AS UT
                                        WHERE UT.ut_id > '.$this->session->userdata('ut_id'));
            return $query->result_array();
        }

        $query = $this->db->query('SELECT *
                                    FROM usuarios_tipos AS UT
                                    WHERE UT.ut_id > '.$ut_id);
        return $query->result_array();
    }

    /***************
    TIPOS de USUARIO
    ***************/

    public function get_box_usuario($usr_id = FALSE)
    {
        if ($usr_id === FALSE)
        {
            return FALSE;
        }

        $query = $this->db->query('SELECT *
                                    FROM box AS B
                                    WHERE B.usr_id='.$usr_id);
        $result = $query->row_array();
        if(!$result)
        {
            $result = array('usr_id' => $usr_id, 'box_nombre' => "");
        }

        return $result;
    }

    public function set_box($usr_id, $box_nombre)
    {
        $data = array(
            'usr_id' => $usr_id,
            'box_nombre' => $box_nombre
        );

        return $this->db->insert('box', $data);
    }

    public function delete_box($usr_id)
    {
        if ($usr_id === FALSE)
        {
            return FALSE;
        }

        $this->db->where('usr_id',$usr_id);
        return $this->db->delete('box');
    }

    /*********************
    HORARIOS
    *********************/
    
    public function get_horarios($usr_id = FALSE)
    {
        if($usr_id === FALSE)
        {
            return FALSE;
        }

        $query = $this->db->query('SELECT *
                                    FROM usuarios_horarios AS G
                                    WHERE G.usr_id='.$usr_id.'
                                    ORDER BY G.uh_dia');
        return $query->result_array();
    }

    public function get_horario_x_dia($usr_id = FALSE, $dia = 0)
    {
        if($usr_id === FALSE)
        {
            return FALSE;
        }

        $query = $this->db->query('SELECT *
                                    FROM usuarios_horarios AS G
                                    WHERE G.usr_id='.$usr_id.'
                                    AND G.uh_dia='.$dia);
        return $query->result_array();
    }
    
    public function set_horario($usr_id, $dia = 0, $ini = "00:00:00", $fin = "00:00:00")
    {
        $data = array(
            'uh_id' => NULL,
            'usr_id' => $usr_id,
            'uh_dia' => $dia,
            'uh_hora_ini' => $ini,
            'uh_hora_fin' => $fin
        );

        $this->db->insert('usuarios_horarios', $data);
        return $this->db->insert_id();
    }

    public function update_horario($id, $ini = "00:00:00", $fin = "00:00:00")
    {
        $data = array(
            'ueh_hora_ini' => $ini,
            'ueh_hora_fin' => $fin
        );

        $this->db->where('uh_id',$id);
        return $this->db->update('usuarios_horarios', $data);
    }

    public function delete_horarios($id)
    {
        if ($id === FALSE)
        {
            return FALSE;
        }

        $this->db->where('usr_id',$id);
        return $this->db->delete('usuarios_horarios');
    }

}