<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	public function __construct()
	{
		parent::__construct(); 
		$this->load->model('User');
	}
	public function index()
	{
		$this->load->view('login');
	}
	public function register()
	{
		$result = $this->User->validate($this->input->post());
		if($result == 'valid')
		{	
			$date = $this->User->check_date($this->input->post());
			if($date)
			{
				$post = $this->input->post();
				if(!$this->User->get_user_by_email($post))
				{
					$this->User->register($post); 
					$user = $this->User->get_user_by_email($post); 
					$this->session->set_userdata('user', $User);
					redirect('/Appointments');
				}
				else 
				{
					$this->session->set_flashdata('errors', '<p>This email is already in use. Please select another one.</p>');
					redirect('/');
				}
			} else {
				$this->session->set_flashdata('errors', '<p>Please enter a valid date</p>'); 
				redirect('/');
			}
			
		}
		else 
		{
			$this->session->set_flashdata('errors', $result);
			redirect('/');
		}
	}
	public function login()
	{
		$result = $this->User->validate($this->input->post());
		if($result == 'valid')
		{
			$data['email'] = $this->input->post('email_2');
			$user = $this->User->get_user_by_email($data);
			if($user && $user['password'] == $this->input->post('password_2'))
			{
				$this->session->set_userdata('user', $user);
				redirect('/Appointments');
			}
			else 
			{
				$this->session->set_flashdata('errors', "<p>Email and password do not match</p>");
				redirect('/');
			}
		}
		else 
		{
			$this->session->set_flashdata('errors', $result);
			redirect('/');
		}
	}
	public function logout()
	{
		$this->session->sess_destroy(); 
		redirect('/');
	}
}
