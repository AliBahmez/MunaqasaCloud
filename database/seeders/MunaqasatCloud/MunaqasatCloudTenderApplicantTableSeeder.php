<?php

namespace Database\Seeders\MunaqasatCloud;

use App\Facades\Account\AccountFacade;
use App\Models\MunaqasatCloud\MunaqasatcloudTenderApplicant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MunaqasatCloudTenderApplicantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
    $tenantId = AccountFacade::getTenantIdByName('Ahmed');

        MunaqasatcloudTenderApplicant::create([
         'status'=> 1,
        'tender_id'=>1,
        'freelancer_id'=>$tenantId,
        'voucher'=>'lkjdsn',
        ]);
    }
}
