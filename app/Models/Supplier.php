<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $guarded = [];


    /**
     * Les site du fournisseur.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sites()
    {
        return $this->hasMany(Site::class);
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
     * Les adresses du fournisseur.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function adresses()
    {
        return $this->hasMany(Adresse::class);
    }

    /**
     * ajouter des adresses au supplier.
     *
     * @param $site
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function ajouterAdresse($adresse)
    {
        return $this->adresses()->create($adresse);
    }

    /**
    * Les contacts du fournisseur.
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    /**
     * ajouter des contacts au fournisseur.
     *
     * @param $site
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function ajouterContact($contact)
    {
        return $this->contacts()->create($contact);
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
