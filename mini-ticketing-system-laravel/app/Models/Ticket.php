<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Ticket extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'tickets';
    protected $primaryKey = '_id';
    public $incrementing = false;

    protected $fillable = ['title', 'description', 'status'];

    protected $attributes = [
        'status' => 'open',
    ];

    public static function statuses()
    {
        return ['open', 'in_progress', 'closed'];
    }

    // protected function status(): Attribute
    // {
    //     return Attribute::get(fn ($value) => ucfirst(str_replace('_',' ',$value)));
    // }
}
