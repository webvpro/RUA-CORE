 <?php  
    class Lm_list_items extends CI_Model {  
      
        function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
      
       function getLmListItems()  
           {  
               //Query the data table for every record and row  
               $query = $this->db->get('lm_list_items');  
     
               if ($query->num_rows() > 0)  
               {  
                   //show_error('Database is empty!');  
               }else{  
                   return $query->result();  
               }  
           }  
     
   }  
 ?>  