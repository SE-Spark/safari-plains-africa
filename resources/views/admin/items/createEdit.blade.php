<div wire:ignore.self class="modal fade" id="createUpdateModal" tabindex="-1" role="dialog" aria-labelledby="destinationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="destinationModalLabel">{{$modalTitle}}</h5>
            </div>
            <div class="modal-body">

                <form>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{__(" Category")}}</label>
                                <select class="form-control @error('booking_item_type_id') is-invalid @enderror" id="booking_item_type_id" wire:model="booking_item_type_id">
                                    <option value="">{{__("Select Category")}}</option>
                                    @foreach($itemTypes as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                                @error('booking_item_type_id') <span class="text-danger error">{{ $message }}</span>@enderror
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
                                @if ($image_photo || $img_url)
                                Photo Preview:
                                <img src="{{ !empty($image_photo)?$image_photo->temporaryUrl():'assets/images/'.$img_url }}" width="220">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{__(" Booking date from")}}</label>
                                <input type="date" class="form-control @error('booking_date_from') is-invalid @enderror" wire:model="booking_date_from">
                                @error('booking_date_from') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{__(" Booking date to")}}</label>
                                <input type="date" class="form-control @error('booking_date_to') is-invalid @enderror" wire:model="booking_date_to">
                                @error('booking_date_to') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{__(" Number of people")}}</label>
                                <input type="number" class="form-control @error('number_of_people') is-invalid @enderror" wire:model="number_of_people">
                                @error('number_of_people') <span class="text-danger error">{{ $message }}</span>@enderror
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
                    <div class="card-footer ">
                        <button type="button" class="btn btn-secondary btn-round" data-bs-dismiss="modal">Close</button>
                        <button type="button" wire:click.prevent="createUpdate()" class="btn btn-primary btn-round">{{__('Save')}}</button>
                    </div>
                    <hr class="half-rule" />
                </form>
            </div>
        </div>
    </div>
</div>