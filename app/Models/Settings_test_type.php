<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Settings_test_type extends Model
{
    use SoftDeletes;

    protected $table = 'settings_test_type';
    protected $primaryKey = 'testtypeID';
    protected $fillable = [
        'name',
        'updated_by',
    ];

    public function test_type()
    {
        return $this->belongsTo(Settings_test_type::class, 'testtypeID', 'testtypeID');
    }
}
