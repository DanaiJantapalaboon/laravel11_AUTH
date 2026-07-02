<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Settings_position extends Model
{
    use SoftDeletes;

    protected $table = 'settings_position';
    protected $primaryKey = 'positionID';
    protected $fillable = [
        'name',
        'updated_by',
    ];

    public function position()
    {
        return $this->belongsTo(Settings_position::class, 'positionID', 'positionID');
    }
}