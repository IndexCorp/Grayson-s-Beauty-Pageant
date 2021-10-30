<section class="mt-4 mb-5">
    <x-home-header></x-home-header>
    <div class="container-fluid">
    	<div class="row">
    		<div class="card-columns justify-content-center align-items-center">
                @foreach(\App\Models\Gallery::where('type', 1)->latest()->get() as $gallery)
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