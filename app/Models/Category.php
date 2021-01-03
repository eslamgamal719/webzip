<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $guarded = [];

############################## Beginning  Relations ##############################
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ads()
    {
        return $this->hasMany(Ads::class);
    }

    public function customFileds()
    {
        return $this->hasMany(CustomFiled::class);
    }
################################# End  Relations #################################

}
