<?php

class HomeController extends BaseController
{
   public function showRent()
   {
      $this->render('Rent/rentAHouse');
   }


   public function ShowHome()
   {
      // var_dump($_SESSION['user_loged_in_id']);die();
      // if(!isset($_SESSION['user_loged_in_id'])){
      //    header("Location: /login ");
      //    exit;
      // }
      $this->render('Home');
   }
}
