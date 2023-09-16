<?php

namespace App\Repository;
use App\Models\Blogpost;

class BlogpostRepository extends GenericRepository
{
    public function __construct(Blogpost $blogpost)
    {
        parent::__construct($blogpost);
    }
}