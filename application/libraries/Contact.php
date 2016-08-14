<?php
class Contact
{
    private $_CI;

    private $response;

    private $fullname;
    private $email;
    private $subject;
    private $message;

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
     * Main process
     */
    public function mainProcess($fullname, $email, $subject, $message)
    {
        if(!empty($fullname) && !empty($email) && !empty($subject) && !empty($message))
        {
            $fullname = $this->_CI->validation->santitize($fullname);
            $email = $this->_CI->validation->santitize($email);
            $subject = $this->_CI->validation->santitize($subject);
            $message = $this->_CI->validation->santitize($message);

            // Lets make sure this is a valid email
            if($this->_CI->validation->isValidEmail($email))
            {
                // Uh so i guess we just send the message?
                $headers = 'To: <james@sitelyftstudios.com>' . "\n";
                $headers .= 'From: ' . $fullname . ' <'.$email.'>' . "\n";
                $headers .= "MIME-Version: 1.0\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1";

                // Send the messages
                if(mail('james@sitelyftstudios.com', $subject, $message, $headers))
                {
                    echo $this->_CI->response->make("Your message has been sent!", 'JSON', 1);
                    return false;
                }else{
                    echo $this->_CI->response->make("OOPS! Please try that again", 'JSON', 0);
                    return false;
                }
            }else{
                echo $this->_CI->response->make("This is not a valid email!", 'JSON', 0);
                return false;
            }
        }else {
            echo $this->_CI->response->make("Please enter all of the details!", 'JSON', 0);
            return false;
        }
    }
}