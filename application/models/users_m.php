<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_m extends CI_Model {

    public function createMembre($data){
      //   return $this->db->insert("t_membre", $data);
        $sql = "INSERT INTO t_membre VALUES (NULL, \"".$data['login']."\", \"".$data['email']."\", \"".$data['pass']."\", 1) ;";

        $this->db->query($sql);
    }


    public function readMembreById($id){
        return $this->db->get_where('t_membre', array('id' => $id), 1, 0)->row_array();
    }

    
   /* public function getUser(){
        return $this->db->select('id')->from('t_membre')->where('id', 2);
    }*/


    public function updateAccountById($id, $data){

        $this->db->where("id", $id);
        $this->db->update("t_membre", $data);

        return true;
    }


    public function verif_connexion($data)
    {
        $sql = "SELECT *
                FROM t_membre
                WHERE login=\"".$data['login']."\" and pass=\"".$data['pass']."\";";

        $query=$this->db->query($sql);
        if($query->num_rows()==1)
        {
            $row=$query->result_array();
            $data_resultat=$row[0];
            return $data_resultat;
        }
        else
            return false;
    }

    public function verif_email($email)
    {
        $sql = "SELECT email
                FROM t_membre
                WHERE email=\"".$email."\";";

        $query=$this->db->query($sql);
        if($query->num_rows()>=1)
            return true;
        else
            return false;
    }

    public function verif_login($login){
        $sql = "SELECT login
                FROM t_membre 
                WHERE login=\"".$login."\";";

        $query=$this->db->query($sql);
        if($query->num_rows()>=1)
            return true;
        else
            return false;
    }


}