<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

/**
 * App\Message
 *
 * @property int $id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string $content
 * @property string $image
 * @property int $user_id
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereUserId($value)
 */

	class Message extends Model
	{
	// messages
		use Searchable;
		protected $guarded = [];
		public  function user()
        {
            return $this->belongsTo(User::class);
        }

        public function getImageAttribute($image)
        {
	        if (!$image || starts_with($image, 'http')) {
		        return $image;
	        }

	        return \Storage::disk('public')->url($image);
        }

        public function toSearchableArray()
        {
        	$this->load('user');

        	return $this->toArray();
        }
	}
