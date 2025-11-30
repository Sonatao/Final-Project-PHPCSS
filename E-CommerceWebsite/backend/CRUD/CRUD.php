<?php 

require_once ("../config.php");

// ^^^^^ Neccessary Imports Above Here ^^^^^

// Create Stuff Below 
class CRUD {
    private $connl;
    private $table_name="form_data";

    public function __construct($db){
        $this->conn = $db;
    }

    public function dataValidation($data) {
        $err = [];

        if(empty($data['name'])) {
            $err['name'] = "Name required.";
        } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $data['name'])) {
            $err['name'] = "Letters and white spaces only for Name.";
        }
    }
}

    if (empty($data['email'])) {
            $err['email'] = "Email is requires";
    } elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $ERR['email'] = "This is not a valid email format.";
    }

    



?>