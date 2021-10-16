<div class="card">
    <div class="card-body">
        @include('layouts.messages')
        <a style="float: right!important;" href="{{route('post.add')}}" class="btn btn-primary btn-sm">Add New Post</a>
        <h5 class="card-title">All Posts</h5>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Post Heading</th>
                        <th>Post Image</th>
                        <th>Date Posted</th>
                        <th>Date Updated</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i=1)
                    @foreach($posts as $post)
                    <tr>
                        <th>{{$i++}}</th>
                        <td>{{$post->heading}}</td>
                        <td><img src="{{asset('storage/posts/'.$post->image)}}"/></td>
                        <td>{{$post->created_at}}</td>
                        <td>{{$post->updated_at}}</td>
                        <td>
                            <a href="{{route('post.edit', ['unique_id'=>base64_encode($post->unique_id)])}}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <button class="btn btn-danger btn-sm delete-cat" data-module="post" data-id="{{base64_encode($post->unique_id)}}">
                                <i class="bi bi-trash-fill"></i> Delete
                            </button>
                            <button class="btn btn-danger btn-sm" style="display: none" id="delete_cat_{{base64_encode($post->unique_id)}}" wire:click.prevent="delete('{{base64_encode($post->unique_id)}}')">
                                <i class="bi bi-trash-fill"></i> Delete
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$posts->links()}}
        </div>
    </div>
</div>