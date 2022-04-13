<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;

class Operator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->session->has_userdata('user_id')) {

            $id = $this->session->userdata('user_id');
            $acct_type = $this->session->userdata('acct_type');
            $this->load->view('operator/dashboard');
        } else {
            $this->load->view('login');
        }
    }
   
    public function allocate_rooms(){
        if ($this->session->has_userdata('user_id')) {
            $this->load->view('operator/allocate_rooms');
        }
    }
    public function update_menu(){
        if ($this->session->has_userdata('user_id')) {
            $this->load->view('operator/update_menu');
        }
    }


}
