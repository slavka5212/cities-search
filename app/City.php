<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model {

    protected $fillable = ['name', 'district', 'region', 'ico', 'mayor', 'tel', 'fax', 'email', 
    'web', 'img', 'lat', 'lng', 'url'];
    /**
     * The attributes
     * @string
     */
    protected $name, $district, $region, $ico, $mayor, $tel, 
    $fax, $email, $web, $img, $url;
    /**
     * GPS
     * @float
     */
    protected $lat, $lng;

    /**
     * @timestamp
     */
    protected $created_at, $updated_at;

}