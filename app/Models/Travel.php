<?php

/*
    Author: David Fonseca
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Enums\CategoryEnum;

class Travel extends Model
{
    /**
     * TRAVEL ATTRIBUTES
     * $this->attributes['id'] - string - contains the travel primary key (id)
     * $this->attributes['title'] - string - contains the travel title
     * $this->attributes['description'] - string - contains the travel description
     * $this->attributes['place'] - string - contains the place of travel
     * $this->attributes['date_of_destination'] - string - contains the date of destination
     * $this->attributes['price'] - int - contains the price of the travel
     * $this->attributes['start_date'] - string - contains the start date of the travel
     * $this->attributes['end_date'] - string - contains the end date of the travel
     * $this->attributes['image'] - string - contains the image URL of the travel
     * $this->attributes['category'] - enum<Category> - contains the category of the travel
     * $this->reviews - Review[] - contains the reviews associated with the travel
     * $this->items - Item[] - contains the items included in the travel
     * $this->attributes['created_at'] - string - contains the date of travel creation
     * $this->attributes['updated_at'] - string - contains when the travel was updated
     */

    protected $table = 'travels';
    protected $fillable = ['title', 'description', 'place', 'date_of_destination', 'price', 'start_date', 'end_date', 'image', 'category'];
    protected $casts = ['category' => CategoryEnum::class,];

    public function getId(): string
    {
        return $this->attributes['id'];
    }

    public function getTitle(): string
    {
        return $this->attributes['title'];
    }

    public function setTitle(string $title): void
    {
        $this->attributes['title'] = $title;
    }

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
    }

    public function getPlace(): string
    {
        return $this->attributes['place'];
    }

    public function setPlace(string $place): void
    {
        $this->attributes['place'] = $place;
    }

    public function getDateOfDestination(): string
    {
        return $this->attributes['date_of_destination'];
    }

    public function setDateOfDestination(string $date_of_destination): void
    {
        $this->attributes['date_of_destination'] = $date_of_destination;
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getStartDate(): string
    {
        return $this->attributes['start_date'];
    }

    public function setStartDate(string $start_date): void
    {
        $this->attributes['start_date'] = $start_date;
    }

    public function getEndDate(): string
    {
        return $this->attributes['end_date'];
    }

    public function setEndDate(string $end_date): void
    {
        $this->attributes['end_date'] = $end_date;
    }

    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    public function setImage(string $image): void
    {
        $this->attributes['image'] = $image;
    }

    public function getCategory(): string
    {
        return $this->attributes['category'];
    }

    public function setCategory(CategoryEnum $category): void
    {
        $this->attributes['category'] = $category->value;
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

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function getItems(): Collection
    {
        return $this->items;
    }

    public function setItems(Collection $items): void
    {
        $this->items = $items;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }
}
