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
            $data['mess_menu'] = $this->db->get('mess_menu')->result_array();
            $this->load->view('operator/update_menu',$data);
        }
    }

    public function insert_menu_item()
    {
        $postData = $this->security->xss_clean($this->input->post());

        $name = $postData['menu_name'];
        
        $insert_array = array(
            'menu_name' => $name,
            'status' => 'Available'
        );
        
        $insert = $this->db->insert('mess_menu', $insert_array);


        if (!empty($insert)) {
            $this->session->set_flashdata('success', 'Menu Item Added Successfully');
            redirect('operator/update_menu');
        } else {
            $this->session->set_flashdata('failure', 'Something went wrong, try again.');
            redirect('operator/update_menu');
        }
    }


}
