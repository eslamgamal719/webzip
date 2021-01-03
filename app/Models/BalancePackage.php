<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class BalancePackage extends Model
{
 protected $table = 'balance_packages';
 protected $fillable = ['title','description','amount','price','active','user_id'];
// public $timestamps = true;

    public function scopeActive($query)
    {
    return $query->where('active', 1);
    }

############################## Beginning  Relations ##############################
    public function user()
    {
        return $this->belongsTo(User::class);
    }
################################# End  Relations #################################
}
