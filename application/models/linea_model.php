<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Linea_model extends CI_Model {

        public function __construct()
	{
        parent::__construct();
        
	}

        public function get_lineas()
        {
        return $this->db->get('linea')->result_array();
        }

        /*
     * Get linea by idLinea
     */
    function get_linea($idLinea)
    {
        return $this->db->get_where('linea',array('idLinea'=>$idLinea))->row_array();
    }
        
    /*
     * Get all linea
     */
    function get_all_linea()
    {
        $this->db->order_by('idLinea', 'desc');
        return $this->db->get('linea')->result_array();
    }
        
    /*
     * function to add new linea
     */
    function add_linea($params)
    {
        $this->db->insert('linea',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update linea
     */
    function update_linea($idLinea,$params)
    {
        $this->db->where('idLinea',$idLinea);
        return $this->db->update('linea',$params);
    }
    
    /*
     * function to delete linea
     */
    function delete_linea($idLinea)
    {
        return $this->db->delete('linea',array('idLinea'=>$idLinea));
    }
    
    function count_linea()
    {
        return $this->db->from('linea')->count_all_results();
    }

}