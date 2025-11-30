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
        $err['email'] = "This is not a valid email format.";
        }

        if(empty($data['password'])) {
            $err['password'] = "Password is required.";
        } elseif(!preg_match("/[A-Za-z]+/d{5}/", $data['password'] )) {
            $err['password'] = "Password must have atleast 5 digits.";
        }

        if(empty($data['repeatPassword'])) {
            $err['repeatPassword'] = "Please repeat password.";
        } elseif($data['repeatPassword'] != $data['password']) {
            $err['repeatPassword'] = "Password does not match. Please try again.";
        }

    return $err;
}

    public function register($data) {
        $validation_errors = $this->dataValidation($data);
        if(!empty($validation_errors)) {
            return ['success' => false, 'errors' => $validation_errors];
        }

        # Prepared Statements first, for database security.
        $query = "INSERT INTO . $this->table_name . SET name=:name, email=:email, password=:password";
        $stmt = $this->conn->prepare($query);


        # 2nd part of proccess, sanitization

        $name = htmlspecialchars(strip_tags($data['name']));
        $email = htmlspecialchars(strip_tags($data['email']));
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        if($stmt->execute()){
            return ['success' => true, 'message' => 'Item Created Successfully'];
            }
        return ['success' => false, 'message' => 'Failed to create item.'];
        }

        public function login($data) {
            $err = [];

            if(empty($data['email'])) {
                $err['email'] = "Email is required.";
            } elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $err['email'] = "Invalid email.";
            }

            if(empty($data['password'])) {
                $err['password'] = "Password is required.";
            } 

            if(!empty($err)) {
                return['success' => false, 'errors' => $err];
            }

            #Now we query the database for the user to see if they even exist etc.

            $query = "SELECT id, name, email, password, role FROM " . $this->table_name . " WHERE email=:email LIMIT 1";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":email", $data['email']);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if($user) {
                # Password work.

                if (password_verify($data['password'], $user['password'])) {
                    session_start();
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['name'] = $user['name'];
                    $_SESSION['role'] = $user['role'];

                    return ['succcess' => true, 'message' => 'Login Successful'];
                } else {
                    return['success' => false, 'error' => ['password' => 'Inccorect Password.']];
                }
            } else {
                return ['success' => false, 'error' => ['email' => 'Account does not exist']];
            }
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

        public function update($id, $data) {
            $validation_errors = $this->dataValidation($data);
            if(!empty($validation_errors)){
                return ['success' => false, 'errors' => $validation_errors];
            }

            $query = " UPDATE " . $this->table_name . " SET name=:name, email=:email WHERE id = :id";

            $stmt = $this->conn->prepare($query);

            $name = htmlspecialchars(strip_tags($data['name']));
            $email = htmlspecialchars(strip_tags($data['email']));
            $description = htmlspecialchars(strip_tags($data['description']));

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':description', $description);

            if($stmt->execute()) {

                if($stmt->rowCount() > 0) {
                    return ['success' => true, 'message' => "Update Complete."];
                }
                return ['success' => false, 'message' => "Update completed with no change."];
            }
            return ['success' => false, 'message' => 'Failed to update database.'];
        }

        public function delete($id) {
            $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

            $stmt = $this->conn->prepare($query);

            $sanitziedId = htmlspecialchars(strip_tags($id));
            $stmt->bindParam(1, $sanitziedId);

            if($stmt->execute()) {
                return ['success' => true, 'message' => 'Product deleted.'];
            }
            return ['success' => false, 'message' => 'Product not found or already deleted.'];
        }
}
       



