<?php

class User
{
    // Database variables
    private $conn;
    private $table = 'users';

    // Properties
    public $id;
    public $email;
    public $username;
    public $password;
    public $creditcard;
    public $address;
    public $city;
    public $postalCode;
    public $isBlocked;
    // Constructor
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // GET MULTIPLE
    public function read()
    {
        $query = 'SELECT * FROM ' . $this->table . '';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // GET SINGLE
    public function read_single()
    {
        $query = 'SELECT * FROM ' . $this->table . 'WHERE id = ? LIMIT 0,1';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->id = $row['id'];
        $this->email = $row['email'];
        $this->username = $row['userName'];
        $this->password = $row['password'];
        $this->creditcard = $row['creditCard'];
        $this->address = $row['address'];
        $this->city = $row['city'];
        $this->postalCode = $row['postalCode'];
        $this->isBlocked = $row['isBlocked'];
    }

    // CREATE
    public function createNewUser()
    {
        $query = 'INSERT INTO ' . $this->table . '(email, userName, password) VALUES (:email , :username, :password);';
        // Prepare statement
        $stmt = $this->conn->prepare($query);
        // Clean data
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = htmlspecialchars(strip_tags($this->password));

        // Bind data
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);

        if ($stmt->execute()) {
            return true;
        }
        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    // UPDATE
    public function update()
    {
        $query = 'UPDATE ' . $this->table . ' SET email=:email, username= :username, password= :password WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        // Clean data
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind data
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);
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
    public function delete()
    {
        // Create query
    $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->id = htmlspecialchars(strip_tags($this->id));

    // Bind data
    $stmt->bindParam(':id', $this->id);

    // Execute query
    if ($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
    }
}
