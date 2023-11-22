<div wire:ignore.self class="modal fade" id="createUpdateModal" tabindex="-1" role="dialog" aria-labelledby="postCreateModalLabel" aria-hidden="true">
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
                                <label for="exampleInputEmail1">{{__(" Package")}}</label>
                                <select class="form-control @error('package_id') is-invalid @enderror" id="package_id" wire:model="package_id">
                                    <option value="">{{__("Select Package")}}</option>
                                    @foreach($packages as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                                @error('package_id') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{__(" Booking Item")}}</label>
                                <select class="form-control @error('booking_item_id') is-invalid @enderror" id="booking_item_id" wire:model="booking_item_id">
                                    <option value="">{{__("Select Item")}}</option>
                                    @foreach($items as $cat)
                                    <option value="{{$cat->id}}">{{$cat->title}}</option>
                                    @endforeach
                                </select>
                                @error('booking_item_id') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{__(" Customer")}}</label>
                                <select class="form-control @error('customer_id') is-invalid @enderror" id="customer_id" wire:model="customer_id">
                                    <option value="">{{__("Select Customer")}}</option>
                                    @foreach($customers as $cat)
                                    <option value="{{$cat->id}}">{{$cat->first_name. ' '.$cat->last_name.', '.$cat->email}}</option>
                                    @endforeach
                                </select>
                                @error('customer_id') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{__(" Booking Date from")}}</label>
                                <input type="date" class="form-control @error('booking_date_from') is-invalid @enderror" wire:model="booking_date_from">
                                @error('booking_date_from') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{__(" Booking Date to")}}</label>
                                <input type="date" class="form-control @error('booking_date_to') is-invalid @enderror" wire:model="booking_date_to">
                                @error('booking_date_to') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{__(" Number of people")}}</label>
                                <input type="text" class="form-control @error('number_of_people') is-invalid @enderror" wire:model="number_of_people">
                                @error('number_of_people') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>                   
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="status">{{__(" Status")}}</label>
                                <select class="form-control" id="status" wire:model="status">
                                    <option value="" class="muted">{{__("Select Status")}}</option>
                                    <option value="2">Rejected</option>
                                    <option value="1">Approved</option>
                                    <option value="0">Pending</option>
                                </select>
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