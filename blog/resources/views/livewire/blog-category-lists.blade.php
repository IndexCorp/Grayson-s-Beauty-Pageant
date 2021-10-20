<div class="page">
    <div class="heading-page header-text">
        <section class="page-heading">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="text-content">
                  <h4>Recent Posts</h4>
                  <h2>{{$category->name}}</h2>
                </div>
              </div>
            </div>
          </div>
        </section>
    </div>

    <div class="blog-posts grid-system">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="all-blog-post">
                        <div class="row">
                            @foreach($posts as $post)
                            <div class="col-lg-6">
                                <div class="blog-post">
                                <div class="blog-thumb">
                                    <img src="{{asset('assets/images/'.$post->image)}}" alt="">
                                </div>
                                <div class="down-content">
                                    <span>{{$post->category_name}}</span>
                                    <a href="{{route('post-details', ['slug'=>$post->slug])}}"><h4>{{$post->title}}</h4></a>
                                    <ul class="post-info">
                                    <li><a href="#">{{$post->created_at}}</a></li>
                                    <li><a href="#">{{$post->num_comments}} Comments</a></li>
                                    </ul>
                                    <p>{{$post->heading}}.</p>
                                    {{-- <div class="post-options">
                                    <div class="row">
                                        <div class="col-lg-12">
                                        <ul class="post-tags">
                                            <li><i class="fa fa-tags"></i></li>
                                            <li><a href="#">Best Templates</a>,</li>
                                            <li><a href="#">TemplateMo</a></li>
                                        </ul>
                                        </div>
                                    </div>
                                    </div> --}}
                                </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
    
                    {{$posts->links()}}
                </div>
                <div class="col-md-4">
                    <x-sidebar></x-sidebar>
                </div>
            </div>
        </div>
    </div>
</div>