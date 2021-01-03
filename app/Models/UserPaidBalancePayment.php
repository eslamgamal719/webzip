<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class UserPaidBalancePayment extends Model
{
    protected $table = "user_paid_balance_payments";
    protected $guarded = [];

############################## Beginning  Relations ##############################
    public function user()
    {
        return $this->belongsTo(User::class);
    }
################################# End  Relations #################################

}
