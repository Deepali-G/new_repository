<?php
class user extends CI_controller
{
    function index(){
       
        $this->load->model('user_model');
        $users=$this->user_model->all();
        $data=array();
        $data['users']=$users;
        $this->load->view('list',$data);

    }
   



    function create(){
        // print_r($this->input->post());
        // print_r($_FILES);
        $this->load->model('user_model');
        // $this->form_validation->set_rules('image_path','Profile pic','required');
        $this->form_validation->set_rules('user_name','Name','required');
        $this->form_validation->set_rules('email','Email ID','required|valid_email');
        $this->form_validation->set_rules('contact_number','Contact_number','required');
        $this->form_validation->set_rules('address','Address','required');
            var_dump($this->form_validation->run());
        if($this->form_validation->run()==false){
            $this->load->view('create');
        }else{
            // $this->load->library('upload');
            // $config['upload_path'] = 'upload/';
            // $config['allowed_types'] = 'gif|jpg|png|jpeg';
            // $config['max_size']     = '100';
            // $config['max_width'] = '1024';
            // $config['max_height'] = '768';
            // $this->upload->initialize($config);
            // $field_name = "image_path";
            // $response_file =  $this->upload->do_upload($field_name);
            echo "<pre>";
            print_r($_FILES);
            print_r($this->input->post());
            $file_name = $this->uploadFile();
                if($file_name == false){
                    echo "file not uploaded";
                }
            // echo "-----";
            // die;
            $formArray=array();
            $formArray['image_path'] = $file_name;
            $formArray['user_name'] = $this->input->post('user_name');
            $formArray['email'] = $this->input->post('email');
            $formArray['contact_number'] = $this->input->post('contact_number');
            $formArray['address'] = $this->input->post('address');
            $formArray['created_at'] = date('Y-m-d H:i:s');
            

            $this->user_model->create($formArray);
            $this->session->set_flashdata('success','Record added successfully');
            redirect(base_url().'index.php/user/index');
        }
        
    }

    function uploadFile(){
        print_r($_FILES);
        // die;

        $target_dir = "upload/";
        $ext = pathinfo($_FILES["image_path"]["name"], PATHINFO_EXTENSION);

$target_file = $target_dir . time().".".$ext;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["image_path"]["tmp_name"]);
            if($check !== false) {
              echo "File is an image - " . $check["mime"] . ".";
              $uploadOk = 1;
            } else {
              echo "File is not an image.";
              $uploadOk = 0;
            }
          }
          
          // Check if file already exists
          if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
          }
          
          // Check file size
          if ($_FILES["image_path"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
          }
          
          // Allow certain file formats
          if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
          && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
          }
          
          // Check if $uploadOk is set to 0 by an error
          if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
          // if everything is ok, try to upload file
          } else {
            if (move_uploaded_file($_FILES["image_path"]["tmp_name"], $target_file)) {
              echo "The file ". htmlspecialchars( basename( $_FILES["image_path"]["name"])). " has been uploaded.";
              return $target_file;
            } else {
              echo "Sorry, there was an error uploading your file.";
            }
          }
          return false;
    }
    function edit($userId){

        $this->load->model('user_model');
        $user=$this->user_model->getuser($userId);
        $data=array();
        $data['user']=$user;

        // $this->form_validation->set_rules('image_path','Profile pic','required');
        $this->form_validation->set_rules('user_name','Name','required');
        $this->form_validation->set_rules('email','Email ID','required|valid_email');
        $this->form_validation->set_rules('contact_number','Contact_number','required');
        $this->form_validation->set_rules('address','Address','required');

        var_dump($this->form_validation->run());
        // die;
        if($this->form_validation->run()==false){
            $this->load->view('edit',$data);

        }else{
            
            echo "<pre>";
            print_r($_FILES);
            print_r($this->input->post());
            $file_name = $this->uploadFile();
                if($file_name == false){
                    echo "file not uploaded";
                    die;
                }


            $formArray=array();
            $formArray['image_path'] = $file_name;
            $formArray['user_name'] = $this->input->post('user_name');
            $formArray['email'] = $this->input->post('email');
            $formArray['contact_number'] = $this->input->post('contact_number');
            $formArray['address'] = $this->input->post('address');
            $formArray['created_at'] = date('Y-m-d H:i:s');

            
            $this->user_model->updateuser($userId,$formArray);
            $this->session->set_flashdata('success','Record updated successfully!');
            redirect(base_url().'index.php/user/index');

        }
        
        
    }

    function delete($userId){
        $this->load->model('user_model');
        $user=$this->user_model->getuser($userId);
        if(empty($user)){
            $this->session->set_flashdata('failure','Record not found in database');
            redirect(base_url().'index.php/user/index');
        }
        else{
        $this->user_model->deleteuser($userId);
        $this->session->set_flashdata('success','Record deleted successfully!');
            redirect(base_url().'index.php/user/index');
        }


    }
    

}
?>