    <?php

    class Database extends PDO{
            public function __construct($connect,$user,$pass){
                parent::__construct($connect,$user,$pass);
            }
            
            public function select($sql, $data = array(), $fetchStyle = PDO::FETCH_ASSOC) {
                $statement = $this->prepare($sql);
                
                if (!empty($data)) {
                    foreach($data as $key => $value) {
                        $statement->bindValue($key, $value);
                    }
                }
                
                $statement->execute();
                return $statement->fetchAll($fetchStyle);
            }
        
            public function insert($table, $data) {
                $keys = implode(",", array_keys($data));
                $values = ":" . implode(", :", array_keys($data));
        
                $sql = "INSERT INTO $table($keys) VALUES($values)";
                $statement = $this->prepare($sql);
        
                foreach($data as $key => $value) {
                    $statement->bindValue(":$key", $value);
                }


                if ($statement->execute()) {
                    return $this->lastInsertId();
                }
                return false;
            }
        
            public function update($table, $data, $cond) {
                $updateKeys = '';
                foreach($data as $key => $value) {
                    $updateKeys .= "$key=:$key,";
                }
                
                $updateKeys = rtrim($updateKeys, ",");
                $sql = "UPDATE $table SET $updateKeys WHERE $cond";
                $statement = $this->prepare($sql);
        
                foreach($data as $key => $value) {
                    $statement->bindValue(":$key", $value);
                }
        
                return $statement->execute();
            }
        
            public function delete($table, $cond, $data = array(), $limit = 1) {
                $sql = "DELETE FROM $table WHERE $cond LIMIT $limit";
                $statement = $this->prepare($sql);
                
                // Bind parameters
                foreach($data as $key => $value) {
                    $statement->bindValue($key, $value);
                }
                
                return $statement->execute();
            }
            
            public function affectedRows($sql,$username,$password){
                $statement = $this->prepare($sql);
                $statement->execute(array($username,$password));
                return $statement->rowCount();
            }
            public function selectUser($sql,$username,$password){
                $statement = $this->prepare($sql);
                $statement->execute(array($username,$password));
                return $statement->fetchAll(PDO::FETCH_ASSOC);
            }
            
            public function getLastInsertId() {
                return parent::lastInsertId();
            }
            
    }
    ?>