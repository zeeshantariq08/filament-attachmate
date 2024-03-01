<?php

namespace ZeeshanTariq\FilamentAttachmate\Core;

use Illuminate\Database\Eloquent\Model;

trait HandleAttachments
{

    protected function afterCreate(): void
    {
        $data = $this->form->getRawState();
        $record = $this->record;
        $attachments = $data['attachments'];
        // Handle attachments
        $this->handleAttachments($record, $attachments);
    }


    protected function afterSave(): void
    {
        $data = $this->form->getRawState();
        $record = $this->record;
        $attachments = $data['attachments'];
        // Handle attachments
        $this->handleAttachments($record, $attachments);
    }

    protected function handleAttachments(Model $record, array $attachments): void
    {
        // Retrieve existing attachments
        $existingAttachments = $record->attachments()->get();

        // Associate new attachments
        foreach ($attachments as $path) {
            // Check if the attachment is already associated
            $existingAttachment = $existingAttachments->where('filename', $path)->first();

            if (!$existingAttachment) {
                // If not, associate the new attachment
                $record->attachments()->create(['filename' => $path]);
            }
        }

        // Detach attachments that are not present in the new set
        $attachmentsToRemove = $existingAttachments->reject(function ($attachment) use ($attachments) {
            return in_array($attachment->filename, $attachments);
        });

        foreach ($attachmentsToRemove as $attachment) {
            $attachment->delete();
        }
    }


}
