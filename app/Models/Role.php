<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    /** @use HasFactory<\Database\Factories\RolesFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'code',
    ];

    public function admins(): HasMany
    {
        return $this->hasMany(Admin::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function privileges(): BelongsToMany
    {
        return $this->belongsToMany(Privilege::class, 'role_privilege', 'role_id', 'privilege_id');
    }
}
