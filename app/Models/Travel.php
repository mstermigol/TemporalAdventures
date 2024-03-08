<?php

/*
    Author: David Fonseca
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use DateTime;

class Travel extends Model
{
    /**
     * TRAVEL ATTRIBUTES
     * $this->attributes['id'] - int - contains the travel primary key (id)
     * $this->attributes['title'] - string - contains the travel title
     * $this->attributes['description'] - string - contains the travel description
     * $this->attributes['place'] - string - contains the place of travel
     * $this->attributes['dateOfDestination'] - date - contains the date of destination
     * $this->attributes['price'] - int - contains the price of the travel
     * $this->attributes['startDate'] - date - contains the start date of the travel
     * $this->attributes['endDate'] - date - contains the end date of the travel
     * $this->attributes['image'] - string - contains the image URL of the travel
     * $this->attributes['category'] - enum<Category> - contains the category of the travel
     * $this->reviews - Review[] - contains the reviews associated with the travel
     * $this->items - Item[] - contains the items included in the travel
     * $this->attributes['created_at'] - string - contains the date of travel creation
     * $this->attributes['updated_at'] - string - contains when the travel was updated
     */
    protected $fillable = ['title', 'description', 'place', 'dateOfDestination', 'price', 'startDate', 'endDate', 'image', 'category'];

    public function getId(): int
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

    public function getDateOfDestination(): DateTime
    {
        return $this->attributes['dateOfDestination'];
    }

    public function setDateOfDestination(DateTime $dateOfDestination): void
    {
        $this->attributes['dateOfDestination'] = $dateOfDestination;
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getStartDate(): DateTime
    {
        return $this->attributes['startDate'];
    }

    public function setStartDate(DateTime $startDate): void
    {
        $this->attributes['startDate'] = $startDate;
    }

    public function getEndDate(): DateTime
    {
        return $this->attributes['endDate'];
    }

    public function setEndDate(DateTime $endDate): void
    {
        $this->attributes['endDate'] = $endDate;
    }

    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    public function setImage(string $image): void
    {
        $this->attributes['image'] = $image;
    }

    public function getCategory()
    {
        return $this->attributes['category'];
    }

    public function setCategory($category): void
    {
        $this->attributes['category'] = $category;
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
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
