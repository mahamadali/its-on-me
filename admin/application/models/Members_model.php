<?php
class Members_model extends CI_Model
{

     var $table = "members";  
    var $select_column = array("id","first_name","last_name", "email", "password","created_at","updated_at","deleted_at"); 
     public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    function make_query()  
      {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("first_name", $_POST["search"]["value"]);  
                $this->db->or_like("email", $_POST["search"]["value"]);  
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('id', 'DESC');  
           }  
      }  
      function make_datatables(){  
           $this->make_query();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
      function get_filtered_data(){  
           $this->make_query();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table);
           $this->db->order_by('id', 'DESC');   
           $query = $this->db->get();  
           return $query->result();    
      } 

     
      function get_mem_password($email)  
      {  
          $this->db->select("member_access_password");  
          $this->db->where('email', $email);
          $query = $this->db->get('admin');
          return $query->row()->member_access_password; 
      } 

      function getMemberInfo($id)  
      {  
          $this->db->select("*");  
          $this->db->where('id', $id);
          $query = $this->db->get('members');
          return $query->row(); 
      } 

       function getCountryName($id)  
      {  
          $this->db->select("name");  
          $this->db->where('id', $id);
          $query = $this->db->get('countries');
          return $query->row()->name; 
      } 

       function insert_data_getid($data, $tablename) {
        if ($this->db->insert($tablename, $data)) {
            return $this->db->insert_id();
        } else {
            return 0;
        }
      }
    function delete_data($tablename, $columnname, $columnid) {
        $this->db->where($columnname, $columnid);
        if ($this->db->delete($tablename)) {
            return true;
        } else {
            return false;
        }
    }

     function getOrderInfo($id)  
      {  
          $this->db->where('id', $id);
          $query = $this->db->get($this->table);
          return $query->row(); 
      } 

     function getMemberInvitation($memberId) {
        $this->db->where('member_id', $memberId);
          $query = $this->db->get('member_invites');
          return $query->num_rows();
    } 

    function getMemberActiveInvitation($memberId) {
            $this->db->where('member_id', $memberId);
            $this->db->where('is_created', 1);
          $query = $this->db->get('member_invites');
          return $query->num_rows();
    } 
}
