<?php
namespace App\Utils;

trait ValidatorTrait
{
    public function validateInputs(string $city, string $date): bool
    {
        return !empty($city) && preg_match('/^\d{4}-\d{2}-\d{2}$/', $date);
    }
}