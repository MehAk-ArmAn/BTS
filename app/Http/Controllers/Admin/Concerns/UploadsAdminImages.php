<?php

namespace App\Http\Controllers\Admin\Concerns;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

trait UploadsAdminImages
{
    protected function uploadAdminImage($fileOrRequest, string $fieldOrFolder, ?string $folder = null): ?string
    {
        [$file, $targetFolder] = $this->resolveAdminUpload($fileOrRequest, $fieldOrFolder, $folder);

        return $this->moveAdminUpload($file, 'imgs/uploads/' . $targetFolder);
    }

    protected function uploadAdminVideo($fileOrRequest, string $fieldOrFolder, ?string $folder = null): ?string
    {
        [$file, $targetFolder] = $this->resolveAdminUpload($fileOrRequest, $fieldOrFolder, $folder);

        return $this->moveAdminUpload($file, 'imgs/uploads/' . $targetFolder);
    }

    protected function uploadAdminImages(Request $request, string $field, string $folder): array
    {
        if (! $request->hasFile($field)) {
            return [];
        }

        $files = $request->file($field);

        if (! is_array($files)) {
            $files = [$files];
        }

        $paths = [];

        foreach ($files as $file) {
            $uploaded = $this->moveAdminUpload($file, 'imgs/uploads/' . $folder);

            if ($uploaded) {
                $paths[] = $uploaded;
            }
        }

        return $paths;
    }

    private function resolveAdminUpload($fileOrRequest, string $fieldOrFolder, ?string $folder = null): array
    {
        if ($fileOrRequest instanceof Request) {
            return [
                $fileOrRequest->file($fieldOrFolder),
                trim($folder ?: 'misc', '/'),
            ];
        }

        return [
            $fileOrRequest instanceof UploadedFile ? $fileOrRequest : null,
            trim($fieldOrFolder ?: 'misc', '/'),
        ];
    }

    private function moveAdminUpload(?UploadedFile $file, string $relativeFolder): ?string
    {
        if (! $file || ! $file->isValid()) {
            return null;
        }

        $extension = strtolower($file->getClientOriginalExtension() ?: 'file');

        $safeName = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));

        if (! $safeName) {
            $safeName = 'bangtan-upload';
        }

        $fileName = $safeName . '-' . date('YmdHis') . '-' . Str::random(6) . '.' . $extension;

        $relativeFolder = trim(str_replace('\\', '/', $relativeFolder), '/');

        $publicFolder = public_path($relativeFolder);

        if (! is_dir($publicFolder)) {
            mkdir($publicFolder, 0755, true);
        }

        $file->move($publicFolder, $fileName);

        return $relativeFolder . '/' . $fileName;
    }

    protected function linesToArray(?string $text): array
    {
        return collect(preg_split('/\r\n|\r|\n/', (string) $text))
            ->map(fn ($line) => trim($line))
            ->filter()
            ->values()
            ->all();
    }
}
