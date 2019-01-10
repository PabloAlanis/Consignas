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

        /*public function insert_entry()
        {
                $this->title    = $_POST['title']; // please read the below note
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->insert('entries', $this);
        }

        public function update_entry()
        {
                $this->title    = $_POST['title'];
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->update('entries', $this, array('id' => $_POST['id']));
        }*/

}