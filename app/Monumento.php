<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monumento extends Model
{
    /**
     * Return the relation between Monumentos and Opiniones tables.
     *
     */
    public function opiniones()
    {
      return $this->hasMany(Opinione::class);
    }

    /**
     * Save an opinion associated to a monument.
     *
     * @param $opinione Opinione object.
     */
     public function addOpinione(Opinione $opinione)
     {
       return $this->opiniones()->save( $opinione );
     }
}
