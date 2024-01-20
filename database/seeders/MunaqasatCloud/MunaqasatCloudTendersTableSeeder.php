<?php

namespace Database\Seeders\MunaqasatCloud;

// use App\Models\MunaqasatCloud\MunaqasatCloudTender;

// use App\Models\MunaqasatCloud\MunaqasatCloudTender ;

use App\Facades\Account\AccountFacade;
use App\Models\MunaqasatCloud\MunaqasatCloudTender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MunaqasatCloudTendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
    $tenantId = AccountFacade::getTenantIdByName('alown');

        MunaqasatCloudTender::create([
            'name'=>'بناء وتشيد مدرسة الخير',
            'title'=>'مؤسسة الخير',
            'description'=>'بناء وتشيد مدرسة لتفيد المجتمع  ',
            'number'=>1545,
            'state'=>'0',
            'participation_price'=>5000,
            'starting_date' =>  '2024-02-01',
            'ending_date' =>  '2024-03-01',
            'open_date' =>  '2024-04-21',
             'working_location'=>'حضرموت\المكلا',
            'organization_id'=>$tenantId,
        ]);
    }
}
