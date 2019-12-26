<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;

/**
 * @property \Grimzy\LaravelMysqlSpatial\Types\Point   $location
 * @property \Grimzy\LaravelMysqlSpatial\Types\Polygon $area
 */
class Raion extends Model
{
    use SpatialTrait;

    protected $fillable = [
        'name'
    ];

    protected $spatialFields = [
        'border'
    ];
}