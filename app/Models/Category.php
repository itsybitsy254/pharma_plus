<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // ✅ Table name
    protected $table = 'categories';

    // ✅ Primary key
    protected $primaryKey = 'category_id';

    // ✅ Fillable fields
    protected $fillable = [
        'name',
        'description',
    ];

    // ✅ Relationships

    // A category has many medicines
    public function medicines()
    {
        return $this->hasMany(Medicine::class, 'category_id');
    }
}