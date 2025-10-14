<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    use HasFactory;

    // ✅ Table name
    protected $table = 'audit_logs';

    // ✅ Primary key
    protected $primaryKey = 'log_id';

    // ✅ Fillable fields
    protected $fillable = [
        'user_id',
        'action',
        'description',
        'timestamp',
    ];

    // ✅ Relationship: each log belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
