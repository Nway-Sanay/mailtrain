<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News_letter extends Model
{
    public $timestamps=false;
	protected $fillable = ['send_date','to_email','body','image'];
}
