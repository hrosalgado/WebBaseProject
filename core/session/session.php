<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . $_SERVER['CONTEXT_PREFIX'] . '/core/security.php');
    
    class Session{
        /**
         * Stores data
         */
        private $data;

        /**
         * Security
         */
        private $security;

        public function __construct($data){
            $this->security = new Security;
            $this->data = $data;
        }

        /**
         * Log in an user
         */
        public function login(){
            require_once($_SERVER['DOCUMENT_ROOT'] . $_SERVER['CONTEXT_PREFIX'] . '/model/users.php');

            $username = $this->security->clean($this->data['username']);
            $password = $this->security->clean($this->data['password']);
            $password = $this->security->crypt($password);

            $user = new stdClass;

            $user->id = null;
            $user->username = $username;
            $user->password = $password;

            $users = new Users($user);

            $checkUsername = $users->checkUsername();
            if(gettype($checkUsername) == 'string'){
                return ['status' => false, 'data' => $checkUsername];
            }else{
                if($checkUsername){
                    $checkPassword = $users->checkPassword();
                    if(gettype($checkPassword) == 'string'){
                        return ['status' => false, 'data' => $checkPassword];
                    }else{
                        if($checkPassword){
                            $cookie = setcookie($this->security->crypt('user'), $this->security->crypt($users->getId()), time() + 60 * 60 * 24 * 30, '/', 'localhost', false, true);
                            if($cookie){
                                session_start();
                                $_SESSION['user'] = $users->getId();
                                session_write_close();
                                
                                return ['status' => true, 'data' => $checkPassword];
                            }else{
                                return ['status' => false, 'data' => 'Cookie failed'];
                            }
                        }else{
                            return ['status' => true, 'data' => 'password'];
                        }
                    }
                }else{
                    return ['status' => true, 'data' => 'username'];
                }
            }
        }

        /**
         * Log out an user
         */
        public function logout(){
            $cookie = setcookie($this->security->crypt('user'), null, -1, '/');
            if($cookie){
                session_start();

                $session = session_destroy();
                if($session){
                    return ['status' => true, 'data' => true];
                }else{
                    setcookie($this->security->crypt('user'), null, time() + 60 * 60 * 24 * 30, '/');
                    return ['status' => true, 'data' => 'Session failed'];
                }
            }else{
                return ['status' => false, 'data' => 'Cookie failed'];
            }
        }

        /**
         * Checks user session
         * 
         * @return bool $session
         */
        public function checkSession(){
            $session = false;
            
            session_start();
            if(isset($_SESSION['user'])){
                if(isset($_COOKIE[$this->security->crypt('user')])){
                    $session = true;
                }
            }
            session_write_close();

            return $session;
        }
    }

    if(isset($_POST)){
        if(isset($_POST['action'])){
            $action = $_POST['action'];
            $data = isset($_POST['data']) ? $_POST['data'] : null;

            $session = new Session($data);
            echo json_encode($session->$action());
        }
    }else{
        echo json_encode(null);
    }
?>