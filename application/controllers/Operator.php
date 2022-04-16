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

    public function allocate_rooms()
    {
        if ($this->session->has_userdata('user_id')) {
            $this->load->view('operator/allocate_rooms');
        }
    }
    public function update_menu()
    {
        if ($this->session->has_userdata('user_id')) {
            $data['mess_menu'] = $this->db->get('mess_menu')->result_array();
            $this->load->view('operator/update_menu', $data);
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

    public function room_allocation_process()
    {
        $postData = $this->security->xss_clean($this->input->post());

        $gunroom = $postData['gunroom'];
        $floor = $postData['floor'];
        $room = $postData['room'];

        $name_1 = $postData['name_1'];
        $name_2 = $postData['name_2'];
        $name_3 = $postData['name_3'];
        $name_4 = $postData['name_4'];

        $cond  = [
            'gunroom_id' => $gunroom,
            'gunroom_floor_id' => $floor,
            'Room_no' => $room

        ];
        $data_update = [
            'allocated_to_1' => $name_1,
            'allocated_to_2' => $name_2,
            'allocated_to_3' => $name_3,
            'allocated_to_4' => $name_4
        ];

        $this->db->where($cond);
        $insert =  $this->db->update('gunrooms_rooms', $data_update);

        if (!empty($insert)) {
            $this->session->set_flashdata('success', 'Room Allocated Successfully');
            redirect('operator/allocate_rooms');
        } else {
            $this->session->set_flashdata('failure', 'Something went wrong, try again.');
            redirect('operator/allocate_rooms');
        }
    }

    public function get_rooms_status()
    {
        $gunroom = $_POST['gunroom'];
        $floor = $_POST['floor'];
        $room = $_POST['room'];

        $roomsList = $this->db->where('gunroom_id', $gunroom)->where('gunroom_floor_id', $floor)->where('Room_no', $room)->get('gunrooms_rooms')->result_array();
        echo json_encode($roomsList);
    }
}
