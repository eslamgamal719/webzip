<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $table = "bookmarks";
    protected $guarded = [];

############################## Beginning  Relations ##############################
    public function user()
    {
        return $this->belongsTo(User::class);
    }
################################# End  Relations #################################

}
