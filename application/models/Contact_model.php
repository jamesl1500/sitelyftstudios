<?php
class Contact_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('Contact');
    }
    
    function contactFormProcess($fullname, $email, $subject, $message)
    {
        $contact = new Contact();
        $contact->mainProcess($fullname, $email, $subject, $message);
    }
}