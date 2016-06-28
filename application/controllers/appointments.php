<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class appointments extends CI_Controller {
	public function __construct()
	{
		parent::__construct(); 
		$this->load->model('appointment');
	}
	public function index()
	{
		$user = $this->session->userdata('user'); // assign session data to user variable
		$results = $this->appointment->get_appointments($user); // get userdata from database
		$this->session->set_userdata('appointments', $results); // assign appointment data to session
		$this->load->view('appointment_profile'); 
	}
	public function add()
	{
		$result = $this->appointment->validate($this->input->post());
		if($result == 'valid')
		{
			$this->appointment->add_appointment($this->input->post());
			$this->session->set_flashdata('success', "<p>Your appointment was successfully created</p>"); 
			redirect('/appointments'); 
		} 
		else if ($result == 'check_date')
		{
			$this->session->set_flashdata('errors','<p>Please select a future date</p>'); 
			redirect('/appointments'); 
		}
		else 
		{
			$this->session->set_flashdata('errors', $result);
			redirect('/appointments');
		}
	}
	public function delete($id)
	{
		$this->appointment->delete_appointment($id);
		redirect('/appointments'); 
	}
	public function edit($id)
	{
		$result = $this->appointment->get_appointment($id);
		$this->session->set_userdata('appointment', $result);
		$this->load->view('appointment'); 
	}
	public function update($id)
	{
		$this->appointment->update_appointment($id, $this->input->post()); 
		redirect('/appointments');
	}
}
