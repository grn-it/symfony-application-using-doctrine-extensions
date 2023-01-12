<?php

declare(strict_types=1);

namespace App\Service\Uploadable;

use Gedmo\Uploadable\FileInfo\FileInfoArray;

class FileInfo extends FileInfoArray
{
    public function isUploadedFile(): bool
    {
        return false;
    }
}
