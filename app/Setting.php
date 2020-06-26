<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'settings';

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
    protected $fillable = ['site_name', 'logo', 'api_key', 'from_email', 'fav_icon', 'them_color', 'company_id', 'sidebar', 'view', 'pagination_length', 'banner', 'sticky_logo', 'default_product'];
}
