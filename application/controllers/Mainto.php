<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;

class Mainto extends CI_Controller
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
            $this->load->view('Mainto/dashboard');
        } else {
            $this->load->view('login');
        }
    }

    public function complaint()
    {
        if ($this->session->has_userdata('user_id')) {

            if (!empty($this->session->userdata('full_name'))) {
                $user_name =  $this->session->userdata('full_name');
            } else {
                $user_name =  $this->session->userdata('username');
            }

            $data['complaint_data'] = $this->db->where('account_type', 'gunroom')->order_by('date', 'desc')->get('complaints')->result_array();
            $query = $this->db->set('seen', 'yes')->where('seen', 'no')->where('account_type', 'gunroom')->update('complaints');
            if ($query) {
                $this->load->view('Mainto/complaint', $data);
            }
        }
    }

    public function update_complaint($complaint_id = null)
    {
        if ($this->session->has_userdata('user_id')) {
            $data['complaint_data'] = $this->db->where('id', $complaint_id)->get('complaints')->row_array();
            $this->load->view('Mainto/update_complaint', $data);
        }
    }

    public function update_complaint_process()
    {
        $postData = $this->security->xss_clean($this->input->post());

        $name = $postData['name'];
        $p_no = $postData['p_no'];
        $date = $postData['date'];
        $allocated_to = $postData['allocated_to'];
        $type = $postData['type'];
        $location = $postData['location'];
        $description = $postData['description'];
        $remarks = $postData['remarks'];
        $old_file = $postData['old_file'];
        $complaint_id = $postData['complaint_id'];
        // echo $_FILES['attachement'];exit;
        //$upload1 = $this->upload_attachement($_FILES['attachement']);
        if ($_FILES['attachement']['name'][0] != NULL) {
            $upload1 = $this->upload_attachement($_FILES['attachement']);
            if (count($upload1) > 1) {
                $attachement = implode(',', $upload1);
            } else {
                $attachement = $upload1[0];
            }
        } else {
            $attachement =  $old_file;
        }

        $insert_array = array(
            'name' => $name,
            'p_no' => $p_no,
            'description' => $description,
            'date' => $date,
            'allocated_to' => $allocated_to,
            'type' => $type,
            'attachement' => $attachement,
            'location' => $location,
            'remarks' => $remarks,
            'seen' => 'no',
            'admin_seen' => 'no'
        );
        //print_r($insert_array);exit;
        $this->db->where('id', $complaint_id);
        $insert = $this->db->update('complaints', $insert_array);


        if (!empty($insert)) {
            $this->session->set_flashdata('success', 'Remarks added successfully');
            redirect('Mainto/complaint');
        } else {
            $this->session->set_flashdata('failure', 'Something went wrong, try again.');
            redirect('Mainto/update_complaint');
        }
    }

    public function upload_attachement($fieldname)
    {
        //$data = NULL;
        //echo $fieldname;exit;
        $filesCount = count($_FILES['attachement']['name']);
        //print_r($_FILES['reg_cert']['name']);exit;
        for ($i = 0; $i < $filesCount; $i++) {
            $_FILES['file']['name']     = $_FILES['attachement']['name'][$i];
            $_FILES['file']['type']     = $_FILES['attachement']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['attachement']['tmp_name'][$i];
            $_FILES['file']['error']     = $_FILES['attachement']['error'][$i];
            $_FILES['file']['size']     = $_FILES['attachement']['size'][$i];

            $config['upload_path'] = 'uploads/complaints';
            $config['allowed_types']        = 'gif|jpg|png|doc|xls|pdf|xlsx|docx|ppt|pptx|txt';


            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            //$data['upload_data'] = '';
            if (!$this->upload->do_upload('file')) {
                $data = array('msg' => $this->upload->display_errors());
                //echo "here";exit;
            } else {
                //echo $filesCount;exit;
                $data = array('msg' => "success");
                $data['upload_data'] = $this->upload->data();
                $count[$i] = $data['upload_data']['file_name'];
            }
        } //end of for
        //print_r($count);exit();
        return $count;
    }

    
}
