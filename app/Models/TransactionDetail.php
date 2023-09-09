<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];
    protected $with = ['transaction', 'package'];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
