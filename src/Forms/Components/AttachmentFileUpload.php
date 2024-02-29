<?php

namespace ZeeshanTariq\FilamentAttachmate\Forms\Components;

use Closure;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Model;

class AttachmentFileUpload extends FileUpload
{
    public static function make(string $name = null): static
    {
        return parent::make('attachments')
            ->label('Attachments')
            ->multiple()
            ->openable()
            ->formatStateUsing(function (?Model $record) {
                return $record?->attachments()->get()->pluck('filename')->toArray();
            });
    }

}
