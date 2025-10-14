<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    /** 
     * The table associated with the model.
     */
    protected $table = 'medicines';

    /**
     * The primary key for the table.
     */
    protected $primaryKey = 'medicine_id';

    /**
     * Indicates if the IDs are auto-incrementing.
     */
    public $incrementing = true;

    /**
     * The "type" of the auto-incrementing ID.
     */
    protected $keyType = 'int';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'category_id',
        'batch_number',
        'supplier_id',
        'quantity',
        'unit_price',
        'expiry_date',
        'date_added',
        'status',
    ];

    /**
     * Use medicine_id for route model binding.
     */
    public function getRouteKeyName()
    {
        return 'medicine_id';
    }

    /**
     * Relationships
     */

    // A medicine belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    // A medicine belongs to a supplier
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'supplier_id');
    }

    // A medicine has many sales
    public function sales()
    {
        return $this->hasMany(Sale::class, 'medicine_id', 'medicine_id');
    }

    // A medicine has many stock alerts
    public function stockAlerts()
    {
        return $this->hasMany(StockAlert::class, 'medicine_id', 'medicine_id');
    }
}
