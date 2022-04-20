<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;

class AssistantGunroom extends CI_Controller
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
            $this->load->view('assistantgunroom/dashboard');
        } else {
            $this->load->view('login');
        }
    }

    public function add_users()
    {
        $data['secret_questions'] = $this->db->get('secret_questions')->result_array();
        $this->load->view('assistantgunroom/create_user', $data);
    }

    public function allocate_rooms()
    {
        if ($this->session->has_userdata('user_id')) {
            $data['gunrooms'] = $this->db->get('gunrooms')->result_array();
            //$data['floors'] = $this->db->get('gunrooms_floor')->result_array();
            $this->load->view('assistantgunroom/allocate_rooms',$data);
        }
    }
    public function get_floors_of_gunroom(){
        if ($this->input->post()) {
            $gunroom_id = $_POST['gunroom_id'];
    
                $query = $this->db->where('gunroom_id', $gunroom_id)->get('gunrooms_floors')->result_array();

           // print_r($query);exit;
            echo json_encode($query);
        }
    }
    public function get_rooms_of_floor(){
        if ($this->input->post()) {
            $gunroom_id = $_POST['gunroom_id'];

            $floor_id = $_POST['floor_id'];
    
                $query = $this->db->where('gunroom_id', $gunroom_id)->where('gunroom_floor_id', $floor_id)->get('gunrooms_rooms')->result_array();

           // print_r($query);exit;
            echo json_encode($query);
        }
    }


    public function add_new_gunroom()
    {
        if ($this->session->has_userdata('user_id')) {
            $data['gunrooms'] = $this->db->get('gunrooms')->result_array();
            $this->load->view('assistantgunroom/add_new_gunroom',$data);
        }
    }
    public function add_new_floor($gunroom_id = NULL)
    {
        if ($this->session->has_userdata('user_id')) {

            // $data['gunrooms_floors'] = $this->db->where('gunroom_id',$gunroom_id)->get('gunrooms_floors')->result_array();

            $this->db->select('g.gunroom_name, gf.*');
            $this->db->from('gunrooms_floors gf');
            $this->db->join('gunrooms g', 'gf.gunroom_id = g.id');
            $this->db->where('g.id', $gunroom_id);
            $this->db->where('gf.gunroom_id', $gunroom_id);
            $data['gunrooms_floors'] = $this->db->get()->result_array();
            $data['gunroom_id'] = $gunroom_id;

            $this->load->view('assistantgunroom/add_new_floor',$data);
        }
    }

    public function add_new_room($floor_id = NULL, $gunroom_id = NULL)
    {
        
        if ($this->session->has_userdata('user_id')) {

            // $data['gunrooms_floors'] = $this->db->where('gunroom_id',$gunroom_id)->get('gunrooms_floors')->result_array();

            $this->db->select('g.gunroom_name, gf.gunroom_floor_name, gr.*');
            $this->db->from('gunrooms_rooms gr');
            $this->db->join('gunrooms_floors gf', 'gr.gunroom_floor_id = gf.id');
            $this->db->join('gunrooms g', 'gf.gunroom_id = g.id');
            $this->db->where('gr.gunroom_floor_id', $floor_id);
            $this->db->where('gr.gunroom_id', $gunroom_id);
            $data['gunrooms_rooms'] = $this->db->get()->result_array();

            $data['gunroom_id'] = $gunroom_id;
            $data['floor_id'] = $floor_id;

            $this->load->view('assistantgunroom/add_new_room',$data);
        }
    }

    public function update_menu()
    {
        if ($this->session->has_userdata('user_id')) {
            $data['mess_menu'] = $this->db->get('mess_menu')->result_array();
            $this->load->view('assistantgunroom/update_menu', $data);
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
            redirect('assistantgunroom/update_menu');
        } else {
            $this->session->set_flashdata('failure', 'Something went wrong, try again.');
            redirect('assistantgunroom/update_menu');
        }
    }

    public function insert_new_gunroom()
    {
        $postData = $this->security->xss_clean($this->input->post());

        $name = $postData['gunroom_name'];

        $insert_array = array(
            'gunroom_name' => $name,
            'total_floors' => '0'
        );

        $insert = $this->db->insert('gunrooms', $insert_array);

        if (!empty($insert)) {
            $this->session->set_flashdata('success', 'New Gunroom Added Successfully');
            redirect('assistantgunroom/add_new_gunroom');
        } else {
            $this->session->set_flashdata('failure', 'Something went wrong, try again.');
            redirect('assistantgunroom/add_new_gunroom');
        }
    }

    public function insert_new_floor($gunroom_id = NULL)
    {
        $postData = $this->security->xss_clean($this->input->post());

        $name = $postData['floor_name'];

        $insert_array = array(
            'gunroom_id ' => $gunroom_id,
            'gunroom_floor_name' => $name,
            'total_rooms' => 0
        );

        $insert = $this->db->insert('gunrooms_floors', $insert_array);

        if (!empty($insert)) {

            $floors = $this->db->select('total_floors')->where('id',$gunroom_id)->get('gunrooms')->row_array();
            $cond  = [
                'id' => $gunroom_id
            ];
            $data_update = [
                'total_floors' => ($floors['total_floors'] + 1)
            ];
    
            $this->db->where($cond);
            $insert =  $this->db->update('gunrooms', $data_update);

            $this->session->set_flashdata('success', 'New Floor Added Successfully');
            redirect('assistantgunroom/add_new_floor/'.$gunroom_id);
        } else {
            $this->session->set_flashdata('failure', 'Something went wrong, try again.');
            redirect('assistantgunroom/add_new_floor/'.$gunroom_id);
        }
    }

    public function insert_new_room($gunroom_id = NULL, $floor_id = NULL)
    {
        $postData = $this->security->xss_clean($this->input->post());

        $room_no = $postData['room_no'];
        $total_beds = $postData['total_beds'];

        $insert_array = array(
            'gunroom_id ' => $gunroom_id,
            'gunroom_floor_id  ' => $floor_id,
            'Room_no' => $room_no,
            'total_beds' => $total_beds
        );

        $insert = $this->db->insert('gunrooms_rooms', $insert_array);

        if (!empty($insert)) {

            $rooms = $this->db->select('total_rooms')->where('id',$floor_id)->where('gunroom_id',$gunroom_id)->get('gunrooms_floors')->row_array();
            $cond  = [
                'id' => $floor_id,
                'gunroom_id' => $gunroom_id
            ];
            $data_update = [
                'total_rooms' => ($rooms['total_rooms'] + 1)
            ];
    
            $this->db->where($cond);
            $insert =  $this->db->update('gunrooms_floors', $data_update);

            $this->session->set_flashdata('success', 'New Room Added Successfully');
            redirect('assistantgunroom/add_new_room/'.$floor_id.'/'.$gunroom_id);
        } else {
            $this->session->set_flashdata('failure', 'Something went wrong, try again.');
            redirect('assistantgunroom/add_new_room/'.$floor_id.'/'.$gunroom_id);
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
            redirect('assistantgunroom/allocate_rooms');
        } else {
            $this->session->set_flashdata('failure', 'Something went wrong, try again.');
            redirect('assistantgunroom/allocate_rooms');
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
