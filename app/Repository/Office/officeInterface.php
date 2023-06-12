<?php
namespace App\Repository\Office;

interface officeInterface{
    
    public function getAllData();
    public function storeOrUpdate($id = null,$data);
    public function view($id);
    public function delete($id);
}