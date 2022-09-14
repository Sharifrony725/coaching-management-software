public function insert()
{
$this->load->database();
$this->load->model('my_model');

$data_user = array(
'customerName' => $this->input->post('customerName'),
'phone' => $this->input->post('phone')
);

$data_address = array(
'address' => $this->input->post('address'),
'city' => $this->input->post('city'),
'zipcode' => $this->input->post('zipcode')
);

$this->my_model->insert_entry($data_user, $data_address);

[...]
}
<?php

$this->db->transStart();
$this->db->query('AN SQL QUERY...');
$this->db->query('ANOTHER QUERY...');
$this->db->query('AND YET ANOTHER QUERY...');
$this->db->transComplete();
