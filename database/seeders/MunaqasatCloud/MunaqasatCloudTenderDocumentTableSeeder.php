<?php

namespace Database\Seeders\MunaqasatCloud;

use App\Models\MunaqasatCloud\MunaqasatcloudTenderDocument;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MunaqasatCloudTenderDocumentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        MunaqasatcloudTenderDocument::create([
            'tender_id'=>1, 
            'technical_title'=>'البند الأول',
            'technical_description'=>'الوصف الأول',
        ]);
    }
}
