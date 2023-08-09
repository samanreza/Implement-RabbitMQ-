<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    const COLUMN_NAME = 'name';
    const COLUMN_LAST_NAME = 'last_name';
    const COLUMN_NATIONALCARD = 'nationalcard';
    const COLUMN_DATE_BIRTH = 'date_birth';
    const COLUMN_PASSWORD = 'password';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        self::COLUMN_NAME,
        self::COLUMN_LAST_NAME,
        self::COLUMN_NATIONALCARD,
        self::COLUMN_DATE_BIRTH,
        self::COLUMN_PASSWORD
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'date_birth' => 'datetime:Y-m-d',
    ];

    /**
     * @param string $value
     * @return void
     */
    public function setPassword(string $value):void
    {
         $this->attributes[self::COLUMN_PASSWORD] = bcrypt($value);
    }


    /**
     * @param string $value
     * @return void
     */
    public function setName(string $value): void
    {
       $this->attributes[self::COLUMN_NAME] = strtolower($value);
    }

    /**
     * @return Attribute
     */
    public function getName(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
        );
    }

    /**
     * @param string $value
     * @return void
     */
    public function setNationalCard(string $value): void
    {
        $this->attributes[self::COLUMN_NATIONALCARD] = $value;
    }

    /**
     * @return Attribute
     */
    public function getNationalCard(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
        );
    }


    public function setLastName(string $value): void
    {
        $this->attributes[self::COLUMN_LAST_NAME] = strtolower($value);
    }

    /**
     * @return Attribute
     */
    public function getLastName(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
        );
    }

    /**
     * @param string|null $value
     * @return void
     */
    public function setDateBirth(?string $value): void
    {
        $this->attributes[self::COLUMN_DATE_BIRTH] = $value;
    }

    /**
     * @return Attribute
     */
    public function getDateBirth(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
        );
    }
}
