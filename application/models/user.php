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
			$this->form_validation->set_rules('name', 'Name', 'required|min_length[3]|max_length[45]|trim|ucwords');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email'); 
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[45]|trim|matches[confirm_password]|md5');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|trim|md5');
			$this->form_validation->set_rules('dob', 'Date of Birth', 'required|min_length[10]|max_length[10]');
			return validate($this->form_validation);		
		} 
		else if ($data['form'] == 'login')
		{
			$this->form_validation->set_rules('email_2', 'Email', 'required|trim|valid_email');
			$this->form_validation->set_rules('password_2', 'Password', 'required|min_length[8]|trim|md5');
			return validate($this->form_validation);
		}
	}
	public function register($user)
	{
		$query = "INSERT INTO users (name, email, password, dob, created_at, updated_at)
				  VALUES (?,?,?,?,NOW(),NOW())";
		$values = array($user['name'], $user['email'], $user['password'], $user['dob']);
		return $this->db->query($query, $values);
	}
	// used in registration and login
	public function get_user_by_email($data)
	{
		$query = "SELECT * FROM users WHERE email = ?";
		$values = array($data['email']);
		return $this->db->query($query, $values)->row_array();
	}
	public function check_date($data)
	{
		list($month, $day, $year) = explode('/', $data['dob']); 
		var_dump($data['dob']);
		if(!checkdate($month, $day, $year))
		{
			return false; 
		} else {
			return true; 
		}
	}
	public function get_user($id)
	{
		$query = "SELECT 
					    first_name, last_name, email
					FROM
					    users
					WHERE
					    id = ?";
		$values = array($id);
		return $this->db->query($query, $values)->row_array(); 
	}
}