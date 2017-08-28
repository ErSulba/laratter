<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\SocialProfile
 *
 * @property int $id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int $user_id
 * @property string $social_id
 */

class SocialProfile extends Model
{
	protected $guarded = [];
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
