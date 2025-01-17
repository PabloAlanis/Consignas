<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Consigna_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
     /*
     * Get consigna by idConsigna
     */
    function get_consigna($idConsigna)
    {
        return $this->db->get_where('consigna',array('idConsigna'=>$idConsigna))->row_array();
    }
        
    /*
     * Get all consigna
     */
    function get_all_consigna()
    {
        $this->db->order_by('idConsigna', 'desc');
        return $this->db->get('consigna')->result_array();
    }
        
    /*
     * function to add new consigna
     */
    function add_consigna($params)
    {
        $this->db->insert('consigna',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update consigna
     */
    function update_consigna($idConsigna,$params)
    {
        $this->db->where('idConsigna',$idConsigna);
        return $this->db->update('consigna',$params);
    }
    
    /*
     * function to delete consigna
     */
    function delete_consigna($idConsigna)
    {
        return $this->db->delete('consigna',array('idConsigna'=>$idConsigna));
    }
    
    function contar_consignas(){
        return $this->db->from('consigna')->count_all_results();
    }
    
    function contar_consigna_abiertos(){
        $this->db->where('horaFinConsigna',null);
        return $this->db->from('consigna')->count_all_results();
    }
    
    //obtiene de la BD todas las consignas abiertas
    function get_all_consigna_abiertas()
    {
        $this->db->where('horaFinConsigna',null);
        $this->db->order_by('idConsigna', 'desc');
        return $this->db->get('consigna')->result_array();
    }
    
    function contar_cerrados(){
        $this->db->where('horaFinConsigna IS NOT NULL', NULL, FALSE);
        return $this->db->from('consigna')->count_all_results();
    }
    
    function contar_anio(){
        $first_date=date("Y").'-01-01 00:00:00';
        $second_date=date("Y").'-12-31 00:00:00';
        $this->db->where('horaInicioConsigna >=', $first_date);
        $this->db->where('horaInicioConsigna <=', $second_date);
        return $this->db->from('consigna')->count_all_results();
    }
}