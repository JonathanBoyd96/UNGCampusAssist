<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
	private $data = array();
	public function __construct()
	{
		 parent::__construct();
		 $this->data['title'] = "Pages - ";
	}

	public function index()
	{
		$this->data['title'] .= "Home";
		$this->data['content'] = "welcome_message";
		$this->load->view('template/baseTemplate', $this->data);
	}
	public function form()
	{
		$this->form_validation->set_rules("first", "First Name", "required");
		$this->form_validation->set_rules("last", "Last Name", "required");
		$this->form_validation->set_rules("email", "Email", "required|valid_email");
		$this->form_validation->set_rules("submit", "files","required");
		$validate = $this->form_validation->run();
		if($validate)
		{
			$this->load->model("students_model");
			$first = $this->input->post("first");
			$last = $this->input->post("last");
			$email = $this->input->post("email");
			$image = $this->file_upload();

			
			/**/
			$id = $this->students_model->insert(
				$first, 
				$last,
				$email,
				$image
			);
			/**/
			echo "New Record ID:".$id;
			echo '<a href= "'.site_url("Pages/imageResize") .'/'.$id.'" target="blank"> Resize Image</a> <a href= "'.site_url("Pages/showOriginalImage") .'/'.$id.'" target="blank"> Original Image</a> <a href= "'.site_url("Pages/showImage") .'/'.$id.'" target="blank"> Show Resized Image</a>';
		}
		
		$this->data['title'] .= "Form";
		$this->data['content'] = "pages/form";
		$this->load->view('template/baseTemplate', $this->data);
	}
	public function file_upload()
	{
		$config['upload_path']='G:\\PleskVhosts\\christianbrooks.net\\ci.christianbrooks.net\\uploads';
		$config['allowed_types']='jpg|png|jpeg';
		$config['file_name']=$_FILES['file_name']['name'];
		$this->load->library('upload',$config);
		$this->upload->do_upload('file_name');
		$file_name=$this->upload->data();
		echo $this->upload->display_errors();
		return $file_name['file_name'];
	}
	public function helperDemo()
	{
		$this->load->helper("dateformat");
		echo dateFormat(time());
	}
	public function imageResize()
	{
		//$config['image_library'] = 'gd2';
		if(is_numeric($this->uri->segment(3)))
		{
			//get image from database
			$this->load->model("students_model");
			$file = $this->students_model->getImage($this->uri->segment(3));
			
			
		
		$config['source_image'] = 'G:\\PleskVhosts\\christianbrooks.net\\ci.christianbrooks.net\\uploads\\'.$file[0]->IMAGE;
		echo $config['source_image'];
		$config['new_image'] = '75_width'.$file[0]->IMAGE;
		$config['width']         = 75;
		
		$this->load->library('image_lib', $config);
		
		if($this->image_lib->resize())
			echo "Resized";
		else
		{
			echo $this->image_lib->display_errors();
			echo "did not resize";
		}
		}
	}
	public function showImage()
	{
		$this->load->helper('file');
		$image = 'G:\\PleskVhosts\\christianbrooks.net\\ci.christianbrooks.net\\uploads';
		if(is_numeric($this->uri->segment(3)))
		{
			//get image name from database
			$this->load->model("students_model");
			$file = $this->students_model->getImage($this->uri->segment(3));
			
			//append image name to $imageVariable
			$image.='\75_width'.$file[0]->IMAGE;
		}
		$this->output->set_content_type(get_mime_by_extension($image));
		$this->output->set_output(file_get_contents($image));
		//echo $image;
	}
	public function showOriginalImage()
	{
		$this->load->helper('file');
		$image = 'G:\\PleskVhosts\\christianbrooks.net\\ci.christianbrooks.net\\uploads';
		if(is_numeric($this->uri->segment(3)))
		{
			//get image name from database
			$this->load->model("students_model");
			$file = $this->students_model->getImage($this->uri->segment(3));
			
			//append image name to $imageVariable
			$image.='\\'.$file[0]->IMAGE;
		}
		$this->output->set_content_type(get_mime_by_extension($image));
		$this->output->set_output(file_get_contents($image));
		//echo $image;
	}
	public function uriExample()
	{
		echo "Enter a number as the 3rd folder path and it will load that record number<br>";
		for($i = 1; $i < 5; $i++)
			echo "Segment ".$i.": ".$this->uri->segment($i)."<br>";
		
		if(is_numeric($this->uri->segment(3)))
		{
			$this->data['title'] .= "Report";
			$this->data['content'] = "pages/report";
			$this->load->model("students_model");
			$this->data['results'] = $this->students_model->selectByID($this->uri->segment(3));
			$this->load->view('template/baseTemplate', $this->data);
		}
	}
	public function ajaxSend()
	{
		$view = "pages/ajaxHTML";
		$last = "";
		if($this->uri->segment(3) !== FALSE)
		{
			$last = $this->uri->segment(3);
		}
		if(strtolower($this->uri->segment(4)) == "object")
		{
			$view = "pages/ajaxJSON";
		}
		$this->load->model("students_model");
		$this->data['results'] = $this->students_model->selectByLastName($last);
		$this->load->view($view, $this->data);
	}
	public function ajaxReceive()
	{
		$this->data['title'] .= "AJAX";
		$this->data['content'] = "pages/ajaxReceive";
		$this->load->view('template/baseTemplate', $this->data);
	}
}
?>