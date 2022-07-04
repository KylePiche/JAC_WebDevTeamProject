<?php 

    class Order{
        // Database variables
        private $conn;
        private $table = 'orders';

        // Properties

        public $id;
        public $userID;
        public $productID; //From order details
        public $quantity;   //Also from order details
        public $status;

        // Constructor
        public function __construct($db) {
            $this->conn = $db;
        }

        // GET MULTIPLE
        public function read(){
            // Create query
            $query = 'SELECT o.id,
            o.userID,
            od.productID,
            od.quantity,
            o.status
            FROM ' . $this->table . ' o
            LEFT JOIN
                order_details as od ON o.id = od.orderID
            ORDER BY
                o.userID';

            // Prepare statement
            $stmt = $this->conn->prepare($query);//PDO

            // Execute query
            $stmt->execute();

      return $stmt;

        }

        // GET SINGLE
        public function read_single(){
            // Create query
            $query = 'SELECT o.id,
            o.userID,
            od.productID,
            od.quantity,
            o.status
            FROM ' . $this->table . ' o
            LEFT JOIN
                order_details as od ON o.id = od.orderID
            WHERE o.id = ?
            LIMIT 0,1';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Bind ID
            $stmt->bindParam(1, $this->id);

            // Execute query
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Set properties
            $this->userID = $row['userID'];
            $this->productID = $row['productID'];
            $this->quantity = $row['quantity'];
            $this->status = $row['status'];      
        }

        // CREATE
        public function create(){

            $query = 'INSERT INTO ' .
            $this->table . 'SET userID = :userID,
            status = :status';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->userID = htmlspecialchars(strip_tags($this->userID));
            $this->status = htmlspecialchars(strip_tags($this->status));

            // Bind data

            $stmt->bindParam(':title', $this->title);
            $stmt->bindParam(':body', $this->body);

            // Execute query
            if($stmt->execute()) {
                return true;
            }
    
            // Print error if something goes wrong
            printf("Error: %s.\n", $stmt->error);
    
            return false;

        }

        // UPDATE
        public function update(){
            // Create query
            $query = 'UPDATE ' . $this->table . '
            SET userID = :userID,
            status = :status
            WHERE id = :id';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->userID = htmlspecialchars(strip_tags($this->userID));
            $this->status = htmlspecialchars(strip_tags($this->status));
            $this->id = htmlspecialchars(strip_tags($this->id));//has this one extra

            // Bind Data
            $stmt->bindParam(':userID', $this->userID);
            $stmt->bindParam(':status', $this->status);
            $stmt->bindParam(':id', $this->id);

            // Execute query
            if($stmt->execute()) {
                return true;
            }
    
            // Print error if something goes wrong
            printf("Error: %s.\n", $stmt->error);
    
            return false;

        }

        // DELETE
        public function delete(){
            $this->id = htmlspecialchars(strip_tags($this->id));//has this one extra

            $query = 'DELETE FROM ' . $this->table . ' WHERE id =:id';
            // Prepare statement
            $stmt = $this->conn->prepare($query);

            if($stmt->execute()) {
            return true;
            }
            return false;
        }
    }

?>