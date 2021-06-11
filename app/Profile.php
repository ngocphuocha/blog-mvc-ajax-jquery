<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    const MALE_GENDER = 1;
    const FEMALE_GENDER = 2;
    const ORTHER_GENDER = 3;

    protected $table = 'profiles';

    protected $fillable = ['name', 'email', 'age', 'phone', 'address', 'gender', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
