<?php

namespace App\Models\MunaqasatCloud;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MunaqasatcloudTenderDocument extends Model
{
    protected $table = 'munaqasatcloud__tender_documents';

    protected $fillable = [
        'tender_id', 
        'technical_title',
        'technical_description',
        
    ];
    use HasFactory;
    public function Tender(){
        return $this->belongsTo(MunaqasatcloudTender::class ,'tender_id');
    }

    public function TenderOfferDocument(){
        return $this->hasMany(MunaqasatcloudTenderOffer::class , 'tender_document_id');
    }
}
