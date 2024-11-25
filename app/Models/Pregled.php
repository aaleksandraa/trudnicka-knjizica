<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregled extends Model


{
    use HasFactory;

    protected $table = 'pregledi'; // Assuming the table name is 'pregledi'
    
    // Define the fillable fields
    protected $fillable = [
        'user_id',
        'bpd',
        'hc',
        'ac',
        'fl',
        'plodne_vode_ul',
        'posteljica_ul',
        'cervikometrija',
        'ng',
        'tezina_prirast',
        'sa',
        'edemi',
        'varikisi',
        'visina_fundusa_uterusa',
        'vs',
        'frlic',
        'plodne_vode',
        'posteljica',
        'urin',
        'e',
        'hb',
        'suk',
        'fe',
        'zapazanja',
        'terapija',
        'kontrola',
        'datum_pregleda'
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
