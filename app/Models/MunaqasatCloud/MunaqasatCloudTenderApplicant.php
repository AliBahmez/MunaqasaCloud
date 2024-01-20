<?php

namespace App\Models\MunaqasatCloud;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Function_;

class MunaqasatcloudTenderApplicant extends Model
{
    use HasFactory;
    protected $table = 'munaqasatcloud__tender_applicants';

    protected $fillable=[
        'status',
        'tender_id',
        'freelancer_id',
         'voucher',
    ];
    public function tender()
    {
        return $this->belongsTo(MunaqasatcloudTender::class, 'tender_id');
    }

    public function freelancer()
    {
        return $this->belongsTo(MunaqasatcloudFreelancer::class, 'freelancer_id');
    }

    public function tenderOffers()
    {
        return $this->hasMany(MunaqasatcloudTenderOffer::class, 'tender_applicant_id');
    }

}
