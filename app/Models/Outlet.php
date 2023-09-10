<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Outlet extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];
    // protected $with = ['users', 'packages', 'transactions'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function packages()
    {
        return $this->hasMany(Package::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
