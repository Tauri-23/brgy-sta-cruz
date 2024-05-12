<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class document_requirements_brgy_id extends Model
{
    use HasFactory;

    public function document_requests_brgy_ids() {
        return $this->hasMany(document_request_brgy_id::class, 'id', 'document_request');
    }

    public function document_type_requirements() {
        return $this->hasMany(document_type_requirements::class, 'id', 'document_requirement_for');
    }
}
