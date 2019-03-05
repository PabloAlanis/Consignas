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
        //este query no mezcla los apellidos de responsable y de operador
        //$this->db->join('operario', 'trabajo.operadorTrabajo = operario.idOperario' , 'trabajo.responsableTrabajo = operario.idOperario' );
        //$this->db->order_by('idTrabajo', 'desc');
        //return $this->db->get('trabajo')->result_array();
        //este query no mezcla los apellidos de responsable y de operador
        /*$query='SELECT trabajo.idLinea,trabajo.descripcionTrabajo,trabajo.responsableTrabajo,trabajo.operadorTrabajo, trabajo.idTrabajo,trabajo.horaInicioTrabajo,trabajo.horaFinTrabajo,trabajo.idConsigna,a1.apellidoOperario AS responsable,a1.nombreOperario AS nombreResponsable,a2.apellidoOperario,a2.nombreOperario from trabajo INNER JOIN operario a1 ON a1.idOperario = trabajo.responsableTrabajo INNER JOIN operario a2 ON a2.idOperario = trabajo.operadorTrabajo ORDER BY trabajo.horaInicioTrabajo DESC';*/
        
        $query='SELECT trabajo.idLinea,trabajo.descripcionTrabajo,trabajo.responsableTrabajo,trabajo.operadorTrabajo, trabajo.idTrabajo,trabajo.horaInicioTrabajo,trabajo.horaFinTrabajo,trabajo.idConsigna,a1.apellidoOperario AS responsable,a1.nombreOperario AS nombreResponsable,a2.apellidoOperario,a2.nombreOperario,a3.abreviLinea AS abreviLinea from trabajo INNER JOIN operario a1 ON a1.idOperario = trabajo.responsableTrabajo INNER JOIN operario a2 ON a2.idOperario = trabajo.operadorTrabajo INNER JOIN linea a3 ON trabajo.idLinea=a3.idLinea ORDER BY trabajo.horaInicioTrabajo DESC';
        return $this->db->query($query)->result_array();
    }
    
    //este query lista los trabajos abiertos
    function get_all_trabajo_abiertos()
    {
        $query='SELECT trabajo.idLinea,trabajo.descripcionTrabajo,trabajo.responsableTrabajo,trabajo.operadorTrabajo, trabajo.idTrabajo,trabajo.horaInicioTrabajo,trabajo.horaFinTrabajo,trabajo.idConsigna,a1.apellidoOperario AS responsable,a1.nombreOperario AS nombreResponsable,a2.apellidoOperario,a2.nombreOperario,a3.abreviLinea AS abreviLinea from trabajo INNER JOIN operario a1 ON a1.idOperario = trabajo.responsableTrabajo INNER JOIN operario a2 ON a2.idOperario = trabajo.operadorTrabajo INNER JOIN linea a3 ON trabajo.idLinea=a3.idLinea WHERE horaFinTrabajo IS NULL ORDER BY trabajo.horaInicioTrabajo DESC';
        return $this->db->query($query)->result_array();
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
    
    function contar_cerrados(){
        $this->db->where('horaFinTrabajo IS NOT NULL', NULL, FALSE);
        return $this->db->from('trabajo')->count_all_results();
    }
    
    function contar_anio(){
        $first_date=date("Y").'-01-01 00:00:00';
        $second_date=date("Y").'-12-31 00:00:00';
        $this->db->where('horaInicioTrabajo >=', $first_date);
        $this->db->where('horaInicioTrabajo <=', $second_date);
        return $this->db->from('trabajo')->count_all_results();
    }
}