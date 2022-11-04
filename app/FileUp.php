<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileUp extends Model
{
    //
    protected $fillable = [];

    public function setFilenamesAttribute($value)
    {
        $this->attributes['filenames'] = json_encode($value);
    }
}
