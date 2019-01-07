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

	// attribute appending

	protected $appends = ['from_email','body_cut'];

	public function getFromEmailAttribute()
	{
		if ($this->user_id) {

			return $this->user->email;
		}else{
			return 'no id';
		}

	}

	public function getBodyCutAttribute()
	{
		$body_cut = str_limit($this->body, 7);

		return $body_cut;
	}

	// search with user_email scope
	public function scopeUserMail($query,$email)
	{
			return $query->whereHas('user',
															function ($query) use ($email) {
																$query->where('email',$email);
															});
	}

}
