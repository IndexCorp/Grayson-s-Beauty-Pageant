<div>
    <div class="heading-page header-text">
        <section class="page-heading">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="text-content">
                  <h4>Post Details</h4>
                  <h2>{{$post->title}}</h2>
                </div>
              </div>
            </div>
          </div>
        </section>
    </div>


    <section class="blog-posts grid-system">
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
              <div class="all-blog-posts">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="blog-post">
                      <div class="blog-thumb">
                        <img src="{{asset('assets/images/'.$post->image)}}" alt="">
                      </div>
                      <div class="down-content">
                        <span>{{$post->category_name}}</span>
                        <a href="post-details.html"><h4>{{$post->heading}}</h4></a>
                        <ul class="post-info">
                          <li><a href="#">{{$post->created_at}}</a></li>
                          <li><a href="#">{{$post->num_comments}} Comments</a></li>
                        </ul>
                        <p class="text-justify">
                            {{$post->body}}
                        </p>
                        {{-- <div class="post-options">
                          <div class="row">
                            <div class="col-6">
                              <ul class="post-tags">
                                <li><i class="fa fa-tags"></i></li>
                                <li><a href="#">Best Templates</a>,</li>
                                <li><a href="#">TemplateMo</a></li>
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
                  <div class="col-lg-12">
                    <div class="sidebar-item comments">
                      <div class="sidebar-heading">
                        <h2>{{$post->num_comments}} comments</h2>
                      </div>
                      <div class="content">
                        <ul>
                            @if($post->num_comments > 0)
                                @foreach($comments as $comment)
                                <li>
                                    {{-- <div class="author-thumb">
                                        <img src="assets/images/comment-author-01.jpg" alt="">
                                    </div> --}}
                                    <div class="right-content">
                                        <h4>{{$comment->name}}<span>{{$comment->created_at}}</span></h4>
                                        <p>{{$comment->body}}.</p>
                                    </div>
                                </li>
                                @endforeach
                            @else
                                <li>
                                    <h5 class="text-center text-danger">
                                        No Comment Found
                                    </h5>
                                </li>
                            @endif
                          
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                      <br/><br/>
                    <div class="">
                        @if(Session::has('meesage'))
                        <div class="alert- alert-success">{{Session::get('message')}}</div>
                        @endif
                      <div class="sidebar-heading">
                        <h2>Your comment</h2>
                      </div>
                      <div class="content">
                        <form id="comment" wire:submit.prevent="storeComment">
                          <div class="row">
                            <div class="col-md-6 col-sm-12">
                              <fieldset class="form-group">
                                <input type="text" placeholder="Your name" required="" wire:model="c_name"
                                value="{{Session::get('com_name')}}" class="form-control"
                                >
                              </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <fieldset class="form-group">
                                <input type="text" placeholder="Your email" wire:model="c_email"
                                value="{{Session::get('com_email')}}" class="form-control"
                                >
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset class="form-group">
                                <textarea rows="6" placeholder="Type your comment" required="" wire:model="c_body" class="form-control"></textarea>
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset class="form-group">
                                <button type="submit" id="form-submit" class="main-button btn btn-success btn-sm">Submit</button>
                              </fieldset>
                            </div>
                          </div>
                        </form>
                      </div>
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
</div>
