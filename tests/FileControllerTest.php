<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileControllerTest extends WebTestCase
{
    public function testFile(): void
    {
        $client = static::createClient();

        $crawler = $client->request(
            'POST',
            '/file',
            files: [$this->createUploadedFile(__DIR__.'/test.jpg')]
        );

        $this->assertResponseIsSuccessful();
    }
    
    private function createUploadedFile(string $filePath): UploadedFile
    {
        $pathInfo = pathinfo($filePath);
        
        $filesystem = new Filesystem();
        $tmpFilePath = $filesystem->tempnam(
            sys_get_temp_dir(),
            'test_', '.'.$pathInfo['extension']
        );
        $filesystem->chmod($tmpFilePath, 0777);
        $filesystem->copy($filePath, $tmpFilePath, true);

        return new UploadedFile($tmpFilePath, $pathInfo['basename']);
    }
}
