<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MailList extends Model
{

	public $timestamps=false;
	protected $fillable = ['send_date','to_email','body','is_read','is_spam','is_draft','user_id'];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

}