<?php

/*
    Author: David Fonseca
*/

namespace App\Enums;

use Kongulov\Traits\InteractWithEnum;

enum CategoryEnum: string
{
    use InteractWithEnum;

    case ArtAndCulture = 'Art and culture';
    case WarAndConflict = 'War and Conflict';
    case MusicAndEntertainment = 'Music and Entertainment';
    case InventionsAndDiscoveries = 'Inventions and Discoveries';
    case DailyLifeAndCustoms = 'Daily Life and Customs';
    case ExplorationAndAdventure = 'Exploration and Adventure';

    public static function fromValue(string $value): ?self
    {
        foreach (self::cases() as $case) {
            if ($case->value === $value) {
                return $case;
            }
        }

        return null;
    }
}
