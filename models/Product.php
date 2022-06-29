<?php 

    class Product{
        // Database variables
        private $conn;
        private $table = 'products';

        // Properties

        // Constructor
        public function __construct($db) {
            $this->conn = $db;
        }

        // GET MULTIPLE
        public function read(){

        }

        // GET SINGLE
        public function read_single(){
            
        }

        // CREATE
        public function create(){

        }

        // UPDATE
        public function update(){

        }

        // DELETE
        public function delete(){
            
        }
    }

?>