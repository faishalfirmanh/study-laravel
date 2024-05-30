<?php

namespace App\Repository;

use App\Models\Karyawan;

class KaryawanRepositoryImplement implements KaryawanRepository{

    protected $model;
    public function __construct(Karyawan $model)
    {
        $this->model = $model;
    }



    public function getAllKaryawanPaginate($limit,$keyword){
        return $this->model->limit($limit)->paginate($limit);
    }

    public function getKaryawanById($id){
        return $this->model->where('id',$id)->first();
    }

    public function postKaryawan($data,$id){
        $model_save = $this->model;
        if ($id != NULL) {
            $model_save = $this->model->where('id',$id)->first();
            $model_save->name = $data->name;
            $model_save->email = $data->email;
        }else{
            $model_save->name = $data->name;
            $model_save->email = $data->email;
        }
        $model_save->save();
        return $model_save->fresh();
    }


    public function deleteKaryawan($id){
        $model = $this->model->find($id);
        return $model->delete();
    }

}