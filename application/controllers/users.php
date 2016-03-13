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
	public function add()
	{
		// validate user input for registration
		$result = $this->user->validate($this->input->post());
		if($result == 'valid')
		{	
			// register user if input fields meet requirments
			$post = $this->input->post();
			if(!$this->user->get_user_by_username($post))
			{
				$this->user->register($post);
				$user = $this->user->get_user_by_username($post);
				$this->session->set_userdata('user', $user);
				// redirect to _____________________________________
				redirect('/');
			}
			else 
			{
				$this->session->set_flashdata('errors', '<p>Please choose another username</p>');
				redirect('/users');
			}
		}
		else 
		{
			$this->session->set_flashdata('errors', $result);
			redirect('/users');
		}
	}
	public function login()
	{
		$result = $this->user->validate($this->input->post());
		if($result == 'valid')
		{
			$data['username'] = $this->input->post('username_2');
			$user = $this->user->get_user_by_username($data);
			if($user && $user['password'] == $this->input->post('password_2'))
			{
				$this->session->set_userdata('user', $user);
				redirect('/travels');
			}
			else 
			{
				$this->session->set_flashdata('errors', "<p>Username and Password don't match</p>");
				redirect('/users');
			}
		}
		else 
		{
			$this->session->set_flashdata('errors', $result);
			redirect('/users');
		}
	}
	public function logout()
	{
		$this->session->sess_destroy(); 
		redirect('/users');
	}
}
