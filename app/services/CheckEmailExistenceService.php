<?php
namespace App\Services;

use App\Contracts\ICheckEmailExistenceService;
use App\Contracts\IGenerateFilenameService;
use Illuminate\Support\Str;

class CheckEmailExistenceService implements ICheckEmailExistenceService {
    public function check($email, $modelInstance) {
        $isExisting = $modelInstance::where('email', $email)->exists();

        return $isExisting;
    }


}