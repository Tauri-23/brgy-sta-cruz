<?php
namespace App\Contracts;

interface ICheckEmailExistenceService {
    public function check($email, $modelInstance);
}