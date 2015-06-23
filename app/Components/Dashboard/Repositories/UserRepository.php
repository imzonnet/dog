<?php namespace App\Components\Dashboard\Repositories;

use App\Repositories\BaseRepository;

interface UserRepository extends BaseRepository
{
    /**
     * Return all records/entities for users
     *
     * @return array
     */
    public function listAllUsers();

}