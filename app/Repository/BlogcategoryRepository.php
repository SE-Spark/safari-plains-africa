<?php

namespace App\Repository;
use App\Models\Blogcategory;

class BlogcategoryRepository extends GenericRepository
{

    public function __construct(BlogCategory $blogCategory)
    {
        parent::__construct($blogCategory);
    }
    
}