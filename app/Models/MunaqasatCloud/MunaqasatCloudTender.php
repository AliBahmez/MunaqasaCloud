<?php

namespace App\Models\MunaqasatCloud;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class MunaqasatCloudTender extends Model
{
    use HasFactory;

    protected $table = 'munaqasatcloud__tenders';
    
        protected $fillable = [
            'name',
            'title',
            'description',
            'number',
            'state',
            'participation_price',
            'starting_date',
            'ending_date',
            'open_date',
            'working_location',
            'organization_id',
        ];

        public function tenderDocuments()
        {
            return $this->hasMany(MunaqasatcloudTenderDocument::class, 'tender_id');
        }
    
        public function tenderApplicants()
        {
            return $this->hasMany(MunaqasatcloudTenderApplicant::class, 'tender_id');
        }
    
        public function organization()
        {
            return $this->belongsTo(MunaqasatcloudOrganization::class, 'organization_id');
        }
}
