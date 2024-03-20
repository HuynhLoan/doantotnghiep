<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordResetModel extends Model
{
    use HasFactory;

    protected $table = 'password_resets';

    protected $primaryKey = 'id';

    protected $fillable = [
        'email', 'token'
    ];

    public $timestamps = false;
}