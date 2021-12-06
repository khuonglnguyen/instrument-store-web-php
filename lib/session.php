<?php

/**
 *Session Class
 **/
// init file session
class Session
{
   public static function init()
   {
      if (version_compare(phpversion(), '5.4.0', '<')) {
         if (session_id() == '') {
            session_start();
         }
      } else {
         if (session_status() == PHP_SESSION_NONE) {
            session_start();
         }
      }
   }

   public static function set($key, $val)
   {
      self::init();
      $_SESSION[$key] = $val;
   }
   //set key to value

   public static function get($key)
   {
      self::init();
      if (isset($_SESSION[$key])) {
         return $_SESSION[$key];
      } else {
         return false;
      }
   }

   public static function checkSession($type)
   {
      self::init();
      if (self::get("user") == false) {
         self::destroy();
         if ($type == 'admin') {
            header("Location:../login.php");
         }
         header("Location:login.php");
      }
   }
   //check session
   public static function checkLogin()
   {
      self::init();
      if (self::get("user") == true) {
         header("Location:index.php");
      }
   }

   public static function destroy()
   {
      self::init();
      session_destroy();
      header("Location:login.php");
   }
}
