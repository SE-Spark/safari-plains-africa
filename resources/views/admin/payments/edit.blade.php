<div wire:ignore.self class="modal fade" id="updateModal" tabindex="1" role="dialog" aria-labelledby="updateModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{__(" Category")}}</label>
                                <select class="form-control @error('blogcategory') is-invalid @enderror" id="blogcategory_id" wire:model="blogcategory_id">
                                    <option value="">{{__("Select Category")}}</option>
                                    @foreach($categories as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                                @error('blogcategory_id') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{__(" Title")}}</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" wire:model="title">
                                @error('title') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{__(" Content")}}</label>
                                <input type="text" class="form-control @error('content') is-invalid @enderror" wire:model="content">
                                @error('content') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{__("Image")}}</label>
                                <input type="text" class="form-control @error('image_url') is-invalid @enderror" wire:model="image_url">
                                @error('image_url') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{__(" Publish")}}</label>
                                <select class="form-control" id="is_published" wire:model="is_published">
                                    <option value="" class="muted">{{__("Would like to Publish")}}</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary btn-round" data-bs-dismiss="modal">Close</button>
                        <button type="button" wire:click.prevent="update()" class="btn btn-primary btn-round">Save changes</button>
                    </div>
                    <hr class="half-rule" />
            </div>
            </form>
        </div>
    </div>
</div>
</div>