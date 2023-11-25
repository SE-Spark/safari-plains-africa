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
                                <label>{{__(" Name")}}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name">
                                @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
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
                                <label for="exampleInputEmail1">{{__(" Destination")}}</label>
                                <select class="form-control @error('destinationId') is-invalid @enderror" id="destinationId" wire:model="destinationId">
                                    <option value="">{{__("Select Destination")}}</option>
                                    @foreach($destinations as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                                @error('destinationId') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{__(" Number Of People")}}</label>
                                <input type="number" class="form-control @error('number_of_people') is-invalid @enderror" wire:model="number_of_people">
                                @error('number_of_people') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{__(" Price")}}</label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror" wire:model="price">
                                @error('price') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{__(" Date From")}}</label>
                                <input type="date" class="form-control @error('start_date') is-invalid @enderror" wire:model="start_date">
                                @error('start_date') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{__(" Date To")}}</label>
                                <input type="date" class="form-control @error('end_date') is-invalid @enderror" wire:model="end_date">
                                @error('end_date') <span class="text-danger error">{{ $message }}</span>@enderror
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
                        <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary btn-round" data-bs-dismiss="modal">Close</button>
                        <button type="button" wire:click.prevent="createUpdate()" class="btn btn-primary btn-round">{{__('Save')}}</button>
                    </div>
                    <hr class="half-rule" />
                </form>
            </div>
        </div>
    </div>
</div>