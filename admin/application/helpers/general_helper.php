<?php
function provinces() {
	$CI =& get_instance();
	$query  =  $CI->db->get('provinces');
	return $query->result();
}

function province($id) {
	$CI =& get_instance();
	$CI->db->where('id', $id);
	$query  =  $CI->db->get('provinces');
	return $query->row();
}

function userStatus($status) {
	switch ($status) {
		case '2':
			$label = 'Banned';
			break;
		case '0':
			$label = 'Inactive';
			break;
		
		default:
			$label = 'Active';
			break;
	}
	return $label;
}

function dd($data) {
	echo "<pre>";
	print_r($data);
	exit;
}