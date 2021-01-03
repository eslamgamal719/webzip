<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class CustomFiled extends Model
{
    protected $table = "custom_fileds";
    protected $guarded = [];

############################## Beginning  Relations ##############################
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
################################# End  Relations #################################

}
