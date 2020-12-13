<?php
namespace App\Services;

class ResponseService{
 public function Success($name,$message){
    return  array(
        'title'=> $name ,
        'message'=>$message,
        'alert-type' => 'success',
    );
 }
 public function error($name,$message){
    return  array(
        'title'=> $name ,
        'message'=>$message,
        'alert-type' => 'error',
    );
 }
}