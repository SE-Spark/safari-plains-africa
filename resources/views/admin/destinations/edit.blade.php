<div wire:ignore.self class="modal fade" id="destUpdateModal" tabindex="1" role="dialog" aria-labelledby="destUpdateModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="destUpdateModalLabel">Update Destination</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                    </div>              
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{__(" Country")}}</label>
                                <select class="form-control @error('country_id') is-invalid @enderror" name="country_id" id="country_id" wire:model="country_id">
                                    <option value="" class="muted">{{__("Select Country")}}</option>
                                    @foreach($countries as $k => $v)
                                    <option value="{{$v->id}}">{{$v->name}}</option>
                                    @endforeach
                                </select>
                                @error('country_id') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 pr-1">
                            <div class="form-group">
                                <label>{{__(" Destination Name")}}</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" wire:model="name">
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
                                <label>{{__(" Description")}}</label>
                                <input type="text" class="form-control @error('description') is-invalid @enderror" wire:model="description">
                                @error('description') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{__("Image")}}</label>
                                <input type="file" class="form-control @error('image_photo') is-invalid @enderror" wire:model="image_photo">
                                @error('image_photo') <span class="text-danger error">{{ $message }}</span>@enderror
                                @if ($image_photo || $image_url)
                                Photo Preview:
                                <img src="{{ !empty($image_photo)?$image_photo->temporaryUrl():'assets/images/'.$image_url }}" width="220">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 pr-1">
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{__(" Status")}}</label>
                                <select class="form-control" wire:model="status" id="status">
                                    <<option value="" class="muted">{{__("Select Status")}}</option>
                                    <option value="1">Active</option>
                                    <option value="0">InActive</option>
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