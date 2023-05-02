<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getPengumuman()
    {
        return $this->hasMany('App\Models\Pengumuman');
    }

    public function getLaporan()
    {
        return $this->hasMany('App\Models\Laporan');
    }

    public function getDokumenPribadi()
    {
        return $this->hasMany('App\Models\DokumenPribadi', 'id_user', 'id');
    }

    public function getSuratKeterangan()
    {
        return $this->hasMany('App\Models\SuratKeterangan', 'id_user', 'id');
    }

    public function getSuratPengantar()
    {
        return $this->hasMany('App\Models\SuratPengantar', 'id_user', 'id');
    }
}
