<?php

namespace App\Livewire\Front;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use App\Repository\{BlogpostRepository,BlogcommentRepository};
use Livewire\Component;
use Illuminate\Support\Facades\Log;
class BlogController extends Component
{
    public $posts, $post, $header,$subheader, $currentIndex=0, $new_comment_content, $new_comment_postid;

    public $select_postid,$showMore = false;

    public function mount(BlogpostRepository $blogpostService)
    {
        if (request()->route('id')) {
            $blogpostService->addView(request()->route('id'));
            $this->new_comment_postid = request()->route('id');
            $this->showMoreDetails(request()->route('id'));            
        }
        $this->posts = $blogpostService->getAll()->where('is_published', 1);
        $this->nextHeader();
    }
    public function render()
    {
        return view('front.blog')->layout('front.layouts.app');
    }

    public function showMoreDetails($id)
    {        
        $blogpostService = app(BlogpostRepository::class);
        $blogpostService->addView(request()->route('id'));
        $this->post = $blogpostService->getAll()->where('id', $id)->first();
        $this->select_postid = $id;
        $this->showMore = true;
    }
    public function nextHeader()
    {
        $this->currentIndex = ($this->currentIndex + 1) % count($this->getHeaders());
        $this->displayHeader();
    }

    public function addComments(BlogcommentRepository $blogcommentService,BlogpostRepository $blogpostService){
        $this->validate([
            'new_comment_postid' => 'required|exists:blogposts,id',
            'new_comment_content' => 'required|string',
        ]);
        $blogpostService->addComment($this->new_comment_postid,$this->new_comment_content);
        // $blogcommentService->create( [
        //     'comment' =>$this->new_comment_content,
        //     'parent_id'=>$this->new_comment_postid,
        //     'created_by'=> Auth::user()->id
        // ]);
        $this->post = $blogpostService->get()->where('id',$this->new_comment_postid)->first();
        // $this->dispatch('refreshPost',['id'=>$this->new_comment_postid]);    
    }
    #[On('refreshPost')]
    public function refreshPost(BlogpostRepository $blogpostService,$id){
        $this->post = $blogpostService->get()->where('id',$id)->first();
    }
    public function likePost(BlogpostRepository $blogpostService){
        
        $blogpostService->addLike($this->new_comment_postid);
        $this->post = $blogpostService->get()->where('id',$this->new_comment_postid)->first();
    }
    private function displayHeader()
    {
        $new_headers = $this->getHeaders()[$this->currentIndex];
        $this->header = $new_headers['header'];
        $this->subheader = $new_headers['subheader'];
    }

    private function getHeaders()
    {
        return [
            [
                'header' => "Wanderlust Chronicles",
                'subheader' => "Explore the Unexplored, Share the Untold"
            ],
            [
                'header' => "Discover the World with BONANZA",
                'subheader' => "A Journey Through Culture, Cuisine, and Connection"
            ],
            [
                'header' => "Journey Beyond: BONANZA Blog",
                'subheader' => "Beyond Borders: Stories that Transcend Time Zones"
            ],
            [
                'header' => "Unveiling Horizons: BONANZA Travels",
                'subheader' => "Where Every Post is a Passport Stamp"
            ],
            [
                'header' => "Adventure Awaits: Tales from BONANZA",
                'subheader' => "From Our Desk to Your Next Destination"
            ]
        ];
    }

}
