<div wire:ignore.self class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="destinationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="destinationModalLabel">{{__(" Create Hotel")}}</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{__(" Name")}}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name">
                                @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{__(" Address")}}</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" wire:model="address">
                                @error('address') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{__(" Contact Number")}}</label>
                                <input type="text" class="form-control @error('contact_number') is-invalid @enderror" wire:model="contact_number">
                                @error('contact_number') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{__(" Description")}}</label>
                                <input type="text" class="form-control @error('description') is-invalid @enderror" wire:model="description">
                                @error('description') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{__(" Status")}}</label>
                                <select class="form-control @error('status') is-invalid @enderror" name="status" id="status" wire:model="status">
                                    <option value="" class="muted">{{__("Select Status")}}</option>
                                    <option value="1" selected>Active</option>
                                    <option value="0">InActive</option>
                                </select>
                                @error('status') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <button type="button" wire:click.prevent="cancel()"class="btn btn-secondary btn-round" data-bs-dismiss="modal">Close</button>
                        <button type="button" wire:click.prevent="create()" class="btn btn-primary btn-round">{{__('Save')}}</button>
                    </div>
                    <hr class="half-rule" />
                </form>
            </div>
        </div>
    </div>
</div>