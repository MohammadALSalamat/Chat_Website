<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userPoste extends Model
{
    use HasFactory;
    protected $table = "user_postes";
    public function Frontuser()
    {
        return $this->belongsTo(FrontUser::class, 'user_id');
    }
}
