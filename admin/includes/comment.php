<?php

class Comment extends db_object
{
   
    public $photo_id;
    public $author;
    public $body;
  
    function __construct()
    {
        parent::__construct();
        $this->db_table = "comments";
        $this->db_table_fields = array('id','photo_id','author','body');
    }


    public function find_the_comments($photo_id){

        $sql= "SELECT * FROM ".$this->db_table." WHERE photo_id = ".$this->db->escape_string($photo_id)." ORDER BY photo_id ASC";
        return $this->find_this_query($sql);
    }

}//End of Class Comment

?>