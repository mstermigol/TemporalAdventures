<?php

/*
    Author: Miguel Jaramillo
*/ 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Review extends Model
{
    use HasFactory;

    /**
     * REVIEW ATTRIBUTES
     * $this->attributes['id'] - int - contains the review primary key (id)
     * $this->attributes['title'] - string - contains the review title
     * $this->attributes['description'] - string - contains the review description
     * $this->attributes['rating'] - int - contains review rating
     * $this->user - User - contains the user who made the review
     * $this->travel - Travel - contains the travel asocciated to the review
     * $this->community_post - CommunityPost - contains the community post assocciated to the review
     * $this->attributes['created_at'] - string - contains the date of toy creation
     * $this->attributes['updated_at'] - string - contains when the review was updated
    */

    protected $fillable = ['title', 'description', 'rating'];

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

    public function travel(): BelongsTo
    {
        return $this->belongsTo(Travel::class);
    }

    public function community_post(): BelongsTo
    {
        return $this->belongsTo(CommunityPost::class);
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
