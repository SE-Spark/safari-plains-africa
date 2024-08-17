<?php

namespace App\Livewire\Front;

use Livewire\Component;
use App\Repository\{BlogcategoryRepository,BlogpostRepository,BlogcommentRepository, DestinationsRepository, CountriesRepository};
use Livewire\Attributes\On;

class Blogcontroller extends Component
{
    public $posts, $post, $header,$subheader, $currentIndex=0, $new_comment_content, $new_comment_postid;
    public $dest_options,$country_options,$categories;
    public $select_postid,$showMore = false;
    public function mount(BlogcategoryRepository $blogcategoryRepository,BlogpostRepository $blogpostService,DestinationsRepository $destinationService, CountriesRepository $countriesRepository)
    {
        if (request()->route('id')) {
            $blogpostService->addView(request()->route('id'));
            $this->new_comment_postid = request()->route('id');
            $this->showMoreDetails(request()->route('id'));            
        }        
        $this->dest_options = $destinationService->get()->where('status',1)->get(['id','name']);
        $this->country_options = $countriesRepository->get()->where('status',1)->get(['id','name']);
        $this->posts = $blogpostService->getAll()->where('is_published', 1);
        $this->categories  = $blogcategoryRepository->getAll();
    }
    public function render()
    {
        return view('front.blog')->layout('front.layout.app');
    }
    

    public function showMoreDetails($id)
    {        
        $blogpostService = app(BlogpostRepository::class);
        $blogpostService->addView(request()->route('id'));
        $this->post = $blogpostService->getAll()->where('id', $id)->first();
        $this->select_postid = $id;
        $this->showMore = true;
    }

    public function addComments(BlogcommentRepository $blogcommentService,BlogpostRepository $blogpostService){
        $this->validate([
            'new_comment_postid' => 'required|exists:blogposts,id',
            'new_comment_content' => 'required|string',
        ]);
        $blogpostService->addComment($this->new_comment_postid,$this->new_comment_content);
        $this->post = $blogpostService->get()->where('id',$this->new_comment_postid)->first();
    }
    #[On('refreshPost')]
    public function refreshPost(BlogpostRepository $blogpostService,$id){
        $this->post = $blogpostService->get()->where('id',$id)->first();
    }
    public function likePost(BlogpostRepository $blogpostService){
        
        $blogpostService->addLike($this->new_comment_postid);
        $this->post = $blogpostService->get()->where('id',$this->new_comment_postid)->first();
    }
}
