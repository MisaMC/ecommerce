<?php

namespace app\Controllers;

class LoginController extends Controller {

	public function loginUser($request, $response) {
		$user = $request->getParsedBody();
		$message = $this->LoginModel->loginUser($user);
		
		if (!$message["success"]) return json_encode($message);
		
		$token["encoded"] = $this->JWTService->getTokenUser($message["user"]["employeeNumber"]);
		// $token["decoded"] = $this->JWTService->verifyToken($token["encoded"]);
		return json_encode(array(
			'success' => true,
			'token' => $token
		));
	}

}

?>