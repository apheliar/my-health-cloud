<?php
    /*
     * PDO Database Class
     *  -> Connect to Database
     *  -> Create Prepare Statement
     *  -> Bind Values
     *  -> Retourn rows and results
     */

    class Database {
        private $host = DB_HOST;
        private $user = DB_USER;
        private $password = DB_PASS;
        private $db_name = DB_NAME;

        private $database_handler;
        private $statement;
        private $error;

        function __construct(){
            // Set a Data Source Name (DSN)
            $dsn = 'mysql:host=' . $this->host . ';
                        dbname=' . $this->db_name;

            $options = array(
                // having a persisting connection
                PDO::ATTR_PERSISTENT => true,
                // More elegant way to handle error
                PDO::ATTR_ERRMODE    => PDO::ERRMODE_EXCEPTION
            );

            // Create PDO instance
            try{
                $this->database_handler = new PDO($dsn, $this->user, $this->password, $options);
            } catch (PDOException $e){
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }

        // Prepare Statement with query
        public function query($sql){
            $this->statement = $this->database_handler->prepare($sql);
        }

        // Bind values
        public function bind($param, $value, $type = null){
            if(is_null($type)){
                switch (true){
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                }
            }

            $this->statement->bindValue($param, $value, $type);
        }

        // Execute the prepared statement
        public function execute(){
            return $this->statement->execute();
        }

        // Get result set as array
        public function resultSet(){
            $this->execute();
            return $this->statement->fetchAll(PDO::FETCH_OBJ);
        }
        // Get Single Record As Object
        public function single(){
            $this->execute();
            return $this->statement->fetch(PDO::FETCH_OBJ);
        }

        // Get row count
        public function rowCount(){
            return $this->statement->rowCount();
        }
    }