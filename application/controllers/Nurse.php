<?php
  if (!defined('BASEPATH'))exit('No direct script access allowed');
  class Nurse extends CI_Controller{


    function __construct(){
        parent::__construct();

        $this->load->model('Model_nurse');
        // if($this->session->userdata("user_loggedin")==TRUE){
        //   if($this->session->userdata("type_id") == 3){
        //     redirect(base_url()."Nurse", "refresh");
        //   }
        // }else{
        //   redirect(base_url());
        // }


    }

    public function index(){
      $data['title'] = "HIS: Nurse dashboard";
      $header['tasks'] = $this->Model_nurse->get_tasks($this->session->userdata('type_id'));
      $header['permissions'] = $this->Model_nurse->get_permissions($this->session->userdata('type_id'));
      $this->load->view('nurse/includes/header.php',$header);
      $this->load->view('nurse/index.php', $data);
      $this->load->view('nurse/includes/footer.php');
    }


    public function vitalsigns(){

      $data['title'] = "HIS: Patient Vital signs";
      if(empty($this->input->post('keyword'))){
          $data['patients'] = $this -> Model_nurse -> fetchAllPatientByCategory();
      }else{
        $data['patients'] = $this -> Model_nurse -> searchPatientByLastName($this->input->post('keyword'));
      }



      $this->load->view('nurse/includes/header.php');
      $this->load->view('nurse/viewvitalsigns.php', $data);
      $this->load->view('nurse/includes/footer.php');
    }

    public function vitalshistory(){
      $data['title'] = "HIS: Patient Vital signs";
      $this->load->view('nurse/includes/header.php');
      $this->load->view('nurse/vitalshistory.php', $data);
      $this->load->view('nurse/includes/footer.php');

    }


    public function csr(){
      $data['title'] = "HIS: CSR";
      $data['CSRItems'] = $this -> Model_nurse ->fetchAllCSRItems();
      $this->load->view('nurse/includes/header.php');
      $this->load->view('nurse/csrrequest.php', $data);
      $this->load->view('nurse/includes/footer.php');
    }


    public function csr_singlerequest(){

        $this->form_validation->set_rules('stock','Stock','trim|required|is_natural_no_zero');

          if($this->form_validation->run()){

              $data = array(
                'nurse_id' => $this->session->userdata('user_id'),
                'csr_item_id' => $this->input->post('hiddenItemId'),
                'item_quant' => $this->input->post('stock'),
                'date_created' => date('Y-m-d H:i:s')
              );

              if($this->Model_nurse->CSRReqAddSingle($data)){
                $this->session->set_flashdata("succ", "<div class='alert alert-success' role='alert'> <p align='center'>Request has been sent.</p></div>");

                $this->csr();
              }else{
                $this->csr();
              }

          }else{
              $this->csr();
          }


    }






}


?>
