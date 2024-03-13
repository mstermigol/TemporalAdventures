<?php

/*
    Author: Sergio Córdoba
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    /**
     * ITEM ATTRIBUTES
     * $this->attributes['id'] - string - contains the item primary key (id)
     * $this->attributes['name'] - string - contains the item name
     * $this->attributes['quantity'] - int - contains the item quantity
     * $this->attributes['price'] - int - contains item price
     * $this->attributes['subTotal'] - int - contains item subTotal
     * $this->travel - Travel - contains the travel asocciated to the item
     * $this->attribute['travel_id'] - int - contains the travel primary key (id)
     * $this->order - Order - contains the order asocciated to the item
     * $this->attribute['order_id'] - string - contains the order primary key (id)
     * $this->attributes['created_at'] - string - contains the date of toy creation
     * $this->attributes['updated_at'] - string - contains when the review was updated
     */
    protected $fillable = ['name', 'quantity', 'price', 'subTotal', 'travel_id', 'order_id'];

    public function getId(): string
    {
        return $this->attributes['id'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setQuantity(int $quantity): void
    {
        $this->attributes['quantity'] = $quantity;
    }

    public function getQuantity(): int
    {
        return $this->attributes['quantity'];
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setSubTotal(int $subTotal): void
    {
        $this->attributes['subTotal'] = $subTotal;
    }

    public function getSubTotal(): int
    {
        return $this->attributes['subTotal'];
    }

    public function travel(): BelongsTo
    {
        return $this->belongsTo(Travel::class);
    }

    public function setTravel(Travel $travel): void
    {
        $this->travel()->associate($travel);
    }

    public function getTravel(): Travel
    {
        return $this->travel;
    }

    public function setTravelId(string $travel_id): void
    {
        $this->attributes['travel_id'] = $travel_id;
    }

    public function getTravelId(): string
    {
        return $this->attributes['travel_id'];
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function setOrder(Order $order): void
    {
        $this->order()->associate($order);
    }

    public function getOrder(): Order
    {
        return $this->order;
    }

    public function setOrderId(string $order_id): void
    {
        $this->attributes['order_id'] = $order_id;
    }

    public function getOrderId(): string
    {
        return $this->attributes['order_id'];
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public static function validate($request): void
    {
        $request->validate([
            'price' => 'required|numeric|gt:0',
            'quantity' => 'required|numeric|gt:0',
            'travel_id' => 'required|exists:travels,id',
            'order_id' => 'required|exists:orders,id',
        ]);

    }
}
