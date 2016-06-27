<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class users extends CI_Controller {
	public function __construct()
	{
		parent::__construct(); 
		$this->load->model('user');
	}
	public function index()
	{
		$this->load->view('login');
	}
	public function register()
	{
		$result = $this->user->validate($this->input->post());
		if($result == 'valid')
		{	
			$date = $this->user->check_date($this->input->post());
			if($date)
			{
				$post = $this->input->post();
				if(!$this->user->get_user_by_email($post))
				{
					$this->user->register($post); 
					$user = $this->user->get_user_by_email($post); 
					$this->session->set_userdata('user', $user);
					redirect('/appointments');
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
		$result = $this->user->validate($this->input->post());
		if($result == 'valid')
		{
			$data['email'] = $this->input->post('email_2');
			$user = $this->user->get_user_by_email($data);
			if($user && $user['password'] == $this->input->post('password_2'))
			{
				$this->session->set_userdata('user', $user);
				redirect('/appointments');
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
