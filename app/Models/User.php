<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // ...

    /**
     * Determine if the user has the SuperAdmin role.
     *
     * @return bool
     */
    public function isSuperAdmin()
    {
        return $this->SuperAdmin; // Replace "SuperAdmin" with the actual field name in your database
    }

    /**
     * Calculate the BMI (Body Mass Index) based on the user's height and weight.
     *
     * @return float|null
     */
    public function calculateBMI()
{
    // Calculate BMI based on height and weight
    // You can replace the calculation logic with your own implementation
    $visina = $this->visina;
    $tezina = $this->tezina;

    if ($tezina && $tezina) {
        $bmi = $tezina / (($visina / 100) * ($visina / 100));
        return round($bmi, 2);
    } else {
        return null;
    }
}
}
