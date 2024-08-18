<div>

    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Blog</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Blog</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    @include('front.components.booking')


    <!-- Blog Start -->
    <div class="container-fluid py-1">
        <div class="container py-1">
            <div class="row">
                <div class="col-lg-8">
                    @if(!$showMore)
                    <div class="row pb-3">
                        @forelse($posts as $blog)
                        <div class="col-md-6 mb-4 pb-2">
                            <div class="blog-item">
                                <div class="position-relative">
                                    <img class="img-fluid w-100" src="{{\App\Helpers\HP::getImgUrl($blog->image_url)}}" alt="">
                                    <div class="blog-date">
                                        <h6 class="font-weight-bold mb-n1">{{$blog->date_day}}</h6>
                                        <small class="text-white text-uppercase">{{$blog->date_month}}</small>
                                    </div>
                                </div>
                                <div class="bg-white p-4">
                                    <div class="d-flex mb-2">
                                        <a class="text-primary text-uppercase text-decoration-none" href="{{route('blog',['id'=>$blog->id])}}" wire:navigate>{{$blog->category->name}}</a>
                                    </div>
                                    <a class="h5 m-0 text-decoration-none" href="{{route('blog',['id'=>$blog->id])}}" wire:navigate>{{$blog->title}}</a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col">
                            <p>no blog found</p>
                        </div>
                        @endforelse
                    </div>
                    @else
                    <div class="pb-3">
                        <div class="blog-item">
                            <div class="position-relative">
                                <img class="img-fluid w-100" src="{{\App\Helpers\HP::getImgUrl($post->image_url)}}" alt="">
                                <div class="blog-date">
                                    <h6 class="font-weight-bold mb-n1">{{$post->date_day}}</h6>
                                    <small class="text-white text-uppercase">{{$post->date_month}}</small>
                                </div>

                                <div class="blog-back-btn">
                                    <small class="flex-fill text-center py-2" x-data="{ goBack: function() { window.history.back(); } }"><a href="javascript:;" x-on:click="goBack" class="btn btn-sm btn-primary px-3" style="border-radius: 10px 10px 10px 10px;">Back</a></small>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white mb-3" style="padding: 30px;">
                            <div class="d-flex mb-3">
                                <a class="text-primary text-uppercase text-decoration-none" href="">{{$post->category->name}}</a>
                            </div>
                            <h2 class="mb-3">{{$post->title}}</h2>
                            <p>{!! $post->content !!}</p>
                        </div>
                    </div>
                    @if ($post->comments->count() > 0)
                    <div class="bg-white" style="padding: 30px; margin-bottom: 30px;">
                        <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">{{$post->comments->count()??0}} Comments</h4>
                        @foreach ($post->comments as $comment)
                        <div class="media mb-4">
                            <img src="{{asset('logo.jpeg')}}" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                            <div class="media-body">
                                <h6><a href="#">{{ rand(8000000,2).$comment->user->id.rand(800000,2) }}</a> <small><i>{{$comment->ceated_at->format('d M Y')}}</i></small></h6>
                                <p>{{$comment->comment}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    <div class="bg-white mb-3" style="padding: 30px;">
                        <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Leave a comment</h4>
                        <form>
                            @csrf
                            <input type="hidden" wire:model='new_comment_postid' value="{{ $post->id }}">


                            <div class="form-group">
                                <label for="message">Message *</label>
                                <textarea class="form-control" wire:model='new_comment_content' rows="3" placeholder="Add your comment"></textarea>
                            </div>
                            <div class="form-group mb-0">
                                @guest
                                <a href="{{route('login',['account'=>'signin'])}}" style="margin-right:20px !important;">Login to comment</a>
                                @else
                                <button wire:click.prevent='addComments' type="submit" class="btn btn-primary font-weight-semi-bold py-2 px-3">Submit</button>
                                @endguest
                            </div>
                        </form>
                    </div>
                    @endif
                </div>

                <div class="col-lg-4 mt-5 mt-lg-0">
                    <!-- Search Form -->
                    <div class="mb-5">
                        <div class="bg-white" style="padding: 30px;">
                            <div class="input-group">
                                <input type="text" class="form-control p-4" placeholder="Keyword">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-primary border-primary text-white"><i class="fa fa-search"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Category List -->
                    <div class="mb-5">
                        <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Categories</h4>
                        <div class="bg-white" style="padding: 30px;">
                            <ul class="list-inline m-0">
                                @forelse($categories as $cat)
                                <li class="mb-3 d-flex justify-content-between align-items-center">
                                    <a class="text-dark" href="#"><i class="fa fa-angle-right text-primary mr-2"></i>
                                        {{$cat->name}}
                                    </a>
                                    <span class="badge badge-primary badge-pill">{{$cat->blogs->count()??0}}</span>
                                </li>
                                @empty

                                @endforelse
                                {{--
                                <li class="mb-3 d-flex justify-content-between align-items-center">
                                    <a class="text-dark" href="#"><i class="fa fa-angle-right text-primary mr-2"></i>Web
                                        Development</a>
                                    <span class="badge badge-primary badge-pill">131</span>
                                </li>
                                <li class="mb-3 d-flex justify-content-between align-items-center">
                                    <a class="text-dark" href="#"><i class="fa fa-angle-right text-primary mr-2"></i>Online Marketing</a>
                                    <span class="badge badge-primary badge-pill">78</span>
                                </li>
                                <li class="mb-3 d-flex justify-content-between align-items-center">
                                    <a class="text-dark" href="#"><i class="fa fa-angle-right text-primary mr-2"></i>Keyword Research</a>
                                    <span class="badge badge-primary badge-pill">56</span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center">
                                    <a class="text-dark" href="#"><i class="fa fa-angle-right text-primary mr-2"></i>Email Marketing</a>
                                    <span class="badge badge-primary badge-pill">98</span>
                                </li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->
</div>