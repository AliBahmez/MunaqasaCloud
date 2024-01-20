<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Database\Seeders\Account\PermissionsTableSeeder;
use Database\Seeders\Account\TenantsTableSeeder;
use Database\Seeders\Account\TenantRolesTableSeeder;
use Database\Seeders\Account\TenantUsersTableSeeder;
use Database\Seeders\Account\TenantRoleLinkWithTenantUsersAndPermissionsTableSeeder;
use Database\Seeders\MunaqasatCloud\MunaqasatCloudFreelancerTableSeeder;
//
use Database\Seeders\MunaqasatCloud\MunaqasatCloudOrganizationsTableSeeder;
use Database\Seeders\MunaqasatCloud\MunaqasatCloudTenderApplicantTableSeeder;
use Database\Seeders\MunaqasatCloud\MunaqasatCloudTenderDocumentTableSeeder;
use Database\Seeders\MunaqasatCloud\MunaqasatCloudTenderOfferTableSeeder;
use Database\Seeders\MunaqasatCloud\MunaqasatCloudTendersTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        
        $this->call(PermissionsTableSeeder::class);
        $this->call(TenantsTableSeeder::class);
        $this->call(TenantUsersTableSeeder::class);
        $this->call(TenantRolesTableSeeder::class);
        $this->call(TenantRoleLinkWithTenantUsersAndPermissionsTableSeeder::class);
        //
        $this->call(MunaqasatCloudOrganizationsTableSeeder::class);
        $this->call(MunaqasatCloudTendersTableSeeder::class);
        $this->call(MunaqasatCloudFreelancerTableSeeder::class);
        $this->call(MunaqasatCloudTenderApplicantTableSeeder::class);
        $this->call(MunaqasatCloudTenderDocumentTableSeeder::class);
        $this->call(MunaqasatCloudTenderOfferTableSeeder::class);
    }
}
