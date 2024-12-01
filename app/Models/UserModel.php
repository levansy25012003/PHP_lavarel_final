<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Ship\DistrictModel;
use App\Models\Ship\CityModel;



class UserModel extends Authenticatable implements MustVerifyEmail
{
    use   HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'user_name', 'user_email', 'password', 'user_phone', 'user_addres', 'user_district', 'user_city', 'provider', 'provider_id','role_id',  
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $primaryKey = 'user_id';


        /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the roles that owns the UserModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Roles()
    {
        return $this->belongsTo(RoleModel::class, 'role_id', 'role_id');
    }

    public function District()
    {
        return $this->belongsTo(DistrictModel::class, 'user_district', 'district_id');
    }

    public function City()
    {
        return $this->belongsTo(CityModel::class, 'user_city', 'city_id');
    }
}
