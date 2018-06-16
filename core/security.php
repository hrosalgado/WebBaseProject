<?php
    /**
     * Implements functions to improve security
     * 
     * @author Héctor Rodríguez Salgado
     */
    class Security{
        /**
         * @var string $secretKey The secret key of the app
         */
        private $secretKey;

        function __construct(){
            $this->secretKey = "Wbp@H.18#";
        }

        /**
         * Gets the secret key of the app
         * 
         * @return string The secret key of the app
         */
        private function getSecretKey(){
            return $this->secretKey;
        }

        /**
         * Crypts or decrypts a text
         * 
         * @param string $string Text to crypt or decrypt
         * @return string $output Text crypted or decrypted
         */
        function crypt($string, $action = 'e'){
            $secret_key = $this->getSecretKey() . 'e';
            $secret_iv = $this->getSecretKey() . 'd';
        
            $output = false;
            $encrypt_method = 'AES-256-CBC';
            $key = hash('sha256', $secret_key);
            $iv = substr(hash('sha256', $secret_iv), 0, 16);
            
            if($action == 'e'){
                $output = base64_encode(openssl_encrypt($this->getSecretKey() . $string, $encrypt_method, $key, 0, $iv));
            }else if($action == 'd'){
                $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
                $output = substr($output, strlen($this->getSecretKey()));
            }
        
            return $output;
        }

        /**
         * Escapes a special chars of a string
         * 
         * @param string $str Text to escape
         * @return string|null
         */
        function clean($str){
            require_once($_SERVER['DOCUMENT_ROOT'] . $_SERVER['CONTEXT_PREFIX'] . '/model/dbhandler.php');
            
            $db = new DbHandler;
            if($db->getConnectionErrorNumber() == 0){
                $clean = addslashes(trim(htmlspecialchars(mysqli_real_escape_string($db->getConnection(), strip_tags($str)))));
                
                $db->close();

                return $clean;
            }else{
                return null;
            }
        }
    }
?>