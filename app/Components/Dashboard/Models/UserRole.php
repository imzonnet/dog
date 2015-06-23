<?php namespace App\Components\Dashboard\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
class UserRole extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_roles';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'state', 'ordering'];
    
    public $timestamps = false;
    /**
     * Relationship One to Many with Memorial Table
     */
    public function users()
    {
        return $this->hasMany(User::class,'role_id');
    }
     
}