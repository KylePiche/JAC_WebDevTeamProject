<?php 

    class Favorite{
        // Database variables
        private $conn;
        private $table = 'favorites';

        // Properties
        public $id;
        public $listID;
        public $userID;
        public $username;
        public $productID;
        public $productName;
        public $dateAdded;

        // Constructor
        public function __construct($db) {
            $this->conn = $db;
        }

        // GET MULTIPLE
        public function read(){
            $query = 'SELECT f.id as id, f.listID as listID, fl.userID as userID, u.userName as username,
                            f.productID as productID, p.productName as productName, f.dateAdded as dateAdded 
                            FROM ' . $this->table . ' f
                            LEFT JOIN products p ON f.productID = p.id
                            LEFT JOIN favorite_lists fl ON f.listID = fl.id
                            LEFT JOIN users u ON fl.userID = u.id';

            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        // GET SINGLE
        public function read_single(){
            $query = 'SELECT f.id as id, f.listID as listID, fl.userID as userID, u.userName as username,
                            f.productID as productID, p.productName as productName, f.dateAdded as dateAdded 
                            FROM ' . $this->table . ' f
                            LEFT JOIN products p ON f.productID = p.id
                            LEFT JOIN favorite_lists fl ON f.listID = fl.id
                            LEFT JOIN users u ON fl.userID = u.id
                            LEFT JOIN spec_screen sc ON p.screenID = sc.id
                            WHERE f.id = ? LIMIT 0,1';

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->id = $row['id'];
            $this->listID = $row['listID'];
            $this->userID = $row['userID'];
            $this->username = $row['username'];
            $this->productID = $row['productID'];
            $this->productName = $row['productName'];
            $this->dateAdded = $row['dateAdded'];
        }

        // CREATE
        public function create(){
            $query = 'INSERT INTO ' . $this->table . ' (listID, productID) VALUES (:listID, :productID)';
            
            $stmt = $this->conn->prepare($query);
            // Clean data
            $this->listID = htmlspecialchars(strip_tags($this->listID));
            $this->productID = htmlspecialchars(strip_tags($this->productID));

            // Bind data
            $stmt->bindParam(':listID', $this->listID);
            $stmt->bindParam(':productID', $this->productID);

            if ($stmt->execute()) {
                return true;
            }
            printf("Error: %s.\n", $stmt->error);

            return false;
            }

        // UPDATE
        public function update(){
            $query = 'UPDATE ' . $this->table . ' SET listID=:listID, productID=:productID WHERE id=:id';

            $stmt = $this->conn->prepare($query);
            // Clean data
            $this->listID = htmlspecialchars(strip_tags($this->listID));
            $this->productID = htmlspecialchars(strip_tags($this->productID));
            $this->id = htmlspecialchars(strip_tags($this->id));

            // Bind data
            $stmt->bindParam(':listID', $this->listID);
            $stmt->bindParam(':productID', $this->productID);
            $stmt->bindParam(':id', $this->id);

            // Execute query
            if ($stmt->execute()) {
            return true;
            }

            // Print error if something goes wrong
            printf("Error: %s.\n", $stmt->error);

            return false;
        }

        // DELETE
        public function delete(){
            $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

            $stmt = $this->conn->prepare($query);

            $this->id = htmlspecialchars(strip_tags($this->id));
            
            $stmt->bindParam(':id', $this->id);

            if($stmt->execute()){
                return true;
            }

            printf("Error: %s.\n", $stmt->error);
            return false;
        }
    }

?>