<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Service\KaryawanService;
use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\ResponseApi;
use Illuminate\Support\Facades\Redis;

class KaryawanController extends Controller
{

    public $service;
    
    public function __construct(KaryawanService $service)
    {
        $this->service = $service;
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */

     public function getAllData(Request $request)
    {
        $data = $this->service->getAllKaryawanServicePaginate($request);
        return $this->responseSucess($data);
    } 

     
    public function details(Request $request)
    {
        $data = $this->service->getKaryawanByIdService($request);
        return $this->responseGeneral($data);
    } 

    public function saved(Request $request)
    {
        $data = $this->service->postKaryawanService($request,$request->id);
        return $this->responseGeneral($data);
    } 
  


    public function remove(Request $request)
    {
        $data = $this->service->deleteKaryawanService($request);
        return $this->responseGeneral($data);
        
    }


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
      if (gettype($data) == "boolean") {
         return $this->responseSucess($data);
      }else{
        if (get_class($data) == "App\Models\Karyawan") {
            return $this->responseSucess($data);
         }else{
            return $this->responseError($data);
         }
      }
     
   }
   
}
