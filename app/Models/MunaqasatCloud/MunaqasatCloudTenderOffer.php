<?php

namespace App\Models\MunaqasatCloud;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MunaqasatcloudTenderOffer extends Model
{
    use HasFactory;
    protected $fillable = [
        'tender_applicant_id', 
        'tender_document_id',
        'price',
        
    ];
    protected $table = 'munaqasatcloud__tender_offer';

    public function TenderApplicant(){
        return $this->belongsTo(MunaqasatcloudTenderApplicant::class , 'tender_applicant_id');
    }

    public function TenderDocument(){
        return $this->belongsTo(MunaqasatcloudTenderDocument::class , 'tender_document_id');
    }
    
}
