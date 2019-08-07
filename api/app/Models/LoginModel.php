<?php

namespace app\Models;

class LoginModel extends Models {

	public function loginUser($user) {
	  $result = $this->db->get('employees',[
      'employeeNumber',
	    'email',
	    'password'
	  ], [
  		'email' => $user['email']
		]);

    if (!is_null($this->db->error()[1])) {
      return array('error' => true,'description' => $this->db->error()[2]);
    } else if (empty($result)) { // sin Datos
      return array(
      	'notFound' => true,
      	'description' => 'Email was wrong'
      );
    }

    if (!password_verify($user['password'], $result['password'])) {
    	return array(
      	'notFound' => true,
      	'description' => 'Password was wrong'
      );
    }

    return array(
      'success' => true,
      'user' => $result
    );
	}


}


?>