<?php

namespace App\Models;
use App\Models\Settings_test_type;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Testing extends Model
{
    use SoftDeletes;

    protected $table = 'testings';
    protected $primaryKey = 'testingID';
    protected $fillable = [
        'name',
        'description',
        'testtypeID',
        'updated_by',
        'icon',
        'document'
    ];

    public function test_type()
    {
        return $this->belongsTo(Settings_test_type::class, 'testtypeID', 'testtypeID');
    }
}
