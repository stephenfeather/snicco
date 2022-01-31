<?php

declare(strict_types=1);

namespace Snicco\Component\Eloquent\Tests\fixtures\Model;

class Country extends TestWPModel
{
    
    protected $dispatchesEvents = [
        'created' => CountryCreated::class,
    ];
    
    public function cities()
    {
        return $this->hasMany(City::class);
    }
    
}