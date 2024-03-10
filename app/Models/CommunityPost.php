<?php

/*
    Author: David Fonseca
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Collection;
use App\Enums\CategoryEnum;

class CommunityPost extends Model
{
    /**
     * COMMUNITYPOST ATTRIBUTES
     * $this->attributes['id'] - string - contains the community post primary key (id)
     * $this->attributes['title'] - string - contains the community post title
     * $this->attributes['description'] - string - contains the community post description
     * $this->attributes['image'] - string - contains the community post image URL
     * $this->attributes['date_of_event'] - date - contains the date of the related event
     * $this->attributes['place_of_event'] - string - contains the location of the related event
     * $this->attributes['category'] - enum<Category> - contains the category of the community post
     * $this->user - User - contains the user who made the community post
     * $this->attribute['user_id'] - int - contains the user primary key (id)
     * $this->reviews - Review[] - contains the reviews associated with the community post
     * $this->attributes['created_at'] - string - contains the date of community post creation
     * $this->attributes['updated_at'] - string - contains when the community post was updated
     */

    protected $fillable = ['title', 'description', 'image', 'dateOfEvent', 'placeOfEvent', 'category', 'user_id'];

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

    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    public function setImage(string $image): void
    {
        $this->attributes['image'] = $image;
    }

    public function getDateOfEvent(): string
    {
        return $this->attributes['date_of_event'];
    }

    public function setDateOfEvent(string $dateOfEvent): void
    {
        $this->attributes['date_of_event'] = $dateOfEvent;
    }

    public function getPlaceOfEvent(): string
    {
        return $this->attributes['place_of_event'];
    }

    public function setPlaceOfEvent(string $placeOfEvent): void
    {
        $this->attributes['place_of_event'] = $placeOfEvent;
    }

    public function getCategory(): CategoryEnum
    {
        return $this->attributes['category'];
    }

    public function setCategory($category): void
    {
        $this->attributes['category'] = $category->value;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user()->associate($user);
    }

    public function getUserId(): int
    {
        return $this->attributes['user_id'];
    }

    public function setUserId(int $user_id): void
    {
        $this->attributes['user_id'] = $user_id;
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

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }
}
