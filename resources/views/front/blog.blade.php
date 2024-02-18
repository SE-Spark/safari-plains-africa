@if(!$showMore)
@push('styles')
<style>
    /* .img-fluid {
        height: 200px !important;
    } */
    @media (min-width: 768px) {
        .img-fluid {
            height: 230px !important;
        }
    }

    @media (min-width: 1200px) {
        .img-fluid {
            height: 240px !important;
        }
    }

    @media (min-width: 1400px) {
        .img-fluid {
            height: 290px !important;
        }
    }

    /* comments */
</style>
@endpush
@endif
<div x-data="{ scrollToDestination: true }" x-init="scrollToDestination && $nextTick(() => scrollTo('#maincontent'))">
    <div class="container-xxl py-5" id="maincontent">
        @if(!$showMore)
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s" wire:poll="nextHeader">
                <h6 class="section-title bg-white text-center text-primary px-3">{{$header}}</h6>
                <h1 class="mb-5">{{$subheader}}</h1>
            </div>
            <div class="row g-4 justify-content-center">
                @foreach($posts as $k => $v)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="package-item">
                        <div class="position-relative d-block overflow-hidden">
                            <img class="img-fluid" src="{{\App\Helpers\HP::getImgUrl($v->image_url)}}" alt="">
                        </div>
                        <div class="text-start p-2">
                            <p>{{implode(' ', array_slice(explode(' ', $v->title), 0, 30))}}</p>
                            <p>{!! implode(' ', array_slice(explode(' ', $v->content), 0, 30)) !!}</p>
                        </div>
                        <div class="d-flex">
                            <small class="flex-fill text-center py-2"><i class="fa fa-eye text-primary me-2"></i>{{$v->views??0}}</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-thumbs-up text-primary me-2"></i>{{$v->likes->count()??0}}</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-comments text-primary me-2"></i>{{$v->comments->count()??0}}</small>
                            <small class="flex-fill text-center py-2"><a href="{{route('blog',['id'=>$v->id])}}" class="btn btn-sm btn-primary px-3" style="border-radius: 30px 30px 30px 30px;">Read More</a></small>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @else
        {{-- Blog read more--}}
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-md-4 wow zoomIn" data-wow-delay="0.5s">
                    <a class="position-relative d-block overflow-hidden" href="">
                        <img class="img-fluid" src="{{\App\Helpers\HP::getImgUrl($post->image_url)}}" alt="">
                    </a>
                </div>
                <div class="col-md-8 wow fadeInUp mt-auto" data-wow-delay="0.1s">
                    <div class="package-item pt-2">
                        <h4 class="text-center py-2">{{$post->title}}</h4>
                        <div class="d-flex">
                            <small class="flex-fill text-center py-2"><i class="fa fa-eye text-primary me-2"></i>{{$post->views}}</small>
                            @guest
                            <small class="flex-fill text-center py-2"><a href="{{route('login',['account'=>'signin'])}}"><i class="fa fa-thumbs-up text-primary me-2"></i>{{$post->likes->count()}}</a></small>

                            @else
                            <small class="flex-fill text-center py-2"><a href="javascript:;" wire:click.prevent='likePost'><i class="fa fa-thumbs-up text-primary me-2"></i>{{$post->likes->count()}}</a></small>
                            @endguest
                            <small class="flex-fill text-center py-2"><i class="fa fa-comments text-primary me-2"></i>{{$post->comments->count()}}</small>
                            <small class="flex-fill text-center py-2" x-data="{ goBack: function() { window.history.back(); } }"><a href="javascript:;" x-on:click="goBack" class="btn btn-sm btn-primary px-3" style="border-radius: 30px 30px 30px 30px;">Back</a></small>
                        </div>
                    </div>
                </div>
                <div class="col-12 wow fadeInUp m-auto" data-wow-delay="0.1s">
                    <div class="package-item">
                        <div class="text-start p-4">
                            <h6 class="text-primary">Description</h6>
                            <p>{!! $post->content !!}</p>
                        </div>
                    </div>
                    <!-- Comments Section -->
                    <div class="text-start p-4">
                        <h6 class="text-primary">Comments</h6>
                        <!-- Add a form for users to submit comments -->
                        <form>
                            @csrf
                            <input type="hidden" wire:model='new_comment_postid' value="{{ $post->id }}">
                            <div class="form-group mb-2">
                                <textarea class="form-control" wire:model='new_comment_content' rows="3" placeholder="Add your comment"></textarea>
                            </div>
                            @guest
                            <a href="{{route('login',['account'=>'signin'])}}" style="margin-right:20px !important;">Login to comment</a>
                            @else
                            <button wire:click.prevent='addComments' type="submit" class="btn btn-primary">Submit</button>
                            @endguest
                        </form>

                        <!-- List Comments -->
                        <div class="mt-4">
    @if ($post->comments->count() > 0)
    <div class="list-group">
        @foreach ($post->comments as $comment)
        <div class="list-group-item">
            <div class="d-flex w-100 justify-content-between">
                <h6 class="mb-1"><i class="fa fa-user-circle fa-2x text-primary"></i> <span class="pr-4"></span>{{ rand(8000000,2).$comment->user->id.rand(800000,2) }}</h6>
                <small>{{ $comment->created_at->diffForHumans() }}</small>
            </div>
            <p class="mb-1">{{ $comment->comment }}</p>
        </div>
        @endforeach
    </div>
    @else
    <p>No comments yet.</p>
    @endif
</div>

                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@push('scripts')
<script>
    function delayScroll(elementId, delay) {
        setTimeout(() => {
            scrollTo(elementId);
        }, delay);
    }

    function scrollTo(elementId) {
        const element = document.querySelector(elementId);

        if (element) {
            element.scrollIntoView({
                behavior: 'smooth',
                block: 'start',
                inline: 'nearest'
            });
        }
    }
</script>
@endpush