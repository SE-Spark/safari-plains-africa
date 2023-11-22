<form>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>{{__(" Name")}}</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name" wire:change="validating">
                @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>{{__(" Description")}}</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" wire:model="description" wire:change="validating">
                @error('description') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="exampleInputEmail1">{{__(" Status")}}</label>
                <select class="form-control @error('status') is-invalid @enderror" name="status" id="status" wire:model="status" wire:change="validating">
                    <option Selected>select status</option>
                    <option value="1">Active</option>
                    <option value="0">InActive</option>
                </select>
                @error('status') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>
    <div class="card-footer ">
        <button type="button" wire:click="back" class="btn btn-secondary btn-round">Back</button>
        @if($selected_id)
        <button type="button" wire:click.prevent="update()" class="btn btn-primary btn-round float-right">{{__('Save Changes')}}</button>
        @else
        <button type="button" wire:click.prevent="savecreate()" class="btn btn-primary btn-round float-right">{{__('Save & Create New')}}</button>
        <button type="button" wire:click.prevent="save()" class="btn btn-primary btn-round float-right">{{__('Save & Close')}}</button>
        @endif
    </div>
    <hr class="half-rule" />
</form>