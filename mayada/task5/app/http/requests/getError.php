<?php 
namespace  app\http\requests;
class getError{
   public static function errorMessage($message){
        return ucwords(str_replace('_',' ',$message));
   }
}