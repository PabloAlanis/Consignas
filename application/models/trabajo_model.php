<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Trabajo_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get trabajo by idTrabajo
     */
    function get_trabajo($idTrabajo)
    {
        return $this->db->get_where('trabajo',array('idTrabajo'=>$idTrabajo))->row_array();
    }
        
    /*
     * Get all trabajo
     */
    function get_all_trabajo()
    {
        $this->db->join('operario', 'trabajo.operadorTrabajo = operario.idOperario');
        $this->db->order_by('idTrabajo', 'desc');
        return $this->db->get('trabajo')->result_array();
    }
        
    /*
     * function to add new trabajo
     */
    function add_trabajo($params)
    {
        $this->db->insert('trabajo',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update trabajo
     */
    function update_trabajo($idTrabajo,$params)
    {
        $this->db->where('idTrabajo',$idTrabajo);
        return $this->db->update('trabajo',$params);
    }
    
    /*
     * function to delete trabajo
     */
    function delete_trabajo($idTrabajo)
    {
        return $this->db->delete('trabajo',array('idTrabajo'=>$idTrabajo));
    }
    
    function contar_trabajos(){
        return $this->db->from('trabajo')->count_all_results();
    }
    
    function contar_trabajos_abiertos(){
        $this->db->where('horaFinTrabajo',null);
        return $this->db->from('trabajo')->count_all_results();
    }
}