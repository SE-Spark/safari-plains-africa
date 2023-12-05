<?php

namespace App\Livewire\Front;

use App\Repository\BlogpostRepository;
use Livewire\Component;

class BlogController extends Component
{
    public $posts, $post, $header,$subheader, $currentIndex=0;
    public $showMore = false;
    public function mount(BlogpostRepository $blogpostService)
    {
        $this->posts = $blogpostService->getAll()->where('is_published', 1);
        $this->nextHeader();
        if (request()->route('id')) {
            $this->showMoreDetails(request()->route('id'));
        }
    }
    public function render()
    {
        return view('front.blog')->layout('front.layouts.app');
    }

    public function showMoreDetails($id)
    {
        $this->post = $this->posts->where('id', $id)->first();
        $this->showMore = true;
    }
    public function nextHeader()
    {
        $this->currentIndex = ($this->currentIndex + 1) % count($this->getHeaders());
        $this->displayHeader();
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
