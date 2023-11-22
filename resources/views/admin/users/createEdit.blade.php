<div wire:ignore.self class="modal fade" id="createUpdateModal" tabindex="-1" role="dialog" aria-labelledby="createUpdateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createUpdateModalLabel">{{$modalTitle}}</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{__(" First Name")}}</label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" wire:model="first_name">
                                @error('first_name') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{__(" Last Name")}}</label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" wire:model="last_name">
                                @error('last_name') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{__(" Email")}}</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" wire:model="email">
                                @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{__(" Phone")}}</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" wire:model="phone">
                                @error('phone') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>                   
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="staff">{{__(" Is Staff")}}</label>
                                <select class="form-control @error('is_staff') is-invalid @enderror" id="staff" wire:model="is_staff">
                                    <option value="" class="muted">{{__("Select Role")}}</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                @error('is_staff') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <button type="button" wire:click.prevent="cancel()"class="btn btn-secondary btn-round" data-bs-dismiss="modal">Close</button>
                        <button type="button" wire:click.prevent="createUpdate()" class="btn btn-primary btn-round">{{__('Save')}}</button>
                    </div>
                    <hr class="half-rule" />
                </form>
            </div>
        </div>
    </div>
</div>