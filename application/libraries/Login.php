<?php
class Login
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

        if($this->_CI->validation->isValidEmail($this->_CI->encryption->decryptText($email)) == true)
        {
            /*
             * Now find the stuff
             */
            $query = $this->pdo->prepare("SELECT id FROM sl_clients WHERE email=:email");
            $query->execute(array(':email' => $email));

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
            $checkEmail = (array) $this->CheckUserExists($this->_email);

            if($checkEmail['status'] == 1)
            {
                // Now lets make the main query that will check for the persons email and password at the same time
                $
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