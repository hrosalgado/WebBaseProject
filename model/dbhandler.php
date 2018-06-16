<?php
    /**
     * Contains methods to allow a connection to mysql database
     * 
     * @author Héctor Rodríguez Salgado
     */
    class DBHandler{
        /**
         * @var string $host Host to connect
         */
        private $host;

        /** @var string $username Username
         * 
         */
        private $username;

        /** 
         * @var string $password Password
         */
        private $password;

        /** 
         * @var string $database Name of database
         */
        private $database;

        /**
         * @var object $connection Connection
         */
        private $connection;

        /**
         * @var int $errorNum Error number
         */
        private $errorNum;

        /**
         * @var string|null $errorMessage Error message
         */
        private $errorMessage;

        /**
         * Set params of connection
         */
        public function __construct(){
            $this->host = 'localhost';
            $this->username = 'root';
            $this->password = 'root';
            $this->database = 'New';
            $this->connection = mysqli_connect($this->getHost(), $this->getUsername(), $this->getPassword(), $this->getDatabase());
            !$this->connection ?: mysqli_set_charset($this->connection, 'utf8');
            $this->errorNum = mysqli_connect_errno();
            $this->errorMessage = mysqli_connect_error();
        }

        /**
         * Gets the host
         * 
         * @return string Host
         */
        private function getHost(){
            return $this->host;
        }

        /**
         * Gets the username
         * 
         * @return string Username
         */
        private function getUsername(){
            return $this->username;
        }

        /**
         * Gets the password
         * 
         * @return string Password
         */
        private function getPassword(){
            return $this->password;
        }

        /**
         * Gets the database
         * 
         * @return string Database
         */
        private function getDatabase(){
            return $this->database;
        }

        /**
         * Gets the connection
         * 
         * @return object Connection
         */
        public function getConnection(){
            return $this->connection;
        }

        /**
         * Gets the error number of the connection
         * 
         * @return int Error
         */
        public function getConnectionErrorNumber(){
            return $this->errorNum;
        }

        /**
         * Gets the error message of the connection
         * 
         * @return int Error
         */
        public function getConnectionErrorMessage(){
            return $this->errorMessage;
        }

        /**
         * Gets the query error
         * 
         * @return string Error
         */
        public function getQueryError(){
            return mysqli_error($this->connection);
        }

        /**
         * Closes a mysql connection
         * 
         * @return bool
         */
        public function close(){
            return mysqli_close($this->getConnection());
        }

        /**
         * Executes a query
         * 
         * @return object|bool
         */
        public function query($sql, $debug = false){
            if($debug){
                echo $sql;
            }

            return mysqli_query($this->getConnection(), $sql);
        }

        /**
         * Gets the result into array
         * 
         * @param object
         * @return array $data Result of query into array
         */
        public function getResult($result){
            $data = array();

            while($row = mysqli_fetch_assoc($result)){
                array_push($data, $row);
            }
        
            mysqli_free_result($result);
            return $data;
        }
    }
?>