<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class appointment extends CI_Model {
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
		$this->form_validation->set_rules('date', 'Date', 'required|min_length[10]|max_length[10]'); 
		$this->form_validation->set_rules('tasks', 'Task', 'required|min_length[5]|max_length[200]'); 
		$result = validate($this->form_validation); 
		if($result == 'valid')
		{
			$date = $data['date']; 
			if(strtotime($date) < date())
			{
				return 'check_date'; 
			}
			else 
			{
				return 'valid';
			}
		} else {
			return $result; 
		}
	}
	public function add_appointment($data)
	{
		$query = "INSERT INTO appointments (tasks, status, date, created_by, created_at, updated_at, user_id)
				  VALUES (?,?,?,?,NOW(), NOW(), ?)";
		$values = array($data['tasks'], $data['status'], $data['date'], $data['created_by'], $data['created_by']);
		return $this->db->query($query, $values);
	}
	public function get_appointments($data)
	{
		$query = "SELECT 
					    p.id AS appointment_id,
					    p.tasks,
					    p.status,
					    p.date,
					    p.created_at,
					    p.updated_at,
					    users.name,
					    users.id AS created_by_id,
					    users.email
					FROM
					    appointments AS p
					        LEFT JOIN
					    users ON p.user_id = users.id
					WHERE
					    created_by = ?
					ORDER BY p.created_at DESC"; 
		$values = array($data['id']);
		return $this->db->query($query, $values)->result_array(); 
	}
	public function update_appointment($id, $data)
	{
		$query = "UPDATE appointments 
						SET 
							tasks = ?,
					   		status = ?,
					    	date = ?,
					    	updated_at = NOW()
						WHERE
					    		id = ?";
		$values = array($data['tasks'], $data['status'], $data['date'], $id);
		return $this->db->query($query, $values);

	}
	public function delete_appointment($id)
	{
		$query = "DELETE FROM appointments 
				  WHERE
				      id = ?"; 
		$values = array($id); 
		return $this->db->query($query, $values);

	}
	public function get_appointment($id)
	{
		$query = "SELECT 
					    p.id AS appointment_id,
					    p.tasks,
					    p.status,
					    p.date,
					    p.created_at,
					    p.updated_at,
					    users.name,
					    users.id AS created_by_id,
					    users.email
					FROM
					    appointments AS p
					        LEFT JOIN
					    users ON p.user_id = users.id
					WHERE
					    p.id = ?";
		$values = array($id); 
		return $this->db->query($query, $values)->row_array(); 
	}
}