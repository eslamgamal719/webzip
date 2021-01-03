<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class DisturbHour extends Model
{
    protected $table = "disturb_hours";
    protected $guarded = [];


############################## Beginning  Relations ##############################
    public function user()
    {
        return $this->belongsTo(User::class);
    }
################################# End  Relations #################################
}
