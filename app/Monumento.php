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
     * @param $id User's id of the Opnione's owner.
     */
     public function addOpinione(Opinione $opinione, $id)
     {
       $opinione->usuario_id = $id;

       return $this->opiniones()->save( $opinione );
     }
}
