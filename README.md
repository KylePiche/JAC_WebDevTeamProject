# JAC_WebDevTeamProject

Create your own connection-config.php in the root of the project:
```
<?php

class Database{
    //database parameteres
    private $host ='localhost';
    private $databaseUsername ='root';
    private $databasePass ='';
    private $databaseName ='computerstore';
    private $conn;

    //conncetion

    public function connect(){
        $this->conn = null;
        try{
        $this-> conn = new PDO('mysql:host=' . $this->host . ';dbname=' .$this->databaseName , $this->databaseUsername,$this ->databasePass);
    
        }catch(PDOException $e){
            echo $e->getMessage();
        }
       return $this->conn; 
    }
}




?>
```
