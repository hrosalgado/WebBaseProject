<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . $_SERVER['CONTEXT_PREFIX'] . '/model/dbhandler.php');

    /**
     * @author Héctor Rodríguez Salgado
     */
    class Users{
        /**
         * @var int $id Id
         */
        private $id;

        /**
         * @var string $username Username
         */
        private $username;

        /**
         * @var string $password Password
         */
        private $password;

        /**
         * Constructor
         */
        public function __construct($user){
            $this->id = $user->id;
            $this->username = $user->username;
            $this->password = $user->password;
        }

        /**
         * Gets the id
         * 
         * @return int
         */
        public function getId(){
            return $this->id;
        }

        /**
         * Sets the id
         * 
         * @param int $id Id
         */
        public function setId($id){
            $this->id = $id;;
        }

        /**
         * Gets the username
         * 
         * @return string
         */
        public function getUsername(){
            return $username;
        }

        /**
         * @param string $username Username
         */
        public function setUsername($username){
            $this->username = $username;
        }

        /**
         * Gets the password
         * 
         * @return string
         */
        public function getPassword(){
            return $password;
        }

        /**
         * @param string $password Password
         */
        public function setPassword($password){
            $this->password = $password;
        }

        /**
         * Checks if an user exists
         * 
         * @return bool
         */
        public function checkUsername(){
            $db = new DBHandler;

            if($db->getConnectionErrorNumber() == 0){
                $sql = "SELECT  u.ID
                        FROM    Users u
                        WHERE   u.username = '$this->username'";

                if($result = $db->query($sql)){
                    $result = $db->getResult($result);
                }else{
                    $result = $db->getQueryError();
                }

                $db->close();

                return $result;
            }else{
                return $db->getConnectionErrorMessage();
            }
        }

        /**
         * Checks if a password below to an user
         * 
         * @return bool
         */
        public function checkPassword(){
            $db = new DBHandler;

            if($db->getConnectionErrorNumber() == 0){
                $sql = "SELECT  u.ID
                        FROM    Users u
                        WHERE   u.username = '$this->username' AND
                                u.password = '$this->password'";

                if($result = $db->query($sql)){
                    $result = $db->getResult($result);

                    if(empty($result)){
                        $result = false;
                    }else{
                        $this->setId($result[0]['ID']);
                        $result = true;
                    }
                }else{
                    $result = $db->getQueryError();
                }

                $db->close();

                return $result;
            }else{
                return $db->getConnectionErrorMessage();
            }
        }
    }
?>