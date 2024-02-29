<?php

namespace ZeeshanTariq\FilamentAttachmate\Core;

use ZeeshanTariq\FilamentAttachmate\Models\Attachment;
use \Illuminate\Database\Eloquent\Relations\MorphMany;

trait InteractsWithAttachments
{

    public function attachments(): MorphMany
    {
        return $this->morphMany(Attachment::class, 'attachable');
    }
}
