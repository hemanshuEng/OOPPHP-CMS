<?php
class db_object{
    protected $db_table ="data";
    protected $db;
    public $id;
    protected $db_table_fields = array();
    function __construct()
    {
        $this->db = new Database();
    }
    public function find_all()
    {

        return $this->find_this_query("SELECT * FROM ".$this->db_table." ");
    }


    public function find_by_id($id)
    {
       return  $this->find_this_query_id("SELECT * FROM ".$this->db_table." WHERE id = $id LIMIT 1");
       
    }

    public function find_this_query($sql){
        $result_set =$this->db->query($sql);
        $object_array =array();
         while($row = mysqli_fetch_array($result_set)){
             $object_array[]= $this->instantiation($row);
        }

         return $object_array;

    }
    public function find_this_query_id($sql){
        $result_set =$this->db->query($sql);
        $object = $this->instantiation(mysqli_fetch_array($result_set));
        return $object;

    }

    public function instantiation($found_user)
    {
        $object = new $this;

        foreach($found_user as $the_attribute => $value){
            if($object->has_the_attribute($the_attribute)){
                $object->$the_attribute =$value;
            }
        }
        return $object;

    }

    private function has_the_attribute($the_attribute){
        $object_properties = get_object_vars($this);
        return array_key_exists($the_attribute,$object_properties);
    }

    
    public function properties(){
        $properties = array();
        foreach($this->db_table_fields as $db_field ){
            if(property_exists($this,$db_field)){
                $properties[$db_field] = $this->db->escape_string($this->$db_field);
            }
        }
        return $properties;
    }


    public function create(){

        $sql = "INSERT INTO ".$this->db_table."(". implode(",",array_keys($this->properties())) .") VALUES ('".implode("','",array_values($this->properties()))."')";
        if($this->db->query($sql)){
            $this->id = $this->db->insert();
            return true;
        }else{
            return false;
        }
    
    }

    public function update(){
        $properties_pairs = array();
        foreach($this->properties() as $key =>$value){
          $properties_pair[] = "{$key}='{$value}'";     
        }
        $sql = "UPDATE ".$this->db_table." SET ";
        $sql .= implode(",",$properties_pair);
        $sql .= " WHERE id = ".$this->db->escape_string($this->id);
        $this->db->query($sql);

        return (mysqli_affected_rows($this->db->connection)==1)?true:false;


    }

    public function delete(){
        $sql = "DELETE FROM ".$this->db_table." ";
        $sql.= "WHERE id= ".$this->db->escape_string($this->id);
        $sql.= " LIMIT 1";
        $this->db->query($sql);
        return (mysqli_affected_rows($this->db->connection)==1)?true:false;

    }

    public function count_all(){
        $sql= "SELECT COUNT(*) FROM ".$this->db_table;
        $result = $this->db->query($sql);
        $row = mysqli_fetch_array($result);
        return array_shift($row);
        }


}


?>