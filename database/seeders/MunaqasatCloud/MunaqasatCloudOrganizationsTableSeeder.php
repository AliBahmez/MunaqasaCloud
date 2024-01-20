<?php

namespace Database\Seeders\MunaqasatCloud;

use App\Facades\Account\AccountFacade;
use App\Models\MunaqasatCloud\MunaqasatCloudOrganization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MunaqasatCloudOrganizationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $username = "alown";
        $email = "info@alown.org";
        $password = "123456";
        $tenant_name = "alown";
        $tenant_label = "مؤسسة العون للاعمال الخيرية";
        $tenant = AccountFacade::signUpAsTenant($username,$email,$password,$tenant_name,$tenant_label);
        //          
        MunaqasatCloudOrganization::create([
            'id'=>$tenant,  
            'name' => ' alown',
            'title' => 'مؤسسة العون للاعمال الخيرية',
            'contact_statement' => 1234,
            'description' => 'بناء مسجد يفيد البلاد',
            'trade_document' => '16480',
            'state' => 1,
            'accountnumber'=>'303549',
        ]);
        
    }
}
