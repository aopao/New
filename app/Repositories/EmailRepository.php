<?php

namespace App\Repositories;

use App\Models\Email;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

/**
 * Class EmailRepository
 *
 * @package App\Repositories
 */
class EmailRepository
{
    /**
     * @var Email
     */
    private $email;

    private $user;

    /**
     * EmailRepository constructor.
     *
     * @param Email $email ,User $user
     */
    public function __construct(Email $email, User $user)
    {
        $this->email = $email;
        $this->user = $user;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->email->all();
    }

    public function getUidList()
    {
        return $this->user->where('is_admin', '0')->where('status', '1')->where('email', '!=', '')->where('email', '!=', null)->get();
    }

    public function getAllCount()
    {
        return $this->email
            ->join('users', 'emails.uid', '=', 'users.id')
            ->where('users.is_admin', 'eq', '0')
            ->count();
    }

    public function getAllByPage($offset, $limit)
    {
        return $this->email
            ->join('users', 'emails.uid', '=', 'users.id')
            ->where('users.is_admin', 'eq', '0')
            ->select('users.mobile', 'users.email', 'emails.*')
            ->skip($offset)
            ->limit($limit)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * @param $id
     * @return mixed|static
     */
    public function getById($id)
    {
        return $this->email->find($id);
    }

    /**
     * @param array $data
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public function store(array $data)
    {
        $flag = false;
        $from_address = env('MAIL_FROM_ADDRESS');
        foreach ($data['uidlist'] as $k => $v) {
            $data['uid'] = $v;
            $data['fromaddr'] = $from_address;
            $email = $this->user->where('id', $data['uid'])->select('email')->get();
            $message = $data['content'];
            $to = $email[0]['email'];
            $subject = $data['title'];
            Mail::send(
                'emails.test',
                ['content' => $message],
                function ($message) use ($to, $subject) {
                    $message->to($to)->subject($subject);
                }
            );

            $flag = $this->email->create($data);
        }

        return $flag;
    }
}