<?php

namespace ZeeshanTariq\FilamentAttachmate\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attachment extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'attachable_id',
        'attachable_type',
        'filename'
    ];
    public function attachable(): MorphTo
    {
        return $this->morphTo();
    }

}
