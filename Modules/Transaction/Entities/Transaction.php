<?php

namespace Modules\Transaction\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'description',
        'destinationFirstname',
        'destinationLastname',
        'destinationNumber',
        'paymentNumber',
        'reasonDescription',
        'deposit',
        'sourceFirstName',
        'sourceLastName',
        'secondPassword',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function newFactory()
    {
        return \Modules\Transaction\Database\factories\TransactionFactory::new();
    }
}
