<?php

/*
    Author: Sergio Córdoba
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class Order extends Model
{
    /**
     * ORDER ATTRIBUTES
     * $this->attributes['id'] - string - contains the order primary key (id)
     * $this->attributes['total'] - int - contains the order total
     * $this->items - Item[] - contains the order items
     * $this->user - User - contains the user who made the order
     * $this->attribute['user_id'] - int - contains the user primary key (id)
     * $this->attributes['created_at'] - string - contains the date of order creation
     * $this->attributes['updated_at'] - string - contains when the order was updated
     */
    protected $fillable = ['total', 'user_id'];

    public function getId(): string
    {
        return $this->attributes['id'];
    }

    public function setTotal(int $total): void
    {
        $this->attributes['total'] = $total;
    }

    public function getTotal(): int
    {
        return $this->attributes['total'];
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function setItems(Collection $items): void
    {
        $this->items = $items;
    }

    public function getItems(): Collection
    {
        return $this->items;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function setUser(User $user): void
    {
        $this->user()->associate($user);
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUserId(string $user_id): void
    {
        $this->attributes['user_id'] = $user_id;
    }

    public function getUserId(): string
    {
        return $this->attributes['user_id'];
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
            'total' => 'required|numeric',
            'user_id' => 'required|exists:users,id',
        ]);
    }
}
