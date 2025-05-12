<?php

namespace App\Models;

use App\Enums\MediumAcquisition;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Patient extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'medium_acquisition'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'medium_acquisition' => MediumAcquisition::class,
        ];
    }

    /**
     * Get the user that owns the patient.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
