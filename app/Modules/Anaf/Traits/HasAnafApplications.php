<?php

declare(strict_types=1);

namespace App\Modules\Anaf\Traits;

use App\Modules\Anaf\Models\AnafApplication;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasAnafApplications
{
    public function ownedAnafApplications(): HasMany
    {
        return $this->hasMany(AnafApplication::class);
    }
}
