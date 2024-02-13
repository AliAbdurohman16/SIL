<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ViewNeeds extends CI_Controller
{

    public function login()
    {
        $this->load->view('auth/login');
    }
}
