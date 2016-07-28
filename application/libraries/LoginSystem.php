<?php
class LoginSystem
{
    private $_CI;
    
    private $response;
    
    private $email;
    private $password;

    /*
     * Load up libraries that's gonna be needed in this class
     */
    public function __construct()
    {
        $this->_CI =& get_instance();
        
        // Load libraries
        $this->_CI->load->library("src/Validation.php");
        $this->_CI->load->library("src/Encryption.php");
        $this->_CI->load->library("src/Response.php");

        // Load database
        $this->pdo = $this->_CI->load->database('pdo', true);
    }

    /*
     * This function will check rather or not this person has made an account with this email
     *
     * @var $email
     */
    protected function CheckUserExists($email)
    {
        $response = array();

        $encrypted_email = $this->_CI->encryption->encryptText($email);

        if($this->_CI->validation->isValidEmail($email) == true)
        {
            /*
             * Now find the stuff
             */
            $query = $this->pdo->conn_id->prepare("SELECT * FROM sl_clients WHERE email=:email");
            $query->execute(array(':email' => $encrypted_email));

            if($query->rowCount() == 1)
            {
                // Now return true

                $response['status'] = 1;
                return $response;
            }else
            {
                $response['status'] = 0;
                $response['string'] = "There is no account with this email";
                return $response;
            }
        }else{
            $response['status'] = 0;
            $response['string'] = "Please enter a valid email";
            return $response;
        }
    }

    /*
     * This will thus login the person to the site
     *
     * @var $email
     * @var $password
     */
    public function process($email, $password)
    {
        // Santitize stuff
        $s_email = $this->_CI->validation->santitize($email);
        $s_password = $this->_CI->validation->santitize($password);

        // Load the variables and encrypt information
        $this->_email = $this->_CI->encryption->encryptText($s_email);
        $this->_password = $this->_CI->encryption->encryptText($s_password);

        if($this->_CI->validation->isValidEmail($this->_CI->encryption->decryptText($this->_email)) == true)
        {
            /*
             * Now check to see if this is a valid email and if it exist
             */
            $checkEmail = (array) $this->CheckUserExists($this->_CI->encryption->decryptText($this->_email));

            if($checkEmail['status'] == 1)
            {
                // Now lets make the main query that will check for the persons email and password at the same time
                $query = $this->pdo->conn_id->prepare("SELECT id, activated, unique_id_string FROM sl_clients WHERE password=:password AND email=:email");
                $query->execute(array(
                    ':password' => $this->_password,
                    ':email'    => $this->_email
                ));

                if($query->rowCount() == 1)
                {
                    $fetch = $query->fetch(PDO::FETCH_ASSOC);

                    // Now since we see there is someone with this email and password lets check if they've forgotten their passwords
                    $check = $this->pdo->conn_id->prepare("SELECT id, request_id FROM sl_forgot_password WHERE id=:id AND user_salt_id=:unique_salt_string");
                    $check->execute(array(
                        ':id' => $fetch['id'],
                        ':unique_salt_string' => $fetch['unique_id_string']
                    ));

                    if($check->rowCount() == 0)
                    {
                        // Okay now check their account activated status
                        if($fetch['activated'] == 1)
                        {
                            // Means were good to go just send back the go ahead to log the person in
                            $data = array(
                                'uid'=> $fetch['id'],
                                'unique_salt_id' => $this->_CI->encryption->encryptText($fetch['unique_id_string']),
                                'logged_in' => TRUE
                            );
                            $this->_CI->session->set_userdata($data);
                            
                            echo $this->_CI->response->make("login-successful", 'JSON', 1);
                            return false;
                        }else
                        {
                            echo $this->_CI->response->make("Your account hasn't been activated yet!", 'JSON', 0);
                            return false;
                        }
                    }else
                    {
                        // Means the person has asked for their password to be reset. For security reasons well bock their request
                        echo $this->_CI->response->make("You've asked for your password to be reset! For security reasons please reset your password using the email we've sent you", 'JSON', 0);
                        return false;
                    }
                }else{
                    echo $this->_CI->response->make("Email or password is incorrect! Please try again.", 'JSON', 0);
                    return false;
                }
            }else
            {
                echo $this->_CI->response->make($checkEmail['string'], 'JSON', 0);
                return false;
            }
        }else{
            echo $this->_CI->response->make('Please enter a valid email', 'JSON', 0);
            return false;
        }
    }
}