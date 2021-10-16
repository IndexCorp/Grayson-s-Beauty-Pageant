<div class="row">
    @include('layouts.messages')
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Update Category</h5>
                <form wire:submit.prevent="submit">
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" class="form-control" wire:model="name" wire:keyup="generateSlug">
                    </div>
                    <div class="form-group">
                        <label for="Slug">Category Slug</label>
                        <input type="text" class="form-control" wire:model="slug" readonly>
                    </div>
                    <div class="form-group">
                        <label for="description">Category Description</label>
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
                <h5 class="card-title">View Categories</h5>

                <div class="table-responsive">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Date Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 1)
                            @foreach($categories as $category)
                            <tr>
                                <th>{{$i++}}</th>
                                <td>{{$category->name}}</td>
                                <td>{{$category->slug}}</td>
                                <td>{{$category->created_at}}</td>
                                <td>
                                    <a href="{{route('post.categories.edit', ['unique_id'=>base64_encode($category->unique_id)])}}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <button class="btn btn-danger btn-sm" wire:click.confirm="delete({{base64_encode($category->unique_id)}})">
                                        <i class="bi bi-trash-fill"></i> Delete
                                    </button>
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