<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserRole extends Model
{
    use HasFactory;
    protected $table = 'user_roles';

    public function isActive()
    {
        return Carbon::now()->lt($this->expires_at);
    }

}
