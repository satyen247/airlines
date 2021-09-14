<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'libraries/REST_Controller.php');

header("Access-Control-Allow-Origin: *"); //Access-Control-Allow-Origin
header("Access-Control-Allow-Methods: POST");

class Main extends REST_Controller {

    public function __construct() {
        parent::__construct();
     }
     
     public function index_post(){
        
        $status = parent::HTTP_UNAUTHORIZED;
            $response = ['status' => $status, 'msg' => 'Unauthorized Access! '];
            $this->response($response, $status);
     }

     public function uploadservice_post(){
        try { 
            $postdata=$this->post(); 

            if(!empty($postdata))
            {
                if(!isset($postdata["description"]) || trim($postdata["description"])=='')
                {
                    $this->response(['msg' => 'Description is empty!','field'=>'description'], parent::HTTP_BAD_REQUEST);
                }else{

                    // Upload Attachment section start
                    //echo '<pre>';
                    //print_r($_FILES);
                    //die;
                    $files = $_FILES;
                    $this->load->library('image_lib');

                    if(isset($_FILES['image']['name'])){
                        $cpt = count($_FILES['image']['name']);
                        $insert=0;
                        for($i=0; $i<$cpt; $i++){  
                          if (trim($files['image']['name']) =='') {
                              continue;
                          }  

                         $fileName = time().'-'.$files['image']['name'];
                         
                          $allowedExts = array("gif", "jpeg", "jpg", "png");
                          $image_data=explode(".", $files['image']['name']);
                          $_FILES['image']['name']        = $fileName;
                          $_FILES['image']['type']        = $files['image']['type'];
                          $_FILES['image']['tmp_name']    = $files['image']['tmp_name'];
                          $_FILES['image']['error']       = $files['image']['error'];
                          $_FILES['image']['size']        = $files['image']['size']; 

                          if ((($_FILES["image"]["type"] == "image/gif")  || ($_FILES["image"]["type"] == "image/jpeg")  || ($_FILES["image"]["type"] == "image/jpg")  || ($_FILES["image"]["type"] == "image/png") )) {
                            $uploadPath = './uploads/service/';
                                 
                                   
                            if (move_uploaded_file($_FILES['image']['tmp_name'],  $uploadPath."".$fileName)){
                              $config = [];  
                              $config['image_library'] = 'gd2';
                              $config['source_image'] = $uploadPath."".$fileName;
                              $config['create_thumb'] = false;
                              $config['maintain_ratio'] = TRUE;
                              $config['width']     = 600;
                              $config['height']   = 600;
                              $this->image_lib->clear();
                              $this->image_lib->initialize($config);
                              $this->image_lib->resize();
                              $fileAttachments[] = $fileName;
                              
                            }else{
                              $not_inserted[]=$files['image']['name'];
                            }
                            
                           
                          }else{
                           $not_inserted[]= $_FILES['image']['name'];
                          }
                        }

                    }else{
                        $fileAttachments = [];
                    }
                    //Upload Attachment section end
                    $insertData = [];
                    $insertData['description'] = $postdata["description"];
                    $insertData['attachments'] = json_encode($fileAttachments);

                    $this->load->model("serviceModel");
                    $id=$this->serviceModel->insertService($insertData);

                    $id = 1;
                    if($id>0)
                    {
                        $status = parent::HTTP_OK;
                        $response = ['status' => $status,'msg'=>' Thank you for creating service.'];
                        $this->response($response, $status);
                    }else{
                        $this->response(['msg' => 'Enquiry submission failed.'], parent::HTTP_BAD_REQUEST);
                    }
                }


                

            }else{
                $this->response(['msg' => 'Invaild parameter.'], parent::HTTP_BAD_REQUEST);
 
              }
            
         } catch (Exception $e) {
           $this->response(['msg' => 'server busy .Please try again some time.'], parent::HTTP_NOT_FOUND);
      }
     }


}

?>
