<section class="bg-gray200 pt-5 pb-5">
    <div class="container">
    	<div class="row justify-content-center">
    		<div class="col-md-7">
    			<article class="card">
                @if($gallery->type == 1)
                    <img class="card-img-top mb-2" src="{{env('FILE_URL').'/gallery/'.$gallery->url}}" alt="Card image">
    			@else
                    <video controls="" class="card-img-top mb-2" autoplay="" name="media"><source src="{{$gallery->url}}" type="video/mp4"></video>
                @endif
    			<div class="card-body">
    				<h1 class="card-title display-4">
                        {{$gallery->title}}
                    </h1>
                    <p class="text-justify">
                        {{$gallery->description}}
                    </p>
    				<div id="comments" class="mt-4">
    					<div id="disqus_thread">
    					</div>
    					<script type="text/javascript">
                            var disqus_shortname = 'demowebsite'; 
                            var disqus_developer = 0;
                            (function() {
                                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                                dsq.src = window.location.protocol + '//' + disqus_shortname + '.disqus.com/embed.js';
                                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                            })();
                        </script>
    					<noscript>
    					Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a>
    					</noscript>
    				</div>
    				<!--End Comments
                    ================================================== -->
    			</div>
    			</article>
    		</div>
    	</div>
    </div>
    <div class="container-fluid mt-5">
    	<div class="row">
    		<h5 class="font-weight-bold">More like this</h5>
    		<div class="card-columns">

                @foreach($related as $gallery)
                <div class="card card-pin">
                    @if($gallery->type == 1)
    				<img class="card-img" src="{{env('FIle_URL').'/gallery/'.$gallery->url}}" alt="{{$gallery->title}}">
                    @else
                    <video controls="" autoplay="" name="media"><source src="{{$gallery->url}}" type="video/mp4"></video>
                    @endif
    				<div class="overlay">
    					<h2 class="card-title title">{{$gallery->title}}</h2>
    					<div class="more">
    						<a href="{{route('gallery', ['slug'=>$gallery->slug])}}">
    						<i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> More </a>
    					</div>
    				</div>
    			</div>
                @endforeach

            </div>
    	</div>
    </div>
</section>