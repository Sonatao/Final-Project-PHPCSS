<?php 

require_once(__DIR__ . "/config.php");
// ^^^^^ Neccessary Imports Above Here ^^^^^

// Create Stuff Below 
class CRUD {
    private $conn;
    private $table_name="Users";

    public function __construct($db){
        $this->conn = $db;
    }

    # Basic validation for the actual input from the registration and login formns for the name and email, and password. 
    public function dataValidation($data) {
        echo "DataValidation Reached";
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
        } elseif(strlen($data['password']) < 5) {
            $err['password'] = "Password must have atleast 5 digits.";
        }

        if(empty($data['repeatPassword'])) {
            $err['repeatPassword'] = "Please repeat password.";
        } elseif($data['repeatPassword'] != $data['password']) {
            $err['repeatPassword'] = "Password does not match. Please try again.";
        }

    return $err;
}

// ---------- Functions for Create, REGISTER, LOGIN, CREATEPRODCUT ----------
// ----- Register Below ------
    public function register($data) {
        echo "Registration Reached";
        $validation_errors = $this->dataValidation($data);
        if(!empty($validation_errors)) {
            return ['success' => false, 'error' => $validation_errors];
        }

        # Prepared Statements first, for database security.
        $query = "INSERT INTO " . $this->table_name . "(user_Name, user_Email, user_Password, role) VALUES (:name, :email, :password, :role)";
        $stmt = $this->conn->prepare($query);


        # 2nd part of proccess, sanitization

        $name = htmlspecialchars(strip_tags($data['name']));
        $email = htmlspecialchars(strip_tags($data['email']));
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $role = isset($data['role']) ? $data['role'] : 'customer';
        
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role', $role);

        if($stmt->execute()){
            return ['success' => true, 'message' => 'User Created Successfully'];
            }
        return ['success' => false, 'message' => 'Failed to create user.'];
        }


// ------ Login Below ------

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
                return['success' => false, 'error' => $err];
            }

            #Now we query the database for the user to see if they even exist etc.

            $query = "SELECT user_Id, user_Name, user_Email, user_Password, role FROM " . $this->table_name . " WHERE user_Email=:email LIMIT 1";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":email", $data['email']);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if($user) {
                # Password work.

                if (password_verify($data['password'], $user['user_Password'])) {
                    session_start();
                    $_SESSION['user_id'] = $user['user_Id'];
                    $_SESSION['user_name'] = $user['user_Name'];
                    $_SESSION['role'] = $user['role'];

                    # Added an extra C here and in testing it wouldnt bloody work TT
                    return ['success' => true, 'message' => 'Login Successful'];
                } else {
                    return['success' => false, 'error' => ['password' => 'Inccorect Password.']];
                }
            } else {
                return ['success' => false, 'error' => ['email' => 'Account does not exist']];
            }
        } 
        
        public function createProduct($data) {

            if($_SESSION['role'] != 'admin') {
                return ['success' => false, 'message' => 'Access Denied.'];
                }
            # This final parenthsis is beyond a great nuisance after purchase_Date.
                $query = "INSERT INTO Products
                 (product_Name, product_Price, product_Description, product_Quantity, purchase_Date, product_Image)
                VALUES (:name, :price, :description, :quantity, CURDATE(), :image";
                $stmt = $this->conn->prepare($query);

                # Deep clean time.

                $name = htmlspecialchars(strip_tags($data['product_Name']));
                $price = htmlspecialchars(strip_tags($data['product_Price']));
                $quantity = htmlspecialchars(strip_tags($data['product_Quantity']));
                $description = htmlspecialchars(strip_tags($data['product_Description']));

                // Image validation.

                $imagePath = null;

                if(isset($_FILES['product_Image']) && $_FILES['product_Image']['error'] === UPLOAD_ERR_OK){
                    $allowedTypes = ['image/jpeg', 'image/png'];
                    $fileType = mime_content_type($_FILES['product_Image']['tmp_name']);
                    $fileExt = strtolower(pathinfo($_FILES['product_Image']['name'], PATHINFO_EXTENSION));

                    if(!in_array($fileType, $allowedTypes) || !in_array(($fileExt, ['jpg', 'jpeg', 'png']))) {
                        return['success' => false, 'message' => 'Invalid Image Type. Use only jpg, jpeg or png.'];
                    }

                    // Upload place, keep it in a variable so it isnt exposed if someone tries to follow the file path or smth like that.
                    $uploadDir = __DIR__ . "/../../assets(temp)";
                    if(!is_dir($uploadDir)) {
                        mkdir($uploadDir, 077, true);
                    }

                    // Create a unique file name, so as not to tear my hair out.
                    $fileName = uniqid("product_", true) . "." . $fileExt;
                    $targetFile = $uploadDir . $fileName;

                    if(move_uploaded_file($_FILES['product_Image']['tmp_name', $targetFile])) {
                        $imagePath = "/Final Project PHPCSS/E-CommerceWebsite/assets(temp)" . $fileName;
                    } else {
                        return['success' => false, 'message' => "The image upload failed."];
                    }
                }

                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':price', $price);
                $stmt->bindParam(':quantity', $quantity);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':image', $imagePath);

                if($stmt->execute()){
                    return['success' => true, 'message' => 'Product created.'];
                }
                return['success' => false, 'message' => 'Product failed to create. Seek technician.'];
            }

// ---------- ^^^^^^^ Registration, Login, CreateProduct Complete. ^^^^^^^^----------


// ---------- Functions that use READ in CRUD Below ----------

        # Now the skeleton for the Read Operation
        public function readAll() {
            # Going to keep this basic, and just have it be read in order of ID, so it wont be variable or anything but it will show.
             $query = "SELECT * FROM " . $this->table_name . " ORDER BY prodcut_Id DESC";
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

// ---------- ^^^^^^^ READ FUNCTION ABOVE ^^^^^^^^ ----------


// ---------- Functions for uPDATING BELOW ----------

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
// ---------- ^^^^^^ Update Function Above ^^^^^^ ----------


// ---------- Functions for Delete Below!  ----------
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
    // ----------------- Temporary Controller for From Submissions  -------------------------   
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        require_once(__DIR__ . "/config.php");
        $database = new Database();
        $db = $database->getConnection();
        $crud = new CRUD($db);

        if(isset($_POST['action'])) {
            switch ($_POST['action']) {
                case 'create':
                    $result = $crud->createProduct($_POST);
                    break;
                case 'update':
                    $result = $crud->updateProduct($_POST);
                    break;
                case 'delete':
                    $result = $crud->deleteProduct($_POST);
                    break;
                case 'register':
                    $result = $crud->register($_POST);
                    if($result['success']) {
                        header("Location: ../../frontend/pages/login.php");
                        exit;
                    }
                    break;
                case 'login':
                    $result = $crud->login($_POST);
                    if($result['success']){
                        header("Location: ../../frontend/pages/home.php");
                        exit;
                    }
                    break;
                default:
                    $result = ['success' => false, 'message' => 'What did you even do?'];
             }
             echo $result['message'];
        }
        
    }

    

