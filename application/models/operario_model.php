<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operario_model extends CI_Model {

        public function __construct()
	{
        parent::__construct();
        
	}
    
        public function get_operaradores_ion(){
          $query="SELECT * FROM users";
          return $this->db->query($query)->result_array();
        }

        public function get_operarios()
        {
        return $this->db->get('operario')->result_array();
        }
    
            /*
         * Get operario by idOperario
         */
        function get_operario($idOperario)
        {
            return $this->db->get_where('operario',array('idOperario'=>$idOperario))->row_array();
        }

        /*
         * Get all operario
         */
        function get_all_operario()
        {
            $this->db->order_by('idOperario', 'desc');
            return $this->db->get('operario')->result_array();
        }

        /*
         * function to add new operario
         */
        function add_operario($params)
        {
            $this->db->insert('operario',$params);
            return $this->db->insert_id();
        }

        /*
         * function to update operario
         */
        function update_operario($idOperario,$params)
        {
            $this->db->where('idOperario',$idOperario);
            return $this->db->update('operario',$params);
        }

        /*
         * function to delete operario
         */
        function delete_operario($idOperario)
        {
            return $this->db->delete('operario',array('idOperario'=>$idOperario));
        }
    
        function count_operario()
        {
            return $this->db->from('operario')->count_all_results();
        }
    
}