<?php

namespace Serbinario\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Test extends Authenticatable
{
    use Notifiable;
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'test';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'name',
                  'sports',
                    'name',
                    'email',
        'password'
              ];



    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    public function getAuthPassword()
    {
        return $this->password;
    }
}
