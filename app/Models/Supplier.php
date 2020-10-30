<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $guarded = [];


    /**
     * Le fournisseur du site.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sites()
    {
        return $this->hasMany(Site::class)->latest('updated_at');
    }

    /**
     * ajouter des sites au supplier.
     *
     * @param $site
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function ajouterSite($site)
    {
        return $this->sites()->create($site);
    }

    /**
     *  Chemin vers.
     *
     * @return string
     */
    public function path()
    {
        return "/suppliers";
    }
}
