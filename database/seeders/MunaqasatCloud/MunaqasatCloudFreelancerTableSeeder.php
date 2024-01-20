<?php

namespace Database\Seeders\MunaqasatCloud;

use App\Facades\Account\AccountFacade;
use App\Models\MunaqasatCloud\MunaqasatcloudFreelancer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MunaqasatCloudFreelancerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $username = "Ahmed";
        $email = "Ahmed@alown.org";
        $password = "123456";
        $tenant_name = "Ahmed";
        $tenant_label = "المقاول أحمد علي";
        $tenant = AccountFacade::signUpAsTenant($username,$email,$password,$tenant_name,$tenant_label);
        //          
        MunaqasatcloudFreelancer::create([
            'id'=>$tenant,
            'name'=>'Ahmed',
            'title'=>'المقاول أحمد علي',
            'description'=>'أحمد علي',
        ]);
    }
}
