<?php

    class Session{

      private $signedIn = false;
      public $userId,$username;

      public function __construct(){
          session_start();
          $this->checkLogin();
      }
      public function isSignedin(){
          return $this->signedIn;
      }
      public function login($user){
          if ($user) {
              $this->userId = $_SESSION['user_id'] = $user->user_id;
              $this->signedIn = true;
          }
      }
      public function logout(){
          unset($_SESSION['user_id']);
          unset($this->userId);
          $this->signedIn = false;
      }
      private function checkLogin(){
          if (isset($_SESSION['user_id'])) {
              $this->userId = $_SESSION['user_id'];

              $this->signedIn = true;
          }else{
              unset($this->userId);
              $this->signedIn = false;
          }
      }

    }

    $session = new Session();
 ?>
