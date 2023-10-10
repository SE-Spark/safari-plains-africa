<div wire:ignore.self class="modal fade" id="updateModal" tabindex="1" role="dialog" aria-labelledby="updateModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                    </div>
                    <div class="row">
                        <div class="col-md-7 pr-1">
                            <div class="form-group">
                                <label>{{__(" Name")}}</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" wire:model="name">
                                @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>                
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{__(" Address")}}</label>
                                <input type="text"class="form-control @error('address') is-invalid @enderror" wire:model="address">
                                @error('address') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>                
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{__(" Description")}}</label>
                                <input type="text"class="form-control @error('description') is-invalid @enderror" wire:model="description">
                                @error('description') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>              
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{__("Image")}}</label>
                                <input type="text"class="form-control @error('image_url') is-invalid @enderror" wire:model="image_url">
                                @error('image_url') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7 pr-1">
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{__(" Status")}}</label>
                                <select class="form-control" wire:model="status" id="status">
                                    <option value="1">Active</option>
                                    <option value="0">InActive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary btn-round" data-dismiss="modal">Close</button>
                        <button type="button" wire:click.prevent="update()" class="btn btn-primary btn-round" data-dismiss="modal">Save changes</button>
                    </div>
                    <hr class="half-rule" />
            </div>
            </form>
        </div>
    </div>
</div>
</div>