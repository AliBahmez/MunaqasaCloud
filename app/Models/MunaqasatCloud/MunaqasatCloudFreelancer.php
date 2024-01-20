<?php

namespace App\Models\MunaqasatCloud;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MunaqasatcloudFreelancer extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'title',
        'description',
        'state',
        
    ];
    protected $table = 'munaqasatcloud__freelancers';

    public function tenderApplicants()
    {
        return $this->hasMany(MunaqasatcloudTenderApplicant::class, 'freelancer_id');
    }
    
}
