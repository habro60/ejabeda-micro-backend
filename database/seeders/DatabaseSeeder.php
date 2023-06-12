<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Sl_product_category;
use App\Models\Sl_role_type;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{ /**
    * Seed the application's database.
    *
    * @return void
    */
   public function run()
   {
    $this->call(MenuSeeder::class);
    $this->call(Sl_AccCategorySeeder::class);
    $this->call(Sl_officeTypeSeeder::class);
    $this->call(Sl_DocumentTypeSeeder::class);
    $this->call(Sl_ProdCategorySeeder::class);
    $this->call(Sl_AccTypeSeeder::class);
    $this->call(Sl_AccStatusSeeder::class);
    $this->call(GlAccCodeSeeder::class);
    $this->call(Sl_ChargePayMethodSeeder::class);
    $this->call(Sl_ChargePayPeriodSeeder::class);
    $this->call(Sl_ChargeTypeSeeder::class);
    $this->call(Sl_HolidayTypeSeeder::class);
    $this->call(Sl_ChargePayPeriodSeeder::class);
    $this->call(Sl_DepositPeriodSeeder::class);
    $this->call(Sl_IntCalMethodSeeder::class);
    $this->call(Sl_ProdCalMethodSeeder::class);
    $this->call(Sl_IntApplyPeriodSeeder::class);
    $this->call(Sl_IntTypeSeeder::class);
    $this->call(Sl_PenaltyTypeSeeder::class);
    $this->call(Sl_PenaltyCalMethodSeeder::class);
    $this->call(Sl_PenaltyPayMethodSeeder::class);
    $this->call(Sl_LeafQtySeeder::class);
    $this->call(Sl_TrnModeSeeder::class);
    $this->call(Sl_TrnTypeSeeder::class);
    $this->call(Sl_VchTypeSeeder::class);
    $this->call(PermissionSeeder::class);
    $this->call(Sl_EmpDesigSeeder::class);
    $this->call(Sl_security_typeSeeder::class);
    // $this->call(RoleSeeder::class);
    // $this->call(Sl_role_type::class);
    $this->call(Sl_role_type_Seeder::class);
    $this->call(Usergroup_Seeder::class);
    // $this->call(UserSeeder::class);
   }
}
