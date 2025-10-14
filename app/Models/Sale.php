<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    // ✅ Table name
    protected $table = 'sales';

    // ✅ Primary key
    protected $primaryKey = 'sale_id';

    // ✅ Fillable fields (mass assignable)
    protected $fillable = [
        'user_id',
        'medicine_id',
        'quantity_sold',
        'total_price',
        'sale_date',
        'receipt_number',
    ];

    // ✅ Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function medicine()
    {
        return $this->belongsTo(Medicine::class, 'medicine_id');
    }
}