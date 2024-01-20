<?php

namespace App\Models\MunaqasatCloud;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MunaqasatCloudOrganization extends Model
{
    use HasFactory;
    protected $table = 'munaqasatcloud__organizations';

    public function tenders()
    {
        return $this->hasMany(MunaqasatcloudTender::class, 'organization_id');
    }
    protected $fillable = [
        'id',
        'name',
        'title',
        'contact_statement',
        'state',
        'description',
        'trade_document',
        'accountnumber',
    ];
}
