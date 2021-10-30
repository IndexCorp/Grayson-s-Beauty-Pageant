<!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="main-banner header-text">
        <div class="container-fluid">
          <div class="owl-banner owl-carousel">

            {{-- {{dd($featured)}} --}}
            @foreach($featured as $post)
            <div class="item">
              <img src="{{env('FILE_URL').'/posts/'.$post->image}}" alt="" height="300px">
              <div class="item-content">
                <div class="main-content">
                  <div class="meta-category">
                    <span>{{$post->category_name}}</span>
                  </div>
                  <a href="post-details.html"><h4>{{$post->title}}</h4></a>
                  <ul class="post-info">
                    <li><a href="#">{{$post->created_at}}</a></li>
                    <li><a href="#">{{$post->num_comments}} Comments</a></li>
                  </ul>
                </div>
              </div>
            </div>
            @endforeach

          </div>
        </div>
      </div>
      <!-- Banner Ends Here -->


      <section class="blog-posts">
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
              <div class="all-blog-posts">
                <div class="row">

                  @foreach($recents as $post)
                  <div class="col-lg-12">
                    <div class="blog-post">
                      <div class="blog-thumb">
                        <img src="{{env('FILE_URL').'/posts/'.$post->image}}" alt="">
                      </div>
                      <div class="down-content">
                        <span>{{$post->category_name}}</span>
                        <a href="{{route('post-details', ['slug'=>$post->slug])}}"><h4>{{$post->title}}</h4></a>
                        <ul class="post-info">
                          <li><a href="#">{{$post->created_at}}</a></li>
                          <li><a href="#">{{$post->num_comments}} Comments</a></li>
                        </ul>
                        <p>{{$post->heading}}</p>
                        {{-- <div class="post-options">
                          <div class="row">
                            <div class="col-6">
                              <ul class="post-tags">
                                <li><i class="fa fa-tags"></i></li>
                                <li><a href="#">Beauty</a>,</li>
                                <li><a href="#">Nature</a></li>
                              </ul>
                            </div>
                            <div class="col-6">
                              <ul class="post-share">
                                <li><i class="fa fa-share-alt"></i></li>
                                <li><a href="#">Facebook</a>,</li>
                                <li><a href="#"> Twitter</a></li>
                              </ul>
                            </div>
                          </div>
                        </div> --}}
                      </div>
                    </div>
                  </div>
                  @endforeach


                  <div class="col-lg-12">
                    <div class="main-button">
                      <a href="blog.html">View All Posts</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <x-sidebar></x-sidebar>
            </div>
          </div>
        </div>
      </section>

