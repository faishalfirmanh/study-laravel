<?php

namespace App\Http\Traits;

trait ResponseApi{
    
  

    public function responseSucess($data){
        return response()->json([
            "status"=>"ok",
            "msg"=> "success",
            "data"=> $data
        ],200);
    }

    public function responseNotFound($data){
        return response()->json([
            "status"=>"no",
            "msg"=> "error",
            "data"=>$data
        ],404);
    }

   public function responseError($data){
    return response()->json([
        "status"=>"no",
        "msg"=> "error",
        "data"=>$data
    ],400);
   }


   public function responseGeneral($data){
      if ($data == true) {
         $this->responseSucess($data);
      }else{
        $this->responseError($data);
      }
   }
}