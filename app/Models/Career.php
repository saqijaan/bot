<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Career extends Model
{
    use HasFactory, Searchable;

    protected $guarded = [];

    #[SearchUsingFullText(['skills','education','interests'])]
    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'skills' => $this->skills,
            'education' => $this->education,
            'interests' => $this->interests,
        ];
    }
}
