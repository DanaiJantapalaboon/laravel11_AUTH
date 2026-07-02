<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Settings_book_type extends Model
{
    use SoftDeletes;

    protected $table = 'settings_book_type';
    protected $primaryKey = 'booktypeID';
    protected $fillable = [
        'name',
        'updated_by',
    ];
}
