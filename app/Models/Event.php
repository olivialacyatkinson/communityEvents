<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'description',
        'photo_url',
        'start_date',
        'start_time',
        'building_number',
        'building_street_name',
        'building_name',
        'postal_code',
        'city',
        'county',
        'country',
        'phone',
        'is_online'
    ];
}
