<div class="card">
    <div class="card-body">
        @include('layouts.messages')
        <a style="float: right!important;" href="{{route('post.add')}}" class="btn btn-primary btn-sm m-2">Add New Post</a>
        <a style="float: right!important;" href="{{route('post.view')}}" class="btn btn-primary btn-sm m-2">View All Posts</a>
        <h5 class="card-title">Update Post</h5>
        <form wire:submit.prevent="submit">
            <div class="form-group">
                <label for="category">Post Category</label>
                <select name="category" id="category" class="form-control" wire:model="category">
                    <option value="">Select Category . . .</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Post Title</label>
                <input type="text" id="title" class="form-control" wire:model="title">
            </div>
            <div class="form-group">
                <label for="heading">Post Heading</label>
                <input type="text" id="heading" class="form-control" wire:model="heading">
            </div>
            <div class="form-group">
                <label for="image">Post Image <small>(Not required)</small></label>
                <input type="file" id="image" class="form-control" wire:model="image" accept=".jpg, .jpeg, .png, .gif, .webpp">
            </div>
            <div class="form-group">
                @if($image)
                <?php if($image->extension() === 'jpg' || $image->extension() === 'png' || $image->extension() === 'jpeg' || $image->extension() === 'gif' || $image->extension() === 'webpp'): ?>
                <img src="{{$image->temporaryUrl()}}" height="150" width="200"/>
                <?php endif; ?>
                @endif
            </div>
            <div class="form-group">
                <label for="body">Post Body</label>
                {{-- <textarea class="tinymce-editor" wire:model="body"></textarea> --}}
                <textarea class="form-control" rows="10" wire:model="body"></textarea>
            </div>
            <div class="card-footer">
                <input type="submit" value="Submit" class="btn btn-success btn-sm btn-block">
            </div>
        </form>
    </div>    
</div>    
