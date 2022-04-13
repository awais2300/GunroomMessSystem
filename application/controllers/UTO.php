<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;

class UTO extends CI_Controller
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
            $this->load->view('uto/dashboard');
        } else {
            $this->load->view('login');
        }
    }
    public function gunroom1(){
        if ($this->session->has_userdata('user_id')) {
            $data['room_occupied'] = $this->db->where('gunroom_id','1')->where('status!=','vacant')->from("gunrooms_rooms")->count_all_results();
            $data['room_vacant'] = $this->db->where('gunroom_id','1')->where('status','vacant')->from("gunrooms_rooms")->count_all_results();
            $data['accomodated_officers'] = $this->db->where('gunroom_id','1')->where('allocated_to!=','')->from("gunrooms_rooms")->count_all_results();
          //  echo  $data['accomodated_officers'];exit;
            $this->load->view('uto/Gunroom1',$data);
        }
    }
    public function gunroom2(){
        if ($this->session->has_userdata('user_id')) {
            $data['room_occupied_2'] = $this->db->where('gunroom_id','2')->where('status!=','vacant')->from("gunrooms_rooms")->count_all_results();
            $data['room_vacant_2'] = $this->db->where('gunroom_id','2')->where('status','vacant')->from("gunrooms_rooms")->count_all_results();
            $data['accomodated_officers_2'] = $this->db->where('gunroom_id','2')->where('allocated_to!=','')->from("gunrooms_rooms")->count_all_results();
            $this->load->view('uto/Gunroom2',$data);
        }
    }
    public function gunroom3(){
        if ($this->session->has_userdata('user_id')) {
            $data['room_occupied_3'] = $this->db->where('gunroom_id','3')->where('status!=','vacant')->from("gunrooms_rooms")->count_all_results();
            $data['room_vacant_3'] = $this->db->where('gunroom_id','3')->where('status','vacant')->from("gunrooms_rooms")->count_all_results();;
            $data['accomodated_officers_3'] = $this->db->where('gunroom_id','3')->where('allocated_to!=','')->from("gunrooms_rooms")->count_all_results();
            $this->load->view('uto/Gunroom3',$data);
        }
    }

    public function gunroom1_floor1(){
        if ($this->session->has_userdata('user_id')) {
            $this->load->view('uto/Gunroom1-Floor1');
        }
    }
    public function gunroom1_floor2(){
        if ($this->session->has_userdata('user_id')) {
            $this->load->view('uto/Gunroom1-Floor2');
        }
    }
    public function gunroom1_floor3(){
        if ($this->session->has_userdata('user_id')) {
            $this->load->view('uto/Gunroom1-Floor3',);
        }
    }

    public function gunroom2_floor1(){
        if ($this->session->has_userdata('user_id')) {
            $this->load->view('uto/Gunroom2-Floor1');
        }
    }
    public function gunroom2_floor2(){
        if ($this->session->has_userdata('user_id')) {
            $this->load->view('uto/Gunroom2-Floor2');
        }
    }
    public function gunroom2_floor3(){
        if ($this->session->has_userdata('user_id')) {
            $this->load->view('uto/Gunroom2-Floor3',);
        }
    }

    public function gunroom3_floor1(){
        if ($this->session->has_userdata('user_id')) {
            $this->load->view('uto/Gunroom3-Floor1');
        }
    }
    public function gunroom3_floor2(){
        if ($this->session->has_userdata('user_id')) {
            $this->load->view('uto/Gunroom3-Floor2');
        }
    }
    public function gunroom3_floor3(){
        if ($this->session->has_userdata('user_id')) {
            $this->load->view('uto/Gunroom3-Floor3',);
        }
    }

    public function complaint(){
        if ($this->session->has_userdata('user_id')) {
            $data['complaint_data'] = $this->db->where('name',$this->session->userdata('username'))->where('type',$this->session->userdata('login_type'))->order_by('date','desc')->get('complaints')->result_array();
            $query=$this->db->set('seen','yes')->where('seen','no')->where('type',$this->session->userdata('login_type'))->update('complaints');
            if($query){
            $this->load->view('uto/complaint',$data);
            }
        }
    }

    public function register_complaint(){
        if ($this->session->has_userdata('user_id')) {
            //$data['complaint_data'] = $this->db->where('name',$this->session->userdata('username'))->get('complaints')->result_array();
            $this->load->view('uto/register_complaint');
        }
    }

    public function add_complaint_process()
    {
        $postData = $this->security->xss_clean($this->input->post());

        $name = $postData['name'];
        $p_no = $postData['p_no'];
        $date = $postData['date'];
        $allocated_to = $postData['allocated_to'];
        $type = $postData['type'];
        $location = $postData['location'];
        $description= $postData['description'];
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
            $attachement = '';
        }
       
                $insert_array = array(
                    'name' => $name,
                    'p_no' => $p_no,
                    'description' => $description,
                    'date' =>$date,
                    'allocated_to' => $allocated_to,
                    'type'=> $type,
                    'attachement' => $attachement,
                    'location'=>$location,
                    'seen'=>'no',
                    'admin_seen'=>'no'
                );
                //print_r($insert_array);exit;
                $insert = $this->db->insert('complaints', $insert_array);
     

        if (!empty($insert)) {
            $this->session->set_flashdata('success', 'Complaint Submitted successfully');
            redirect('uto/complaint');
        } else {
            $this->session->set_flashdata('failure', 'Something went wrong, try again.');
            redirect('uto/register_complaint');
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


    public function progress_report($project_id = NULL)
    {
        if ($this->session->has_userdata('user_id')) {

            // require_once $_SERVER['DOCUMENT_ROOT'] . 'ConstManagementSys/application/third_party/dompdf/vendor/autoload.php';
            require_once APPPATH . 'third_party/dompdf/vendor/autoload.php';
            // require_once base_url().'application/third_party/dompdf/vendor/autoload.php';
            //spl_autoload_register('DOMPDF_autoload');
            $options = new Options();
            $options->set('isRemoteEnabled', TRUE);
            $options->set('enable_html5_parser', TRUE);
            $options->set('tempDir', $_SERVER['DOCUMENT_ROOT'] . '/pdf-export/tmp');
            $dompdf = new Dompdf($options);
            $dompdf->set_base_path($_SERVER['DOCUMENT_ROOT'] . '');

            $id = $this->session->userdata('user_id');

            $this->db->select('p.*,c.Name as contractor_name, IFNULL(pb.bid_amount,0.00) as bid_amount, sum(progress_percentage) as total_percentage, count(progress_percentage) as total_rows');
            $this->db->from('projects p');
            $this->db->where('p.ID', $project_id);
            $this->db->join('contractors c', 'p.contractor_id = c.ID', 'left');
            $this->db->join('project_bids pb',  'p.bid_id = pb.id', 'p.ID = pb.project_id', 'left');
            $this->db->join('project_progress pp', 'p.ID = pp.project_id', 'left');
            $this->db->join('project_schedule ps', 'pp.task_id = ps.id', 'left');
            if ($this->session->userdata('acct_type') != 'admin_super') {
                $this->db->where('p.region', $this->session->userdata('region'));
            }
            $this->db->group_by('p.Name, p.Code, p.Start_date, p.status');
            // print_r($this->db);exit;
            $data['project_record'] = $this->db->get()->row_array();


            $this->db->select('pp.*,ps.schedule_name, ps.schedule_start_date, ps.schedule_end_date');
            $this->db->from('project_progress pp');
            $this->db->join('project_schedule ps', 'pp.task_id = ps.id');
            $this->db->where('pp.project_id = ps.project_id');
            $this->db->where('pp.project_id', $project_id);
            if ($this->session->userdata('acct_type') != 'admin_super') {
                $this->db->where('pp.region', $this->session->userdata('region'));
            }
            $data['project_progress'] = $this->db->get()->result_array();

            $html = $this->load->view('uto/progress_report', $data, TRUE); //$graph, TRUE);
            /**/
            $dompdf->loadHtml($html);

            // (Optional) Setup the paper size and orientation
            //$dompdf->setPaper('A4', 'landscape');

            // Render the HTML as PDF
            $dompdf->render();

            $output = $dompdf->output();
            $doc_name = 'Project Report.pdf';
            file_put_contents($doc_name, $output);
            redirect($doc_name);
            //exit;
        } else {
            $this->load->view('userpanel/login');
        }
    }

    public function report_projects()
    {
        if ($this->session->has_userdata('user_id')) {

            require_once APPPATH . 'third_party/dompdf/vendor/autoload.php';

            $options = new Options();
            $options->set('isRemoteEnabled', TRUE);
            $options->set('enable_html5_parser', TRUE);
            $options->set('tempDir', $_SERVER['DOCUMENT_ROOT'] . '/pdf-export/tmp');
            $dompdf = new Dompdf($options);
            $dompdf->set_base_path($_SERVER['DOCUMENT_ROOT'] . '');

            $id = $this->session->userdata('user_id');

            $this->db->select('*');
            $this->db->from('projects');
            $this->db->where('Created_by', $this->session->userdata('username'));
            if ($this->session->userdata('acct_type') != 'admin_super') {
                $this->db->where('region', $this->session->userdata('region'));
            }
            $data['project_record'] = $this->db->get()->result_array();

            $html = $this->load->view('uto/project_report', $data, TRUE); //$graph, TRUE);

            $dompdf->loadHtml($html);
            $dompdf->render();

            $output = $dompdf->output();
            $doc_name = 'Projects Report.pdf';
            file_put_contents($doc_name, $output);
            redirect($doc_name);
            //exit;
        } else {
            $this->load->view('userpanel/login');
        }
    }

    public function report_contractor()
    {
        if ($this->session->has_userdata('user_id')) {

            require_once APPPATH . 'third_party/dompdf/vendor/autoload.php';

            $options = new Options();
            $options->set('isRemoteEnabled', TRUE);
            $options->set('enable_html5_parser', TRUE);
            $options->set('tempDir', $_SERVER['DOCUMENT_ROOT'] . '/pdf-export/tmp');
            $dompdf = new Dompdf($options);
            $dompdf->set_base_path($_SERVER['DOCUMENT_ROOT'] . '');

            $id = $this->session->userdata('user_id');

            $this->db->select('*');
            $this->db->from('contractors');
            if ($this->session->userdata('acct_type') != 'admin_super') {
                $this->db->where('region', $this->session->userdata('region'));
            }
            $data['contractor_records'] = $this->db->get()->result_array();

            $html = $this->load->view('uto/contractor_report', $data, TRUE); //$graph, TRUE);

            $dompdf->loadHtml($html);
            $dompdf->render();

            $output = $dompdf->output();
            $doc_name = 'Contractor List Report.pdf';
            file_put_contents($doc_name, $output);
            redirect($doc_name);
            //exit;
        } else {
            $this->load->view('userpanel/login');
        }
    }

    public function generate_barcode($code = null)
    {
        $data['bar_code'] = $code;
        // echo $data; exit;
        $this->load->view('uto/barcode.php', $data);
    }

    public function search_officer_for_allocation()
    {
        if ($this->input->post()) {
            $p_no = $_POST['p_no'];
            $query['officer'] = $this->db->where('p_no', $p_no)->get('officers')->row_array();
            $query['exist'] = $this->db->where('officer_id',  $query['officer']['id'])->where('status', 'open')->get('weapon_allocation_records')->row_array();
            //print_r($query['exist']);exit;
            echo json_encode($query);
        }
    }
}
