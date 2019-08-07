<?php

namespace app\Services;

class JWTService extends Services {

  public function getTokenUser($id) {

    $token = $this->jwt->encode($id, $this->settings['jwt']['key']);
    return $token;
    //$token['name'] = $name;
    //$token['encodedEmail'] = $this->jwt->encode($name, $this->settings['jwt']['key']);
   // $token['decodeName'] = $this->jwt->decode(
     // $token['encodedName'],
      //$this->settings['jwt']['key'],
      //$this->settings['jwt']['algorithms']
    //);
  }

  public function verifyToken($token) {
    $decodedToken = $this->jwt->decode(
      $token,
      $this->settings['jwt']['key'],
      $this->settings['jwt']['algorithms']
    );

    return $decodedToken;
  }

}

?>