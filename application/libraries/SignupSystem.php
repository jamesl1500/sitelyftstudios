<?php
class SignupSystem
{
    private $_CI;

    private $response;

    private $firstname;
    private $lastname;
    private $username;
    private $email;
    private $password;
    private $confirm_pass;

    private $unique_id;

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
     * Check email
     */
    private function checkEmail()
    {
        if (!empty($this->_email)) {
            if ($this->_CI->validation->isValidEmail($this->_email) == true) {
                // Now encrypt the email so we can use it against the database
                $query = $this->pdo->conn_id->prepare("SELECT * FROM sl_clients WHERE email=:email");
                $query->execute(array(
                    ':email' => $this->_CI->encryption->encryptText($this->_email)
                ));

                if ($query->rowCount() == 0) {
                    return true;
                } else {
                    return false;
                }
            } else {
                echo $this->_CI->response->make("Please enter a valid email!", 'JSON', 0);
                return false;
            }
        }
    }

    /*
     * Check username
     */
    private function checkUsername()
    {
        if (!empty($this->_username)) {
            // Now encrypt the email so we can use it against the database
            $query = $this->pdo->conn_id->prepare("SELECT * FROM sl_clients WHERE user_name=:user_name");
            $query->execute(array(
                ':user_name' => $this->_username
            ));

            if ($query->rowCount() == 0) {
                return true;
            } else {
                return false;
            }
        }
    }

    /*
     * Signup process
     */
    public function process($firstname, $lastname, $username, $email, $password, $confirm_password)
    {
        if (!empty($firstname) && !empty($lastname) && !empty($username) && !empty($email) && !empty($password) && !empty($confirm_password))
        {
            // Fill in all of the data
            $this->_firstname = $this->_CI->validation->santitize($firstname);
            $this->_lastname = $this->_CI->validation->santitize($lastname);
            $this->_username = $this->_CI->validation->santitize($username);
            $this->_email = $this->_CI->validation->santitize($email);

            // Passwords
            $this->_password = $this->_CI->validation->santitize($password);
            $this->_confirm_pass = $this->_CI->validation->santitize($confirm_password);

            // Now lets run some checks
            if(!$this->checkEmail())
            {
                echo $this->_CI->response->make("There is already an account with this email!", 'JSON', 0);
                return false;
            }else if(!$this->checkUsername())
            {
                echo $this->_CI->response->make("This username is already in use!", 'JSON', 0);
                return false;
            }else if($this->checkEmail() == true && $this->checkUsername() == true)
            {
                // Check passwords now
                if($this->_password == $this->_confirm_pass)
                {
                    // Now since the passwords match lets now insert this user but first encrypt everything
                    $this->_email = $this->_CI->encryption->encryptText($this->_email);
                    $this->_password = $this->_CI->encryption->encryptText($this->_password);

                    // Unique id
                    $this->_unique_id = md5($this->_password) . crypt($this->_CI->encryption->randomHash(), '575defb1e4ba4ec175151af1c48f8f67');

                    if($this->_email != "" && $this->_password != "")
                    {
                        $query = $this->pdo->conn_id->prepare("INSERT INTO sl_clients VALUES('', :firstname, :lastname, :username, :email, :password, now(), now(), :unique_id, '0')");
                        if($query->execute(array(':firstname' => $this->_firstname, ':lastname' => $this->_lastname, ':username' => $this->_username, ':email' => $this->_email, ':password' => $this->_password, ':unique_id' => $this->_unique_id))) {
                            $message = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
                            <html xmlns=\"http://www.w3.org/1999/xhtml\">
                             <head>
                              <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />
                              <title>Demystifying Email Design</title>
                              <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"/>
                               <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
                            </head>
                            <body style=\"margin: 0; padding: 0;\">
                              <style>
                                *{
                                  font-family: 'Roboto';
                                }
                                
                                .tableHolder{
                                  
                                }
                                
                                .tableHolder tr td{
                                  padding: 20px;
                                }
                              </style>
                             <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
                              <tr>
                               <td>
                                <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class='tableHolder' style='border-right: 3px solid #292929;border-left: 3px solid #292929'>
                             <tr class='tableHolder'>
                              <td bgcolor='#292929' >
                                <h3 style='text-align: center;font-weight: 300;font-size: 2.0em;color: #fff;'>Welcome to Sitelyft</h3>
                              </td>
                             </tr>
                             <tr>
                              <td>
                                <h3 style='margin-top: 0px;padding-top: 0px;'>Hey " . ucwords($this->_firstname) . "!</h3>
                                <p style='color: #777;'>Thanks for signing up for Sitelyft! The last step for you to do is activate your account. Press the button below and you'll be finished.</p>
                                <a href='http://localhost/sitelyftstudios/signup/activate/" . $this->_unique_id . "' style='display: inline-block;
                                margin-bottom: 0;
                                font-weight: normal;
                                text-align: center;
                                vertical-align: middle;
                                touch-action: manipulation;
                                cursor: pointer;
                                background-image: none;outline: none;
                                padding: 10px 15px;
                                font-size: 15px;
                                line-height: 1.4;
                                border: none;
                                border-radius: 4px;
                                -webkit-transition: border 0.25s linear,color 0.25s linear,background-color 0.25s linear;
                                transition: border 0.25s linear,color 0.25s linear,background-color 0.25s linear;
                                -webkit-font-smoothing: subpixel-antialiased;    box-shadow: inset 0 -2px 0 rgba(0,0,0,0.15);    color: #fff;
                                background-color: #1abc9c;text-decoration: none;'>Activate Account!</a>
                              </td>
                             </tr>
                             <tr bgcolor='#292929'>
                              <td>
                                <h3 style='text-align: center;font-weight: 300;font-size: 1.0em;color: #fff'>Sitelyft &copy; 2016</h3>
                              </td>
                             </tr>
                            </table>
                               </td>
                              </tr>
                             </table>
                            </body>
                            </html>";
                            
                            $this->_CI->email->from('james@sitelyftstudios.com', 'Sitelyft');
                            $this->_CI->email->to($this->_CI->encryption->decryptText($this->_email));

                            $this->_CI->email->subject('Welcome to Sitelyft');
                            $this->_CI->email->message('Welcome!');

                            if ($this->_CI->email->send()){
                                echo $this->_CI->response->make("Your account has been created! Please activate it by using the link we've sent to your email", 'JSON', 1);
                                return false;
                            }else{
                                echo $this->_CI->response->make("Something went wrong with emails", 'JSON', 0);
                                return false;
                            }
                        }else{
                            echo $this->_CI->response->make("OOPS! An error has occurred", 'JSON', 0);
                            return false;
                        }
                    }
                }else
                {
                    echo $this->_CI->response->make("Your passwords dont match!", 'JSON', 0);
                    return false;
                }
            }
        }
    }
    
    public function processActivation($unique_id)
    {
        if(!empty($unique_id))
        {
            // Now run this across the database
            $query = $this->pdo->conn_id->prepare("SELECT id FROM sl_clients WHERE unique_id_string=:unique_id");
            $query->execute(array(
                ':unique_id' => $unique_id
            ));

            if($query->rowCount() == 1)
            {
                // Now activate the stuff
                $update = $this->pdo->conn_id->prepare("UPDATE sl_clients SET activated='1' WHERE unique_id_string=:unique_id");
                if($update->execute(array(':unique_id' => $unique_id)))
                {
                    redirect('/login?s=act_success' ,'location');
                }else{
                    redirect('/login' ,'location');
                }
            }else
            {
                redirect('/login' ,'location');
            }
        }else
        {
            redirect('/login' ,'location');
        }
    }
}