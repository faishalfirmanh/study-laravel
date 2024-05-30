<?php

namespace App\Repository;

interface KaryawanRepository{
  
    public function getAllKaryawanPaginate($limit,$keyword);
    public function getKaryawanById($id);
    public function postKaryawan($data,$id);
    public function deleteKaryawan($id);
}