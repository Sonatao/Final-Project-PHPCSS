<?php 

require_once ("../config.php");

// ^^^^^ Neccessary Imports Above Here ^^^^^

// Create Stuff Below 
class CRUD {
    private $conn;
    private $table_name="form_data";

    public function __construct($db){
        $this->conn = $db;
    }

    # Basic validation for the actual input from the registration and login formns for the name and email, and password. 
    public function dataValidation($data) {
        $err = [];

        if(empty($data['name'])) {
            $err['name'] = "Name required.";
        } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $data['name'])) {
            $err['name'] = "Letters and white spaces only for Name.";
        }


    if (empty($data['email'])) {
            $err['email'] = "Email is requires";
    } elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $ERR['email'] = "This is not a valid email format.";
    }

    return $err;
}

    public function create($data) {
        $validation_errors = $this->dataValidation($data);
        if(!empty($validation_errors)) {
            return ['success' => false, 'errors' => $validation_errors];
        }

        # Prepared Statements first, for database security.

        $query = "'INSERT INTO' . $this->table_name . SET name=:name, email=:email, password=:password";

        $stmt = $this->conn->prepare($query);


        # 2nd part of proccess, sanitization

        $name = htmlspecialchars(strip_tags($data['name']));
        $email = htmlspecialchars(strip_tags($data['email']));
        $password = htmlspecialchars(strip_tags($data['password']));
        
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        if($stmt->execute()){
            return ['success' => true, 'message' => 'Item Created Successfully'];
            }
        return ['success' => false, 'message' => 'Failed to create item.'];
        }

        # Now the skeleton for the Read Operation
        public function readAll() {
            # Going to keep this basic, and just have it be read in order of ID, so it wont be variable or anything but it will show.
             $query = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC";
             $stmt = $this->conn->prepare($query);
             $stmt->execute();

             return $stmt;
        }

        #Preps for the Update function.
        public function readOne($id) {
            $query = "SELECT * FROM" . $this->table_name . "WHERE id = ?";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(1, $id);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            return $row;
        }

        
}
       



