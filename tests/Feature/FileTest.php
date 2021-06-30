<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Storage;

class FileTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_upload_file()
    {
        $response = $this->json('POST', '/file', [
            'fileToUpload' => UploadedFile::fake()->image('avatar.jpg'),
            'keepOriginalName' => true
        ]);
        Storage::disk('local')->assertExists('uploads/avatar.jpg');
    }
}
