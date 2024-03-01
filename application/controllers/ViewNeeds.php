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
            'title' => "Dashboard",
            'active1' => "active",
            'active2' => "",
            'active3' => "",
        ];
        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/sidenav', $data);
        $this->load->view('admin/partials/navbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('admin/partials/footer', $data);
    }
    public function klinik()
    {
        $data = [
            'title' => "Klinik",
            'active1' => "",
            'active2' => "active",
            'active3' => "",
        ];
        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/sidenav', $data);
        $this->load->view('admin/partials/navbar', $data);
        $this->load->view('admin/klinik', $data);
        $this->load->view('admin/partials/footer', $data);
    }
}
