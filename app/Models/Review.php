<?php

/*
    Author: Miguel Jaramillo
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class Review extends Model
{
    /**
     * REVIEW ATTRIBUTES
     * $this->attributes['id'] - string - contains the review primary key (id)
     * $this->attributes['title'] - string - contains the review title
     * $this->attributes['description'] - string - contains the review description
     * $this->attributes['rating'] - int - contains review rating
     * $this->user - User - contains the user who made the review
     * $this->attribute['user_id'] - int - contains the user primary key (id)
     * $this->travel - Travel - contains the travel asocciated to the review
     * $this->attribute['travel_id'] - int - contains the travel primary key (id)
     * $this->community_post - CommunityPost - contains the community post assocciated to the review
     * $this->attribute['community_post_id'] - int - contains the community post primary key (id)
     * $this->attributes['created_at'] - string - contains the date of toy creation
     * $this->attributes['updated_at'] - string - contains when the review was updated
     */
    protected $fillable = ['title', 'description', 'rating', 'travel_id', 'community_post_id'];

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

    public function getRating(): int
    {
        return $this->attributes['rating'];
    }

    public function setRating(int $rating): void
    {
        $this->attributes['rating'] = $rating;
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

    public function getUserId(): string
    {
        return $this->attributes['user_id'];
    }

    public function setUserId(string $user_id): void
    {
        $this->attributes['user_id'] = $user_id;
    }

    public function travel(): BelongsTo
    {
        return $this->belongsTo(Travel::class);
    }

    public function getTravel(): Travel
    {
        return $this->travel;
    }

    public function setTravel(Travel $travel): void
    {
        $this->travel()->associate($travel);
    }

    public function getTravelId(): ?string
    {
        return $this->attributes['travel_id'];
    }

    public function setTravelId(string $travel_id): void
    {
        $this->attributes['travel_id'] = $travel_id;
    }

    public function community_post(): BelongsTo
    {
        return $this->belongsTo(CommunityPost::class);
    }

    public function getCommunityPost(): CommunityPost
    {
        return $this->community_post;
    }

    public function setCommunityPost(CommunityPost $community_post): void
    {
        $this->community_post()->associate($community_post);
    }

    public function getCommunityPostId(): ?string
    {
        return $this->attributes['community_post_id'];
    }

    public function setCommunityPostId(string $community_post_id): void
    {
        $this->attributes['community_post_id'] = $community_post_id;
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
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'rating' => 'required|integer|between:1,5',
        ]);
    }
}
