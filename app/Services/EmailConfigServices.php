<?php

namespace App\Services;

use App\Repositories\EmailConfigRepository;

/**
 * Class EmailConfigServices
 *
 * @package App\Services
 */
class EmailConfigServices
{
    /**
     * @var EmailConfigRepository
     */
    private $emailConfigRepository;

    /**
     * EmailConfigServices constructor.
     *
     * @param EmailConfigRepository $emailConfigRepository
     */
    public function __construct(EmailConfigRepository $emailConfigRepository)
    {
        $this->emailConfigRepository = $emailConfigRepository;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->emailConfigRepository->getAll();
    }


    public function update($data)
    {

//        $id = $data['id'];
////        unset($data['_token'], $data['_method']);
//        unset($data['_token']);
//
//        if ($this->emailConfigRepository->update($id, $data)) {
//            return true;
//        } else {
//            return false;
//        }

        unset($data['_token'], $data['_method']);

        $envPath = base_path() . DIRECTORY_SEPARATOR . '.env';

        $contentArray = collect(file($envPath, FILE_IGNORE_NEW_LINES));

        $contentArray->transform(function ($item) use ($data){
            foreach ($data as $key => $value){
                if(str_contains($item, $key)){
                    return $key . '=' . $value;
                }
            }

            return $item;
        });

        $content = implode($contentArray->toArray(), "\n");

//        \File::put($envPath, $content);

        if (\File::put($envPath, $content)) {
            return true;
        } else {
            return false;
        }


    }


}