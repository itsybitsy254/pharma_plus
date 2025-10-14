<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    // ✅ Table name (Laravel will guess, but we’ll be explicit)
    protected $table = 'suppliers';

    // ✅ Primary key (you defined supplier_id)
    protected $primaryKey = 'supplier_id';

    // ✅ Fillable fields — these can be mass-assigned
    protected $fillable = [
        'supplier_name',
        'phone',
        'email',
        'address',
    ];

    // ✅ Relationships
    public function medicines()
    {
        return $this->hasMany(Medicine::class, 'supplier_id');
    }
}