<?php
class Photo extends db_object
{

    public $title;
    public $description;
    public $filename;
    public $type;
    public $size;
    public $caption;
    public $alternate_text;

    public $tmp_path;
    public $upload_directory="images";
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
        $this->db_table = "photos";
        $this->db_table_fields = array('title','description','filename','type','size','caption','alternate_text');
    }

    public function set_file($file){
        if(empty($file)){
            $this->errors[] ="There was no file uploaded here";
            return false;
        }elseif($file['error']!=0){
            $this->errors[] = $this->uploads_errors_array[$file['error']];
            return false;
        }else{
            $this->filename = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type = $file['type'];
            $this->size = $file['size'];
        }
    }

    public function picture_path(){
        return 'includes'.DS.$this->upload_directory.DS.$this->filename;
    }

    public function save(){
        if($this->id){
            $this->update();
        }else{
            if(!empty($this->errors)){
                return false;
            }

            if(empty($this->filename)||empty($this->tmp_path)){
                $this->errors[] = "the file was not available";
                return false;
            }

            $target_path =INCLUDES_PATH.DS.$this->upload_directory.DS.$this->filename;

            if(file_exists($target_path)){
                $this->errors[] ="The file {$this->filename}already exits";
                return false;
            }
            if(move_uploaded_file($this->tmp_path,$target_path)){
                if($this->create()){
                    unset($this->tmp_path);
                    return true;
                }
            }else{
                $this->errors[] ="the file dir was not permission";
                return false;
            }
        
        }


    }

    public function delete_photo (){

        if($this->delete()){
            $target_path =INCLUDES_PATH.DS.$this->upload_directory.DS.$this->filename;
            return unlink($target_path) ? true :false;
        }
    }

}//End of Photo class 


?>