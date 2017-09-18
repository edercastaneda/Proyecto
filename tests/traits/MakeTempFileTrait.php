<?php

use Faker\Factory as Faker;
use App\Models\TempFile;
use App\Repositories\TempFileRepository;

trait MakeTempFileTrait
{
    /**
     * Create fake instance of TempFile and save it in database
     *
     * @param array $tempFileFields
     * @return TempFile
     */
    public function makeTempFile($tempFileFields = [])
    {
        /** @var TempFileRepository $tempFileRepo */
        $tempFileRepo = App::make(TempFileRepository::class);
        $theme = $this->fakeTempFileData($tempFileFields);
        return $tempFileRepo->create($theme);
    }

    /**
     * Get fake instance of TempFile
     *
     * @param array $tempFileFields
     * @return TempFile
     */
    public function fakeTempFile($tempFileFields = [])
    {
        return new TempFile($this->fakeTempFileData($tempFileFields));
    }

    /**
     * Get fake data of TempFile
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTempFileData($tempFileFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'user_id' => $fake->randomDigitNotNull,
            'data' => $fake->word,
            'nombre' => $fake->word,
            'type' => $fake->word,
            'size' => $fake->randomDigitNotNull,
            'extension' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $tempFileFields);
    }
}
