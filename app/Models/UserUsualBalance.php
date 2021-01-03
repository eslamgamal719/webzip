<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class UserUsualBalance extends Model
{
    protected $table = "user_usual_balances";
    protected $guarded = [];

############################## Beginning  Relations ##############################
    public function usaulbalances()
    {
        return $this->belongsTo(User::class);
    }
################################# End  Relations #################################

}
