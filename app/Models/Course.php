<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'description', 'max_participants', 'date'])]
class Course extends Model
{
    /**
     * Casten des Datums, damit ->format() funktioniert
     * @return string[]
     */
    protected function casts(): array
    {
        return [
            'date' => 'date',
        ];
    }

}
