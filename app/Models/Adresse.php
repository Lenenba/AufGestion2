<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Fournisseur de l'adresse
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    /**
     * Les site de l'adresse.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sites()
    {
        return $this->hasMany(Site::class);
    }

    /**
    * ajouter des sites a l'adresses.
    *
    * @param $site
    * @return \Illuminate\Database\Eloquent\Collection
    */
    public function ajouterSite($site)
    {
        return $this->sites()->create($site);
    }
}
