<?php

namespace App\Models;

use App\Models\Traits\WhereLike;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    use WhereLike;
    
      protected $guarded = array('id');

    public static $rules = array(
        'title' => 'required',
        'body' => 'required',
    );
    public function histories()
    {
        return $this->hasMany('App\Models\History');
    }
}
