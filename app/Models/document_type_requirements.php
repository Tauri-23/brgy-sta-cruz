<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class document_type_requirements extends Model
{
    use HasFactory;

    public function document_types() {
        return $this->hasMany(document_types::class, 'id', 'document_type');
    }
}
