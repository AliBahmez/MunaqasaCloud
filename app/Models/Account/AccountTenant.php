<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountTenant extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'label',
    ];
    protected $table = 'account__tenants';

    public function users()
    {
        return $this->hasMany(AccountUser::class);
    }
}
