<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		  $this->load->helper(array('form', 'url'));

		$this->load->model('M_notifikasi');
	}
	public function fetch()
	{
		$id = $this->input->post("id");
		
		//if(isset($this->input->post("view"))){
			if($this->input->post("view") != ''){
				$data['id_alumni']=$id;
				$data['statusNotifikasi']=1;
				$this->M_notifikasi->updateNotif($data);
			}
			$result= $this->M_notifikasi->get_notif($id)->result_array();
			$output='';
			if(count($result) > 0)
			 {
				 $output .= '<li class="header">You have messages</li>
				 <li>
                  <!-- inner menu: contains the messages -->
                  <ul class="menu">';
				 foreach($result as $res){
					 
					   $output .= '
                    <li><!-- start message -->
                      <a href="#">
                        <div class="pull-left">
                        </div>
                        <!-- Message title and timestamp -->
                        <h4>'.$res["subjek"].'
                          
                        </h4>
                        <!-- The message -->
                        <p>'.$res["pesan"].'</p>
                      </a>
                    </li>
                    <!-- end message -->
                  ';
				 }
			  $output .= '</ul>
                  <!-- /.menu -->
                </li>
                <li class="footer"><a href="#">See All Messages</a></li>';
			 }
			 else
			 {
			  $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
			 }
			 $count=$this->M_notifikasi->jumlahNotif($id);
			 $data = array(
			  'notification'   => $output,
			  'unseen_notification' => $count
			 );
			 echo json_encode($data);
		//}
	}
	
	
	
}
?>