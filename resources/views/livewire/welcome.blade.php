<div class="container">
    <h2>Livewire Example</h2>
    <div class="row">
        @session("success_msg")
            <div class="alert alert-success">{{ session("success_msg") }}</div>
        @endsession
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="savePost">
                        <div class="form-group mb-3">
                            <label for="title">Title</label>
                            <input type="text" id="title" class="form-control" wire:model="title">
                            @error('title')
                                    <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="content">Content</label>
                            <textarea  id="content" cols="30" rows="10" class="form-control" wire:model="content"></textarea>
                            @error('content')
                                    <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
                   <ul class="list-group">
                        @foreach ($posts as  $p)
                            <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-1">
                                            <div class="small text-lighter">ID</div>
                                            <div class="fw-bold">{{ $p->id }}</div>
                                        </div>
                                        <div class="col-4">
                                            <div class="smll text-lighter">Title</div>
                                            <div class="fw-bold">{{ $p->title }}</div>
                                        </div>
                                         <div class="col-5">
                                            <div class="smll text-lighter">Content</div>
                                            <div class="fw-bold">{{ $p->content }}</div>
                                        </div>
                                        <div class="col-2">
                                            <div class="d-flex">
                                                <a href="#!" class="btn btn-secondary btn-sm">Edit</a>
                                                <a href="#!" class="btn btn-danger btn-sm">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                            </li>
                        @endforeach
                   </ul>
                   {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
