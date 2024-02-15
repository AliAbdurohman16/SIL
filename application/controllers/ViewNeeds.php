<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ViewNeeds extends CI_Controller
{

    public function login()
    {
        $this->load->view('auth/login');
    }
    public function adminDashboard()
    {
        $data = [
            'title' => "Admin Page"
        ];
        $this->load->view('admin/partials/header');
        $this->load->view('admin/partials/sidenav');
        $this->load->view('admin/partials/navbar');
        $this->load->view('admin/index');
        $this->load->view('admin/partials/footer');
    }
}
