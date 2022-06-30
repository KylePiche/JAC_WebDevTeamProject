<?php 

    class Product{
        // Database variables
        private $conn;
        private $table = 'products';

        // Properties
        public $id;
        public $name;
        public $desc;
        public $type;
        public $price;
        public $imageUrl;
        public $cpu_desc;
        public $cpu_speed;
        public $cpu_cores;
        public $gpu_desc;
        public $gpu_memory;
        public $memory_desc;
        public $ram;
        public $storage_desc;
        public $storage_capacity;
        public $screen_desc;
        public $screen_size;

        // Constructor
        public function __construct($db) {
            $this->conn = $db;
        }

        // GET MULTIPLE
        public function read(){
            $query = 'SELECT p.id as id, p.name as `name`, p.desc as `desc`, p.type as `type`, p.price as price, p.imageUrl as imageUrl,
                            c.desc as cpu_desc, c.clockSpeed as cpu_speed, c.coreCount as cpu_cores, 
                            g.desc as gpu_desc, g.memory as gpu_memory,
                            m.desc as memory_desc, m.memory as ram,
                            st.desc as storage_desc, st.capacity as storage_capacity,
                            sc.desc as screen_desc, sc.size as screen_size
                            FROM ' . $this->table . ' p
                            LEFT JOIN spec_cpu c ON p.cpuID = c.id
                            LEFT JOIN spec_gpu g ON p.gpuID = g.id
                            LEFT JOIN spec_memory m ON p.memoryID = m.id
                            LEFT JOIN spec_storage st ON p.storageID = st.id
                            LEFT JOIN spec_screen sc ON p.screenID = sc.id';

            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        // GET SINGLE
        public function read_single(){
            $query = 'SELECT p.id as id, p.name as `name`, p.desc as `desc`, p.type as `type`, p.price as price, p.imageUrl as imageUrl, 
                            c.desc as cpu_desc, c.clockSpeed as cpu_speed, c.coreCount as cpu_cores, 
                            g.desc as gpu_desc, g.memory as gpu_memory,
                            m.desc as memory_desc, m.memory as ram,
                            st.desc as storage_desc, st.capacity as storage_capacity,
                            sc.desc as screen_desc, sc.size as screen_size
                            FROM ' . $this->table . ' p
                            LEFT JOIN spec_cpu c ON p.cpuID = c.id
                            LEFT JOIN spec_gpu g ON p.gpuID = g.id
                            LEFT JOIN spec_memory m ON p.memoryID = m.id
                            LEFT JOIN spec_storage st ON p.storageID = st.id
                            LEFT JOIN spec_screen sc ON p.screenID = sc.id
                            WHERE p.id = ? LIMIT 0,1';

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->name = $row['name'];
            $this->desc = $row['desc'];
            $this->type = $row['type'];
            $this->price = $row['price'];
            $this->imageUrl = $row['imageUrl'];
            $this->cpu_desc = $row['cpu_desc'];
            $this->cpu_speed = $row['cpu_speed'];
            $this->cpu_cores = $row['cpu_cores'];
            $this->gpu_desc = $row['gpu_desc'];
            $this->gpu_memory = $row['gpu_memory'];
            $this->memory_desc = $row['memory_desc'];
            $this->ram = $row['ram'];
            $this->storage_desc = $row['storage_desc'];
            $this->storage_capacity = $row['storage_capacity'];
            $this->screen_desc = $row['screen_desc'];
            $this->screen_size = $row['screen_size'];

        }

        // CREATE
        public function create(){
            $query = 'INSERT INTO ' . $this->table . ' 
                    SET `name` = :name, `desc` = :desc, `type` = :type, price = :price, imageUrl = :imageUrl, 
                    CPUid=(SELECT id FROM spec_cpu WHERE `desc`=:cpu_desc), 
                    GPUid=(SELECT id FROM spec_gpu WHERE `desc`=:gpu_desc), 
                    memoryID=(SELECT id FROM spec_memory WHERE `desc`=:memory_desc), 
                    storageID=(SELECT id FROM spec_storage WHERE `desc`=:storage_desc), 
                    screenID=(SELECT id FROM spec_screen WHERE `desc`=:screen_desc)';
            
            $stmt = $this->conn->prepare($query);

            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->desc = htmlspecialchars(strip_tags($this->desc));
            $this->type = htmlspecialchars(strip_tags($this->type));
            $this->price = htmlspecialchars(strip_tags($this->price));
            $this->imageUrl = htmlspecialchars(strip_tags($this->imageUrl));
            $this->cpu_desc = htmlspecialchars(strip_tags($this->cpu_desc));
            $this->gpu_desc = htmlspecialchars(strip_tags($this->gpu_desc));
            $this->memory_desc = htmlspecialchars(strip_tags($this->memory_desc));
            $this->storage_desc = htmlspecialchars(strip_tags($this->storage_desc));
            $this->screen_desc = htmlspecialchars(strip_tags($this->screen_desc));

            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':desc', $this->desc);
            $stmt->bindParam(':type', $this->type);
            $stmt->bindParam(':price', $this->price);
            $stmt->bindParam(':imageUrl', $this->imageUrl);
            $stmt->bindParam(':cpu_desc', $this->cpu_desc);
            $stmt->bindParam(':gpu_desc', $this->gpu_desc);
            $stmt->bindParam(':memory_desc', $this->memory_desc);
            $stmt->bindParam(':storage_desc', $this->storage_desc);
            $stmt->bindParam(':screen_desc', $this->screen_desc);

            if($stmt->execute()){
                return true;
            }

            printf("Error: %s.\n", $stmt->error);
            return false;
        }

        // UPDATE
        public function update(){
            $query = 'UPDATE ' . $this->table . ' 
                    SET `name` = :name, `desc` = :desc, `type` = :type, price = :price, imageUrl = :imageUrl,
                    CPUid=(SELECT id FROM spec_cpu WHERE `desc`=:cpu_desc), 
                    GPUid=(SELECT id FROM spec_gpu WHERE `desc`=:gpu_desc), 
                    memoryID=(SELECT id FROM spec_memory WHERE `desc`=:memory_desc), 
                    storageID=(SELECT id FROM spec_storage WHERE `desc`=:storage_desc), 
                    screenID=(SELECT id FROM spec_screen WHERE `desc`=:screen_desc)
                    WHERE id=:id';
            
            $stmt = $this->conn->prepare($query);

            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->desc = htmlspecialchars(strip_tags($this->desc));
            $this->type = htmlspecialchars(strip_tags($this->type));
            $this->price = htmlspecialchars(strip_tags($this->price));
            $this->imageUrl = htmlspecialchars(strip_tags($this->imageUrl));
            $this->cpu_desc = htmlspecialchars(strip_tags($this->cpu_desc));
            $this->gpu_desc = htmlspecialchars(strip_tags($this->gpu_desc));
            $this->memory_desc = htmlspecialchars(strip_tags($this->memory_desc));
            $this->storage_desc = htmlspecialchars(strip_tags($this->storage_desc));
            $this->screen_desc = htmlspecialchars(strip_tags($this->screen_desc));
            $this->id = htmlspecialchars(strip_tags($this->id));

            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':desc', $this->desc);
            $stmt->bindParam(':type', $this->type);
            $stmt->bindParam(':price', $this->price);
            $stmt->bindParam(':imageUrl', $this->imageUrl);
            $stmt->bindParam(':cpu_desc', $this->cpu_desc);
            $stmt->bindParam(':gpu_desc', $this->gpu_desc);
            $stmt->bindParam(':memory_desc', $this->memory_desc);
            $stmt->bindParam(':storage_desc', $this->storage_desc);
            $stmt->bindParam(':screen_desc', $this->screen_desc);
            $stmt->bindParam(':id', $this->id);

            if($stmt->execute()){
                return true;
            }

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