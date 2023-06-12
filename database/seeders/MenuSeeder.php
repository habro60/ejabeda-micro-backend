<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Menu_item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = Menu::updateOrCreate(['name' => 'backend-sidebar', 'description' => 'This is backend sidebar', 'deletable' => false]);

        Menu_item::updateOrCreate(['menu_id' => $menu->id, 'type' => 'divider', 'parent_id' => null, 'order' => 1, 'divider_title' => 'Dashboard']);
        Menu_item::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 2, 'title' => 'Super Admin Dashboard', 'url' => "habro.dashboard", 'icon_class' => 'pe-7s-rocket']);
        Menu_item::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 3, 'title' => 'Dashboard', 'url' => "habro.user.dashboard", 'icon_class' => 'pe-7s-news-paper']);

        Menu_item::updateOrCreate(['menu_id' => $menu->id, 'type' => 'divider', 'parent_id' => null, 'order' => 4, 'divider_title' => 'Setup']);
        Menu_item::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item','parent_id' => null, 'order' => 5, 'title' => 'Office Create', 'url' => "habro.office.view", 'icon_class' => 'pe-7s-check']);
        Menu_item::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 6, 'title' => 'Product And Services', 'url' => "habro.Product&Services.view", 'icon_class' => 'pe-7s-users']);
        Menu_item::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 7, 'title' => 'Gl Account Create', 'url' => "habro.glaccount.view", 'icon_class' => 'pe-7s-users']);

        Menu_item::updateOrCreate(['menu_id' => $menu->id, 'type' => 'divider', 'parent_id' => null, 'order' => 8, 'divider_title' => 'House Keeping']);
        Menu_item::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 9, 'title' => 'Data Backup', 'url' => "habro.databackup", 'icon_class' => 'pe-7s-menu']);
        Menu_item::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 10, 'title' => 'Back Process Run', 'url' => "habro.dataclean.delete", 'icon_class' => 'pe-7s-cloud']);


        Menu_item::updateOrCreate(['menu_id' => $menu->id, 'type' => 'divider', 'parent_id' => null, 'order' => 11, 'divider_title' => 'Int And Charge']);
        Menu_item::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 12, 'title' => 'Interest Setup', 'url' => "habro.interest.view", 'icon_class' => 'pe-7s-menu']);
        Menu_item::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 13, 'title' => 'Charge', 'url' => "habro.charge.view", 'icon_class' => 'pe-7s-cloud']);
        Menu_item::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 14, 'title' => 'Penalty', 'url' => "habro.penalty.view", 'icon_class' => 'pe-7s-cloud']);

      
        Menu_item::updateOrCreate(['menu_id' => $menu->id, 'type' => 'divider', 'parent_id' => null, 'order' => 20, 'divider_title' => 'User Management']);
        Menu_item::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 21, 'title' => 'User Create', 'url' => "habro.user.view", 'icon_class' => 'pe-7s-menu']);
        Menu_item::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 22, 'title' => 'User Active', 'url' => "habro.user.active", 'icon_class' => 'pe-7s-cloud']);
        Menu_item::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 23, 'title' => 'User Inactive', 'url' => "habro.user.inactive", 'icon_class' => 'pe-7s-cloud']);
        Menu_item::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 24, 'title' => 'User Transfer', 'url' => "habro.user.transfer", 'icon_class' => 'pe-7s-cloud']);

        Menu_item::updateOrCreate(['menu_id' => $menu->id, 'type' => 'divider', 'parent_id' => null, 'order' => 25, 'divider_title' => 'Holiday']);
        Menu_item::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 26, 'title' => 'Holiday Create', 'url' => "habro.holiday.view", 'icon_class' => 'pe-7s-menu']);
       
        Menu_item::updateOrCreate(['menu_id' => $menu->id, 'type' => 'divider', 'parent_id' => null, 'order' => 27, 'divider_title' => 'Account Maintenance']);
        Menu_item::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 28, 'title' => 'Account Open', 'url' => "habro.accountopen.view", 'icon_class' => 'pe-7s-menu']);
        Menu_item::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 29, 'title' => 'Account Close', 'url' => "habro.accountclose.view", 'icon_class' => 'pe-7s-menu']);

        Menu_item::updateOrCreate(['menu_id' => $menu->id, 'type' => 'divider', 'parent_id' => null, 'order' => 30, 'divider_title' => 'Transaction']);
        Menu_item::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 31, 'title' => 'Deposit', 'url' => "habro.deposit.view", 'icon_class' => 'pe-7s-menu']);
        Menu_item::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 32, 'title' => 'Withdrawal', 'url' => "habro.withdrawal.view", 'icon_class' => 'pe-7s-menu']);

        Menu_item::updateOrCreate(['menu_id' => $menu->id, 'type' => 'divider', 'parent_id' => null, 'order' => 33, 'divider_title' => 'Bank Manage']);
        Menu_item::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 34, 'title' => 'Bank Create', 'url' => "bank-info.index", 'icon_class' => 'pe-7s-menu']);
       
        Menu_item::updateOrCreate(['menu_id' => $menu->id, 'type' => 'divider', 'parent_id' => null, 'order' => 35, 'divider_title' => 'Loan Management']);
        Menu_item::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 36, 'title' => 'Loan Sanction', 'url' => "loan-sanction.index", 'icon_class' => 'pe-7s-menu']);
        Menu_item::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 37, 'title' => 'Loan Disbursement Schedule', 'url' => "loan-disbursement-schedule.index", 'icon_class' => 'pe-7s-menu']);
        Menu_item::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 38, 'title' => 'Loan Repayment Schedule', 'url' => "loan-Repayment-schedule.index", 'icon_class' => 'pe-7s-menu']);
        Menu_item::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 39, 'title' => 'Loan Disbursed', 'url' => "loan-disbursed.index", 'icon_class' => 'pe-7s-menu']);
        Menu_item::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 40, 'title' => 'Loan Receive', 'url' => "loan-receive.index", 'icon_class' => 'pe-7s-menu']);
       

    }
}
