<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class document_request_brgy_id extends Model
{
    use HasFactory;

    public function residents() {
        return $this->hasMany(Residents::class, 'id', 'resident');
    }

    public function document_types() {
        return $this->hasMany(document_types::class, 'id', 'document_type');
    }
}
