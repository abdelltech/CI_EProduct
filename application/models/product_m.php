<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product_m extends CI_Model {

    function createProduct($data){
        return $this->db->insert("t_product", $data);
    }
    
	public function readProducts()
	{
        $this->db->select('*');
        $this->db->from('t_product p');
        $this->db->join('t_category t', 'p.idCategory=t.idCategory');

        $query = $this->db->get();
        return $query->result();
	}

    public function readProductById($id){
        return $this->db->get_where('t_product', array('idProduct' => $id), 1, 0)->row_array();
    }

    function updateProductById($id, $data){
        
        $this->db->where("idProduct", $id);
        $this->db->update("t_product", $data);

       /*$this->db->update('t_product', $data, array('idProduct' => $id));

        
        $sql = "UPDATE t_product
                SET nom = \"".$data['nom']."\",prix =\"".$data['prix']."\" ,idCategory= \"".$data['idCategory']."\"
                , quantite = \"".$data['quantite']."\", photo = \"".$data['photo']."\" WHERE idProduct = $id ;";
                $this->db->query($sql);*/
    }

    function deleteProductById($id){
        $this->db->delete("t_product", array("idProduct" => $id));
    }

    function getTypeProductDropdown(){
        $result = $this->db->from("t_category")->order_by('idCategory')->get();
        $rtrn = array();
        if($result->num_rows() > 0){
            $rtrn[''] = 'Select product type';
            foreach($result->result_array() as $row){
                $rtrn[$row['idCategory']] = $row['labelCategory'];
            }
        }
        return $rtrn;
    }

}