<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointments extends CI_Controller {
	public function __construct()
	{
		parent::__construct(); 
		$this->load->model('Appointment');
	}
	public function index()
	{
		$user = $this->session->userdata('user'); // assign session data to user variable
		$results = $this->Appointment->get_appointments($user); // get userdata from database
		$this->session->set_userdata('appointments', $results); // assign appointment data to session
		$this->load->view('appointment_profile');
	}
	public function add()
	{
		$result = $this->Appointment->validate($this->input->post());
		if($result == 'valid')
		{
			$this->Appointment->add_appointment($this->input->post());
			$this->session->set_flashdata('success', "<p>Your appointment was successfully created</p>"); 
			redirect('/Appointments'); 
		} 
		else if ($result == 'check_date')
		{
			$this->session->set_flashdata('errors','<p>Please select a future date</p>'); 
			redirect('/Appointments'); 
		}
		else 
		{
			$this->session->set_flashdata('errors', $result);
			redirect('/Appointments');
		}
	}
	public function delete($id)
	{
		$this->Appointment->delete_appointment($id);
		redirect('/Appointments'); 
	}
	public function edit($id)
	{
		$result = $this->Appointment->get_appointment($id);
		$this->session->set_userdata('appointment', $result);
		$this->load->view('appointment'); 
	}
	public function update($id)
	{
		$this->Appointment->update_appointment($id, $this->input->post()); 
		redirect("/Appointments");
	}
}
