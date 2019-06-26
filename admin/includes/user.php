<?php

class User extends db_object
{
   
    public $first_name;
    public $username;
    public $last_name;
    public $password;
    public $user_image;


    public $tmp_path;
    public $upload_directory ="images";
    public $image_placeholder = "http://placehold.it/400x400&text=image";
    public $errors = array();
    public $upload_errors_array = array(
            UPLOAD_ERR_OK =>"There is no error ",
            UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload_max_filesize",
            UPLOAD_ERR_FORM_SIZE => "The uploaded file exceed the MAX_FILE_SIZE directive",
            UPLOAD_ERR_PARTIAL => "The uploaded file was only partially uploaded.",
            UPLOAD_ERR_NO_FILE => "No file was uploaded",
            UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder",
            UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk",
            UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload"


    );

    function __construct()
    {
        parent::__construct();
        $this->db_table = "users";
        $this->db_table_fields = array('username','password','first_name','last_name','user_image');
    }

   public function user_image_place(){
      return empty($this->user_image) ? $this->image_placeholder : 'includes'.DS.$this->upload_directory.DS.$this->user_image; 
   }

    public function set_file($file)
    {
        if (empty($file)) {
            $this->errors[] = "There was no file uploaded here";
            return false;
        } elseif ($file['error'] != 0) {
            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;
        } else {
            $this->user_image = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
        }
    }

    public function upload_photo(){
    
            if(!empty($this->errors)){
                return false;
            }

            if(empty($this->user_image)||empty($this->tmp_path)){
                $this->errors[] = "the file was not available";
                return false;
            }

            $target_path =INCLUDES_PATH.DS.$this->upload_directory.DS.$this->user_image;

            if(file_exists($target_path)){
                $this->errors[] ="The file {$this->user_image}already exits";
                return false;
            }
            if(move_uploaded_file($this->tmp_path,$target_path)){
                
                    unset($this->tmp_path);
                    return true;
            }else{
                $this->errors[] ="the file dir was not permission";
                return false;
            }
        
    }

    public function verify_user($username,$password){
        $username = $this->db->escape_string($username);
        $password = $this->db->escape_string($password);
        $sql = "SELECT * FROM ".$this->db_table." WHERE username ='{$username}' AND password ='{$password}'";
        $result = $this->find_this_query($sql);
        return !empty($result) ? array_shift($result) : false;
    }

    


}//End of Class User

?>