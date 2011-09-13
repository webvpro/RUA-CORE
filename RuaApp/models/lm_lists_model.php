   <?php  
   class Lm_lists_model extends CI_Model {

    function Lm_lists_model()
    {
        parent::CI_Model();
    }

      
       function getLmLists(){ 
                      //Query the data table for every record and row  
               $query = $this->db->get('lm_lists');  
               return $query->result();  
                 
           }  
     
   }  
 ?>  