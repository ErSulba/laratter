<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


	class Message extends Model
	{
	// messages
		protected $guarded = [];
		public  function user()
        {
            return $this->belongsTo(User::class);
        }
	}
