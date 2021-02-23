<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class FrontendUser extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use SoftDeletes;
    use HasRoles;

    protected $guard = 'admin';

    protected $table = 'frontend_users';

    protected $primaryKey = 'id';

    protected $fillable = [
        'type',
        'parentId',
        'name',
        'full_name',
        'email',
        'password',
        'address',
        'mobile',
        'birthday',
        'gender',
        'picture',
        'blood_id',
        'email_verified',
        'email_verified_at',
        'email_verification_token',
    ];

    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'LIKE', '%' . $search . '%')
            ->where('email', 'LIKE', '%' . $search . '%');
    }

    public function blood()
    {
        return $this->belongsTo("App\Models\Blood", "blood_id", "id");
    }

    public function users()
    {
        return $this->belongsTo("App\Models\User", "parentId", "id");
    }

    public function roll()
    {
        return $this->belongsTo('App\Models\UserRoll');
    }

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'profile_photo_url',
    ];
}
