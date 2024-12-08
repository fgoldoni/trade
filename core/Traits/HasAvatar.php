<?php

namespace Core\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait HasAvatar
{
    public function updateAvatar(UploadedFile $photo): void
    {
        tap($this->avatar_path, function ($previous) use ($photo) {
            $this->forceFill([
                'avatar_path' => $photo->storePublicly(
                    '/',
                    ['disk' => $this->avatarDisk()]
                ),
            ])->save();

            if ($previous) {
                //                Storage::disk($this->avatarDisk())->delete($previous);
            }
        });
    }

    protected function avatarDisk(): string
    {
        return 'avatars';
    }

    public function deleteAvatar(): void
    {
        Storage::disk($this->avatarDisk())->delete($this->avatar_path);

        $this->forceFill([
            'avatar_path' => null,
        ])->save();
    }

    public function getAvatarUrlAttribute(): string
    {
        return $this->avatar_path
            ? Storage::disk($this->avatarDisk())->url($this->avatar_path)
            : $this->defaultAvatarUrl();
    }

    protected function defaultAvatarUrl(): string
    {
        return 'https://ui-avatars.com/api/?name='.urlencode((string) $this->name).'&color=7F9CF5&background=EBF4FF';
    }
}
