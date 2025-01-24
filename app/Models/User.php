<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles; // Menambahkan trait HasRoles
use Filament\Models\Contracts\FilamentUser;

class User extends Authenticatable
{
    use HasRoles; // Menambahkan trait HasRoles
    
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    
    public function canAccessFilament(): bool
    {
        return $this->hasRole('admin');
    }

    // Metode custom untuk cek role, namun bisa digantikan dengan hasRole()
    public function isAdmin()
    {
        return $this->hasRole('admin');  // Menggunakan Spatie built-in method
    }

    public function isCustomer()
    {
        return $this->hasRole('customer');  // Menggunakan Spatie built-in method
    }
}
