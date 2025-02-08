<div>
    <div class="pagetitle">
        <h1>Itenary</h1>
    </div>
    <section class="section dashboard">
        @include('partials.sectionSuccessError')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{$modalTitle}}
                            <span class="text-end"></span>
                        </h5>
                        <form>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{__(" Name")}}</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            wire:model="name" placeholder="eg. The Ultimate Kenyan Safari">
                                        @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{__(" Tag")}}</label>
                                        <input type="text" class="form-control @error('tag') is-invalid @enderror"
                                            wire:model="tag"
                                            placeholder="eg. Explore the breathtaking landscapes and wildlife of Kenya.">
                                        @error('tag') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{ __("Default Image") }}</label>
                                        <input type="file"
                                            class="form-control @error('image_photos.*') is-invalid @enderror"
                                            wire:model="image_photos" multiple>

                                        @error('image_photos.*')
                                            <span class="text-danger error">{{ $message }}</span>
                                        @enderror

                                        @if ($image_photos)
                                            <div class="mt-2">
                                                <strong>Photo Preview:</strong>
                                                <div class="d-flex flex-wrap">
                                                    @foreach ($image_photos as $photo)
                                                        <div class="p-2">
                                                            <img src="{{ $photo->temporaryUrl() }}" width="220"
                                                                class="img-thumbnail">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @elseif ($image_urls)
                                            <div class="mt-2">
                                                <strong>Photo Preview:</strong>
                                                <div class="d-flex flex-wrap">
                                                    @foreach ($image_urls as $image_url)
                                                        <div class="p-2">
                                                            <img src="{{ '/assets/images/' . $image_url }}" width="220"
                                                                class="img-thumbnail">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- days and destinations section-->
                            <!-- days section -->
                            <div class="row">
                                @foreach ($dest_days as $index => $item)
                                    <div class="col-12">
                                        <fieldset
                                            style="border: 1px solid #ccc; margin:10px 0 10px 0;padding: 10px; border-radius: 5px;">
                                            <legend>{{ __("Section") }} {{ $index + 1 }}</legend>
                                            <div class="form-group">
                                                <label>{{ __("Day") }}</label>
                                                <input type="text" class="form-control"
                                                    wire:model="dest_days.{{ $index }}.days" placeholder="eg. Days 1–2">
                                            </div>
                                            <div class="form-group">
                                                <label>{{ __("Location") }}</label>
                                                <input type="text" class="form-control"
                                                    wire:model="dest_days.{{ $index }}.location"
                                                    placeholder="eg. Overnight in Nairobi">
                                            </div>
                                            <div class="form-group">
                                                <label>{{ __("Description") }}</label>
                                                <textarea class="form-control"
                                                    wire:model="dest_days.{{ $index }}.description"
                                                    placeholder="eg. Upon arrival at Jomo Kenyatta International Airport, enjoy a seamless transfer to Palacina Residential Hotel..."></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>{{ __("Image") }}</label>
                                                <input type="file" class="form-control"
                                                    wire:model="dest_days.{{ $index }}.image_temp">
                                            </div>
                                            @if (isset($dest_days[$index]['image_temp']) && $dest_days[$index]['image_temp'])
                                                <div class="mt-2">
                                                    <strong>Photo Preview:</strong>
                                                    <div class="d-flex flex-wrap">
                                                            <div class="p-2">
                                                                <img src="{{ $dest_days[$index]['image_temp']->temporaryUrl() }}" width="220"
                                                                    class="img-thumbnail">
                                                            </div>
                                                    </div>
                                                </div>
                                            @elseif ($dest_days[$index]['image'])
                                                <div class="mt-2">
                                                    <strong>Photo Preview:</strong>
                                                    <div class="d-flex flex-wrap">
                                                            <div class="p-2">
                                                                <img src="{{ '/assets/images/' . $dest_days[$index]['image'] }}" width="220"
                                                                    class="img-thumbnail">
                                                            </div>
                                                    </div>
                                                </div>
                                            @endif
                                            <h5 class="mt-1">Where To Stay</h5 class="mt-1">
                                            <div class="form-group">
                                                <label>{{ __("Stay Location") }}</label>
                                                <input type="text" class="form-control"
                                                    wire:model="dest_days.{{ $index }}.stay_location"
                                                    placeholder="eg. Nairobi">
                                            </div>
                                            <div class="form-group">
                                                <label>{{ __("Stay Location Image") }}</label>
                                                <input type="file" class="form-control"
                                                    wire:model="dest_days.{{ $index }}.stay_loc_image_temp"
                                                    placeholder="eg. Palacina The Residence & The Suites">
                                            </div>                                            
                                            @if (isset($dest_days[$index]['stay_loc_image_temp']) && $dest_days[$index]['stay_loc_image_temp'])
                                                <div class="mt-2">
                                                    <strong>Photo Preview:</strong>
                                                    <div class="d-flex flex-wrap">
                                                            <div class="p-2">
                                                                <img src="{{ $dest_days[$index]['stay_loc_image_temp']->temporaryUrl() }}" width="220"
                                                                    class="img-thumbnail">
                                                            </div>
                                                    </div>
                                                </div>
                                            @elseif ($dest_days[$index]['stay_loc_image'])
                                                <div class="mt-2">
                                                    <strong>Photo Preview:</strong>
                                                    <div class="d-flex flex-wrap">
                                                            <div class="p-2">
                                                                <img src="{{ '/assets/images/' . $dest_days[$index]['stay_loc_image'] }}" width="220"
                                                                    class="img-thumbnail">
                                                            </div>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="form-group">
                                                <label>{{ __("Stay Name") }}</label>
                                                <input type="text" class="form-control"
                                                    wire:model="dest_days.{{ $index }}.stay_name"
                                                    placeholder="Palacina The Residence & The Suites">
                                            </div>
                                            <div class="form-group">
                                                <label>{{ __("Stay Description") }}</label>
                                                <textarea class="form-control"
                                                    wire:model="dest_days.{{ $index }}.stay_description"
                                                    placeholder="eg. Centrally located in the leafy State House area of Nairobi..."></textarea>
                                            </div>
                                            <button type="button" wire:click.prevent="removeDestDay({{ $index }})"
                                                class="btn btn-danger mt-1">Remove This Section</button>
                                        </fieldset>
                                    </div>
                                @endforeach
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="button" wire:click.prevent="addDestDay()" class="btn btn-success">Add
                                        More Days</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{__(" Iternary Details")}}</label>
                                        <div wire:ignore>
                                            <textarea wire:model="iternary_details"
                                                class="tinymce-editors min-h-fit h-48 d-none" name="iternary_details"
                                                id="iternary_details"></textarea>
                                        </div>
                                        @error('iternary_details') <span
                                        class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{__(" Included and Excluded")}}</label>
                                        <div wire:ignore>
                                            <textarea wire:model="haves_and_not_haves"
                                                class="tinymce-editors min-h-fit h-48 d-none" name="haves_and_not_haves"
                                                id="haves_and_not_haves"></textarea>
                                        </div>
                                        @error('haves_and_not_haves') <span
                                        class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <h5 class="mt-1">Trip Highlights </h5>
                            <div class="row">
                                @foreach($trip_highlights as $index => $item)
                                    <div class="col-12">
                                        <fieldset
                                            style="border: 1px solid #ccc; margin:10px 0 10px 0;padding: 10px; border-radius: 5px;">
                                            <legend>{{ __("Section") }} {{ $index + 1 }}</legend>
                                            <div class="form-group">
                                                <label>{{ __("Title") }}</label>
                                                <input type="text" class="form-control"
                                                    wire:model="trip_highlights.{{ $index }}.name"
                                                    placeholder="eg. The Ultimate Nairobi Experience">
                                            </div>
                                            <button type="button" wire:click.prevent="removeTripHighlight({{ $index }})"
                                                class="btn btn-danger mt-1">Remove This Section</button>
                                        </fieldset>
                                    </div>
                                @endforeach
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="button" wire:click.prevent="addTripHighlight()"
                                        class="btn btn-success">Add Trip Highlight</button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{__(" Group")}}</label>
                                        <select class="form-control @error('group_id') is-invalid @enderror"
                                            id="group_id" wire:model="group_id">
                                            <option value="">{{__("Select Group")}}</option>
                                            @foreach($groups as $cat)
                                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('group_id') <span
                                        class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{__(" Number Of Days")}}</label>
                                        <input type="number"
                                            class="form-control @error('number_of_days') is-invalid @enderror"
                                            wire:model="number_of_days">
                                        @error('number_of_days') <span
                                        class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{__(" Price")}}</label>
                                        <input type="text" class="form-control @error('price') is-invalid @enderror"
                                            wire:model="price">
                                        @error('price') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{__(" Date From")}}</label>
                                        <input type="date"
                                            class="form-control @error('start_date') is-invalid @enderror"
                                            wire:model="start_date" name="start_date">
                                        @error('start_date') <span class="text-danger error">{{ $message
                                        }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{__(" Date To")}}</label>
                                        <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                                            wire:model="end_date">
                                        @error('end_date') <span class="text-danger error">{{ $message
                                        }}</span>@enderror
                                    </div>
                                </div>
                            </div> --}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{__(" Status")}}</label>
                                        <select class="form-control @error('status') is-invalid @enderror" name="status"
                                            id="status" wire:model="status">
                                            <option value="" class="muted">{{__("Select Status")}}</option>
                                            <option value="1" selected>Active</option>
                                            <option value="0">InActive</option>
                                        </select>
                                        @error('status') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-between">
                                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary btn-round"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="button" wire:click.prevent="createUpdate()"
                                    class="btn btn-primary btn-round">{{__('Save')}}</button>
                            </div>
                            <hr class="half-rule" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@push('scripts')


    <script data-navigate-track>
        document.addEventListener('wire:navigated', () => {
        });
        document.addEventListener('livewire:initialized', () => {

            $('#destinationId').select2();
            $('#destinationId').on('change', function () {
                @this.set('destinationId', $(this).val());
            })
        });

        tinymce.init({
            selector: 'textarea.tinymce-editors',
            plugins: 'preview importcss autolink autosave save directionality visualblocks visualchars fullscreen link table charmap anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
            menubar: 'insert format',
            toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview | link anchor | ltr rtl',
            toolbar_sticky: true,
            autosave_ask_before_unload: true,
            autosave_interval: '30s',
            autosave_prefix: '{path}{query}-{id}-',
            autosave_restore_when_empty: false,
            autosave_retention: '2m',
            image_advtab: true,
            importcss_append: true,
            height: 300,
            image_caption: true,
            quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quicktable',
            noneditable_class: 'mceNonEditable',
            toolbar_mode: 'sliding',
            contextmenu: 'link table',
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });
                editor.on('change', function (e) {
                    // @this.set('description', editor.getContent());
                    if (this.id === 'description') {
                        @this.set('description', editor.getContent());
                    } else if (this.id === 'summary') {
                        @this.set('summary', editor.getContent());
                    } else if (this.id === 'iternary_details') {
                        @this.set('iternary_details', editor.getContent());
                    } else if (this.id === 'haves_and_not_haves') {
                        @this.set('haves_and_not_haves', editor.getContent());
                    }
                });
            }
        });
        $('#description').removeClass('d-none');
    </script>
@endpush