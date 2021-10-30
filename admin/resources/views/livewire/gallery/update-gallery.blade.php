<div class="row">
    @include('layouts.messages')
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Update Gallery</h5>
                <form wire:submit.prevent="store">
                    <div class="form-group">
                        <label for="title">Gallery Title</label>
                        <input type="text" class="form-control" wire:model="title">
                    </div>
                    <div class="form-group">
                        <label for="type">Gallery Category</label>
                        <select wire:model="category" class="form-control">
                            <option value="">Select . . .</option>
                            @foreach($gcats as $cat)
                            <option value="{{$cat->unique_id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="type">Gallery Type</label>
                        <select wire:model="type" readonly disabled class="form-control">
                            <option value="{{$type}}">{{$type_text}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                    @if($type == 1)
                        <label for="image">Gallery Image</label>
                        <input type="file" accept=".jpg, .jpeg, .png, .webpp, .gif" class="form-control" wire:model="image">
                        @if($o_image)
                        <img src="{{asset('storage/gallery/'.$o_image)}}">
                        @endif
                    @elseif($type == 2)
                        <label for="video">Gallery Video URL</label>
                        <input type="url" class="form-control" wire:model="video_url" required>
                    @else
                        <small class="text-danger">Select Gallery Type . . . !</small>
                    @endif
                    </div>
                    <div class="form-group">
                        <label for="description">Gallery Description</label>
                        <textarea class="form-control" wire:model="description"></textarea>
                    </div>

                    <div class="card-footer">
                        <input type="submit" value="Update" class="btn btn-success btn-sm">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">View Galleries</h5>

                <div class="table-responsive">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>URL</th>
                                <th>Type</th>
                                <th>Date Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 1)
                            @foreach($galleries as $gallery)
                            <tr>
                                <th>{{$i++}}</th>
                                <td>{{$gallery->title}}</td>
                                <td>{{$gallery->url}}</td>
                                <td>{{$gallery->type}}</td>
                                <td>{{$gallery->created_at}}</td>
                                <td>
                                    <a href="{{route('gallery.update', ['unique_id'=>base64_encode($gallery->unique_id)])}}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <button class="btn btn-danger btn-sm delete-cat" data-module="gallery" data-id="{{base64_encode($gallery->unique_id)}}">
                                        <i class="bi bi-trash-fill"></i> Delete
                                    </button>
                                    <button class="btn btn-danger btn-sm" style="display: none" id="delete_cat_{{base64_encode($gallery->unique_id)}}" wire:click.prevent="delete('{{base64_encode($gallery->unique_id)}}')">
                                        <i class="bi bi-trash-fill"></i> Delete
                                    </button>
                                    {{-- <button class="btn btn-danger btn-sm" id="delete-cat_MDQxMTFiYTYtMDEzNy00ZGFlLWI3ZjktY2RiZmM4YWMzNzc0" data-id="MDQxMTFiYTYtMDEzNy00ZGFlbase64_encode($gallery->unique_id)LWI3ZjktY2RiZmM4YWMzNzc0" wire:click.prevent="delete('MDQxMTFiYTYtMDEzNy00ZGFlLWI3ZjktY2RiZmM4YWMzNzc0')">
                                        <i class="bi bi-trash-fill"></i> Delete
                                    </button> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>