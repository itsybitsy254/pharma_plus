<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockAlert extends Model
{
    use HasFactory;

    // ✅ Table name
    protected $table = 'stock_alerts';

    // ✅ Primary key
    protected $primaryKey = 'alert_id';

    // ✅ Fillable fields
    protected $fillable = [
        'medicine_id',
        'alert_message',
        'alert_date',
    ];

    // ✅ Relationships
    public function medicine()
    {
        return $this->belongsTo(Medicine::class, 'medicine_id');
    }
}