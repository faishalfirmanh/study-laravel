<?php

namespace App\Service;

use App\Repository\KaryawanRepository;
use Illuminate\Support\Facades\Validator;
class KaryawanServiceImplement implements KaryawanService{

    protected $KaryawanRepository;
    public function __construct(KaryawanRepository $KaryawanRepository)
    {
        $this->KaryawanRepository = $KaryawanRepository;
    }

    public function getAllKaryawanServicePaginate($request){
       
        $validated = Validator::make($request->all(),[
            'limit' => 'required|integer',
            'page' => 'integer|nullable',
        ]);
        if ($validated->fails()) {
            return $validated->errors();
        }
        if (empty($request->page)) {
            $request->page = 1;
        }

        $data = $this->KaryawanRepository->getAllKaryawanPaginate($request->limit,$request->page);

        return $data;
    }   

    public function getKaryawanByidService($request){
        $validated = Validator::make($request->all(),[
            'id' => 'required|exists:karyawans,id'
        ]);
        if ($validated->fails()) {
            return $validated->errors();
        }
        return $this->KaryawanRepository->getKaryawanById($request->id);
    }

    public function postKaryawanService($request,$id){

        $cek_update = $request->id !== null ? 'required|exists:karyawans,id' : 'nullable';

        if ($id > 0) {
            $cek = $this->KaryawanRepository->getKaryawanById($id);
            if ($cek != NULL) {
                $email = $cek->email == $request->email ? '' : 'unique:karyawans,email';
            }else{
                $email = 'unique:karyawans,email';
            }
        }else{
              $email = 'unique:karyawans,email';
        }

        $validated = Validator::make($request->all(),[
            'id' => $cek_update,
            'name' => 'required|string',
            'email' => 'required|string|'.$email
        ]);
        if ($validated->fails()) {
            return $validated->errors();
        }
        $id = $request->id;

        $data = $this->KaryawanRepository->postKaryawan($request,$id);
        return  $data;
    }
    
    public function deleteKaryawanService($id){
        $validated = Validator::make($id->all(),[
            'id' => 'required|integer|exists:karyawans,id'
        ]);
        if ($validated->fails()) {
            return $validated->errors();
        }
        $delete = $this->KaryawanRepository->deleteKaryawan($id->id);
        return $delete;
    }

}