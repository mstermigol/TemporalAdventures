<?php

/*
    Author: Miguel Jaramillo
*/

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * USER ATTRIBUTES
     * $this->attributes['id'] - string - contains the user primary key (id)
     * $this->attributes['name'] - string - contains the user name
     * $this->attributes['email'] - string - contains the user email
     * $this->attributes['password'] - string - contains the user password
     * $this->atributes['balance'] - int - contains the user balance
     * $this->atributes['is_staff'] - bool - contains if the user is staff
     * $this->atributes['phone_number'] - string - contains the user phone number
     * $this->items - review[] - contains associated reviews
     * $this->items - community_post[] - contains associated community posts
     * $this->orders - order[] - contains associated orders
     * $this->attributes['created_at'] - string - contains the date of user creation
     * $this->attributes['updated_at'] - string - contains when the user was updated
     */
    protected $fillable = ['name', 'email', 'password', 'phone_number'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getId(): string
    {
        return $this->attributes['id'];
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function getFirstName(): string
    {
        $fullName = $this->attributes['name'];
        $firstName = explode(' ', $fullName)[0];

        return $firstName;
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getEmail(): string
    {
        return $this->attributes['email'];
    }

    public function setEmail(string $email): void
    {
        $this->attributes['email'] = $email;
    }

    public function getPassword(): string
    {
        return $this->attributes['password'];
    }

    public function setPassword(string $password): void
    {
        $this->attributes['password'] = $password;
    }

    public function getBalance(): int
    {
        return $this->attributes['balance'];
    }

    public function setBalance(int $balance): void
    {
        $this->attributes['balance'] = $balance;
    }

    public function getIsStaff(): bool
    {
        return $this->attributes['is_staff'];
    }

    public function setIsStaff(bool $is_staff): void
    {
        $this->attributes['is_staff'] = $is_staff;
    }

    public function getPhoneNumber(): string
    {
        return $this->attributes['phone_number'];
    }

    public function setPhoneNumber(string $phone_number): void
    {
        $this->attributes['phone_number'] = $phone_number;
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function setReviews(Collection $reviews): void
    {
        $this->reviews = $reviews;
    }

    public function communityPosts(): HasMany
    {
        return $this->hasMany(CommunityPost::class);
    }

    public function getCommunityPosts(): Collection
    {
        return $this->communityPosts;
    }

    public function setCommunityPosts(Collection $communityPosts): void
    {
        $this->communityPosts = $communityPosts;
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function setOrders(Collection $orders): void
    {
        $this->orders = $orders;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public static function validate(Request $request): void
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8|max:255',
            'email' => 'required|string|email|max:255',
            'phone_number' => 'required|string|max:255',
            'is_staff' => 'required|boolean',
            'balance' => 'required|numeric',
        ]);
    }
}
