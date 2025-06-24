<div class="container">
    <h2>Livewire Example</h2>
    <div class="row">
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
        <div class="col-sm-8"></div>
    </div>
</div>
