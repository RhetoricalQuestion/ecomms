<?php
 
    class Admin extends CI_Controller {
        public function __construct(){
            
        parent::__construct();
            $this->load->helper('url');
            $this->load->model('user_model');
            $this->load->library('session');
 
        }
        function index(){  
           $data["title"] = "Codeigniter Ajax CRUD with Data Tables and Bootstrap Modals";  
           $this->load->view('templates/headercom.php', $data);
            $this->load->view('pages/home_admin.php', $data);
            $this->load->view('templates/footercom.php', $data);
      }  
      function fetch_user(){  
           $this->load->model("Admin_model");  
           $fetch_data = $this->Admin_model->make_datatables();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '<img src="'.base_url().'assets/item_images'.$row->prod_image.'" class="img-thumbnail" width="50" height="35" />';
                $sub_array[] = $row->prod_name;  
                $sub_array[] = $row->prod_code;
                $sub_array[] = $row->prod_stock;
                $sub_array[] = $row->prod_price;
                $sub_array[] = '<button type="button" name="delete" id="'.$row->prod_id.'" class="btn btn-danger btn-xs">Delete</button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"            =>     $this->Admin_model->get_all_data(),  
                "recordsFiltered"         =>     $this->Admin_model->get_filtered_data(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  
      }  
      function user_action(){  
           if($_POST["action"] == "Add")  
           {  
                $insert_data = array(  
                    'prod_name'          =>     $this->input->post('prod_name'),  
                    'prod_code'          =>     $this->input->post("prod_code"),  
                    'prod_stock'         =>     $this->input->post('prod_stock'),  
                    'prod_price'         =>     $this->input->post('prod_price'),  
                    'prod_image'         =>     $this->upload_image()  
                );  
                $this->load->model('Admin_model');  
                $this->Admin_model->insert_crud($insert_data);  
                echo 'Data Inserted';  
           }  
      }  
      function upload_image()  
      {  
           if(isset($_FILES["prod_image"]))  
           {  
                $extension = explode('.', $_FILES['prod_image']['name']);  
                $new_name = rand() . '.' . $extension[1];  
                $destination = '.index.php/assets/item_images' . $new_name;  
                move_uploaded_file($_FILES['prod_image']['tmp_name'], $destination);  
                return $new_name;  
           }  
      }  
    }