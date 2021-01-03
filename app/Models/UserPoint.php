<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class UserPoint extends Model
{
    protected $table = "user_points";
    protected $guarded = [];

############################## Beginning  Relations ##############################
    public function user()
    {
        return $this->belongsTo(User::class);
    }
################################# End  Relations #################################

}
