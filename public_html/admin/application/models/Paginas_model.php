<?php
class Paginas_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

    public function get_items($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->query('SELECT *
                                        FROM paginas AS P
                                        WHERE P.pag_padre IS NULL
                                        AND P.pag_visible = 1
                                        ORDER BY P.pag_orden');
            return $query->result_array();
        }

        $query = $this->db->query('SELECT *
                                    FROM paginas AS P
                                    WHERE P.pag_id = '.$id);
        return $query->row_array();
    }

    public function get_subitems($id = FALSE)
    {
        if ($id === FALSE)
        {
            return FALSE;
        }

        $query = $this->db->query('SELECT *
                                    FROM paginas AS P
                                    WHERE P.pag_padre = '.$id.'
                                    AND P.pag_visible = 1
                                    ORDER BY P.pag_orden');
        return $query->result_array();
    }

}