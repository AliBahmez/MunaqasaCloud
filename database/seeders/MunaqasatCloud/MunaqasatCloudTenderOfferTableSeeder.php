<?php

namespace Database\Seeders\MunaqasatCloud;

use App\Models\MunaqasatCloud\MunaqasatcloudTenderOffer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MunaqasatCloudTenderOfferTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        MunaqasatcloudTenderOffer::create ([
        'tender_applicant_id'=>1, 
        'tender_document_id'=>1,
        'price'=>2000,
        ]);
    }
}
