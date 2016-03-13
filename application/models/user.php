<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		function validate($data)
		{
			if($data->run())
			{
				return 'valid';
			} else {
				return validation_errors();
			}
		}
	}
	public function validate($data)
	{
		if ($data['form'] == 'registration' )
		{
			$this->form_validation->set_rules('first_name', 'First Name', 'required|min_length[3]|max_length[45]|trim|ucwords');
			$this->form_validation->set_rules('last_name', 'Last Name', 'required|min_length[3]|max_length[45]|trim|ucwords');
			$this->form_validation->set_rules('username', 'User Name', 'required|min_length[3]|max_length[45]|trim|ucwords');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[45]|trim|matches[confirm_password]|md5');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|trim|md5');
			return validate($this->form_validation);
			
		} 
		else if ($data['form'] == 'login')
		{
			$this->form_validation->set_rules('username_2', 'User Name', 'required|ucwords|min_length[3]|trim');
			$this->form_validation->set_rules('password_2', 'Password', 'required|min_length[8]|trim|md5');
			return validate($this->form_validation);
		}
		// else if ($data['form'] == 'trip')
		// {
		// 	$this->form_validation->set_rules('destination', 'Destination', 'required|min_length[3]|max_length[45]|trim|ucwords');
		// 	$this->form_validation->set_rules('description', 'Description', 'required|min_length[3]|trim|ucfirst');
		// 	$this->form_validation->set_rules('from_date', 'Travel Date From', 'required|min_length[10]|max_length[10]|trim');
		// 	$this->form_validation->set_rules('to_date', 'Travel Date To', 'required|min_length[10]|max_length[10]|trim');
		// 	return validate($this->form_validation);
		// }
	}
	public function register($user)
	{
		$query = "INSERT INTO users (first_name, last_name, username, password, created_at, updated_at)
				  VALUES (?,?,?,?,NOW(),NOW())";
		$values = array($user['first_name'], $user['last_name'], $user['username'], $user['password']);
		return $this->db->query($query, $values);
	}
	public function get_user_by_username($post)
	{
		$query = "SELECT * FROM users WHERE username = ?";
		$values = array($post['username']);
		return $this->db->query($query, $values)->row_array();
	}

}