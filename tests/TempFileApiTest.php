<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TempFileApiTest extends TestCase
{
    use MakeTempFileTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTempFile()
    {
        $tempFile = $this->fakeTempFileData();
        $this->json('POST', '/api/v1/tempFiles', $tempFile);

        $this->assertApiResponse($tempFile);
    }

    /**
     * @test
     */
    public function testReadTempFile()
    {
        $tempFile = $this->makeTempFile();
        $this->json('GET', '/api/v1/tempFiles/'.$tempFile->id);

        $this->assertApiResponse($tempFile->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTempFile()
    {
        $tempFile = $this->makeTempFile();
        $editedTempFile = $this->fakeTempFileData();

        $this->json('PUT', '/api/v1/tempFiles/'.$tempFile->id, $editedTempFile);

        $this->assertApiResponse($editedTempFile);
    }

    /**
     * @test
     */
    public function testDeleteTempFile()
    {
        $tempFile = $this->makeTempFile();
        $this->json('DELETE', '/api/v1/tempFiles/'.$tempFile->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tempFiles/'.$tempFile->id);

        $this->assertResponseStatus(404);
    }
}
