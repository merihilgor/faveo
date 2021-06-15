<?php
namespace App\Plugins\ServiceDesk\database\seeds\v_1_9_48;
use database\seeds\DatabaseSeeder as Seeder;
use DB;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SdContractTypes extends Seeder{
    public function run() {
        $names = ['Lease','Software License','Maintenance',];
	       $created_at = date('Y-m-d H:m:i');
	       $updated_at = date('Y-m-d H:m:i');
        foreach($names as $name){
            DB::table('sd_contract_types')
                    ->insert(['name'=>$name,
               'created_at'=>$created_at,
               'updated_at'=>$updated_at,
                ]);
        }
    }
}