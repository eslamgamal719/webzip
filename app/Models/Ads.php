<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    protected $table = "ads";
    protected $guarded = [];

############################## Beginning  Relations ##############################
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

################################# End  Relations #################################
}
