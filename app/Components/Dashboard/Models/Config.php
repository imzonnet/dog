<?php namespace App\Components\Dashboard\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Config extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'configs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['key', 'value'];

    public  $timestamps = false;

}