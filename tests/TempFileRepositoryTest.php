<?php

use App\Models\TempFile;
use App\Repositories\TempFileRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TempFileRepositoryTest extends TestCase
{
    use MakeTempFileTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TempFileRepository
     */
    protected $tempFileRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tempFileRepo = App::make(TempFileRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTempFile()
    {
        $tempFile = $this->fakeTempFileData();
        $createdTempFile = $this->tempFileRepo->create($tempFile);
        $createdTempFile = $createdTempFile->toArray();
        $this->assertArrayHasKey('id', $createdTempFile);
        $this->assertNotNull($createdTempFile['id'], 'Created TempFile must have id specified');
        $this->assertNotNull(TempFile::find($createdTempFile['id']), 'TempFile with given id must be in DB');
        $this->assertModelData($tempFile, $createdTempFile);
    }

    /**
     * @test read
     */
    public function testReadTempFile()
    {
        $tempFile = $this->makeTempFile();
        $dbTempFile = $this->tempFileRepo->find($tempFile->id);
        $dbTempFile = $dbTempFile->toArray();
        $this->assertModelData($tempFile->toArray(), $dbTempFile);
    }

    /**
     * @test update
     */
    public function testUpdateTempFile()
    {
        $tempFile = $this->makeTempFile();
        $fakeTempFile = $this->fakeTempFileData();
        $updatedTempFile = $this->tempFileRepo->update($fakeTempFile, $tempFile->id);
        $this->assertModelData($fakeTempFile, $updatedTempFile->toArray());
        $dbTempFile = $this->tempFileRepo->find($tempFile->id);
        $this->assertModelData($fakeTempFile, $dbTempFile->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTempFile()
    {
        $tempFile = $this->makeTempFile();
        $resp = $this->tempFileRepo->delete($tempFile->id);
        $this->assertTrue($resp);
        $this->assertNull(TempFile::find($tempFile->id), 'TempFile should not exist in DB');
    }
}
