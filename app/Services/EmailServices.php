<?php

namespace App\Services;

use App\Repositories\EmailRepository;


/**
 * Class EmailServices
 *
 * @package App\Services
 */
class EmailServices
{
    /**
     * @var EmailRepository
     */
    private $emailRepository;

    /**
     * EmailServices constructor.
     *
     * @param EmailRepository $emailRepository
     */
    public function __construct(EmailRepository $emailRepository)
    {
        $this->emailRepository = $emailRepository;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->emailRepository->getAll();
    }

    public function getUidList()
    {
        return $this->emailRepository->getUidList();
    }

    public function getAllCount()
    {
        return $this->emailRepository->getAllCount();
    }
    public function getAllByPage($data)
    {
        $page = $data['page'] - 1;
        $limit = $data['limit'];
        $offset = $page * $limit;
        return $this->emailRepository->getAllByPage($offset, $limit);
    }

    public function getById($id)
    {
        return  $this->emailRepository->getById($id);
    }

    /**
     * @param $data
     * @return bool
     */
    public function store($data)
    {
        $data['content'] = $data['editorValue'];
        unset($data['_token'], $data['editorValue']);
//        return $this->emailRepository->store($data);
        if ($this->emailRepository->store($data)) {
            return true;
        } else {
            return false;
        }
    }




}