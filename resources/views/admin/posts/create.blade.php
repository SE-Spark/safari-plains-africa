<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__(" Create Category")}}</h5>
            </div>
            <div class="modal-body">
                <form>                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{__(" Name")}}</label>
                                <input type="text"class="form-control @error('name') is-invalid @enderror" wire:model="name">
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
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{__(" Status")}}</label>
                                <select class="form-control" name="status" id="status" wire:model="status">
                                    <option value="1" selected>Active</option>
                                    <option value="0">InActive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <button type="button" class="btn btn-secondary btn-round" data-bs-dismiss="modal">Close</button>
                        <button type="button" wire:click.prevent="create()" class="btn btn-primary btn-round">{{__('Save')}}</button>
                    </div>
                    <hr class="half-rule" />
                </form>
            </div>
        </div>
    </div>
</div>