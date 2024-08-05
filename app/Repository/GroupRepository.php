<?php

namespace App\Repository;
use App\Models\Group;

class GroupRepository extends GenericRepository
{
    public function __construct(Group $groups)
    {
        parent::__construct($groups);
    }
}