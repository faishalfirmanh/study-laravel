<?php

namespace App\Service;

interface KaryawanService{
    public function getAllKaryawanServicePaginate($request);
    public function getKaryawanByIdService($id);
    public function postKaryawanService($data,$id);
    public function deleteKaryawanService($id);
}