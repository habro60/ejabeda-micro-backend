<?php
namespace App\Repository\gl_account;

interface gl_accountInterface{
    public function get_all_data();
    public function accountStoreOrUpdate($id = null,$data);
    public function accountdelete($id);
    public function getChildren($glaccount);
    public function sl_gl_account_category();
    public function sl_gl_account_type();

}