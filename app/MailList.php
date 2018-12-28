<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MailList extends Model
{

	public $timestamps=false;
	protected $fillable = ['send_date','to_email','body','is_read','is_spam','is_draft','user_id','file_name'];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	protected $appends = ['from_email'];

	public function getFromEmailAttribute()
	{

	    return $this->user->email;

	}

	public function scopeUserMail($query,$email)
	{


			return $query->whereHas('user',
															function ($query) use ($email) {
																$query->where('email',$email);
															});
	}

}
