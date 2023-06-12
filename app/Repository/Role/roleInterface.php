<?php
namespace App\Repository\Role;

interface roleInterface{
    
    public function getAllData();
    public function roleCreate();
    public function storeOrUpdate($id = null,$data);
    public function view($id);
    public function delete($id);
    public function all_menu($name);
}