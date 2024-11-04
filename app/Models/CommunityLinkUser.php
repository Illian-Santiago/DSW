<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommunityLinkUser extends Model
{
    protected $fillable = ['user_id', 'community_link_id'];

    public function toggle()
    {
        $this->exists ? $this->delete() : $this->save();
    }
}