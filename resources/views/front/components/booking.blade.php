<!-- Booking Start -->
<div class="container  booking mt-5 pb-1">
    <div class="container-fluid  pb-1">
        <form action="{{route('packages')}}" method="GET" enctype="application/x-www-form-urlencoded" class="bg-light shadow" style="padding: 30px;border-radius:20px">
            <div class="row align-items-center" style="min-height: 60px;">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3 mb-md-0">
                                <select class="custom-select px-4" name="name" style="height: 47px;">
                                    <option selected>Country</option>
                                    @foreach($country_options as $k => $v)
                                    <option>{{$v->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3 mb-md-0">
                                <select class="custom-select px-4" name="destination" style="height: 47px;">
                                    <option selected>Destination</option>
                                    @foreach($dest_options as $k => $v)
                                    <option>{{$v->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3 mb-md-0">
                                <div class="date" id="date1" data-target-input="nearest">
                                    <input type="text" class="form-control p-4 datetimepicker-input" name="departure_date" placeholder="Depart Date" data-target="#date1" data-toggle="datetimepicker" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3 mb-md-0">
                                <div class="date" id="date2" data-target-input="nearest">
                                    <input type="text" class="form-control p-4 datetimepicker-input" name="return_date" placeholder="Return Date" data-target="#date2" data-toggle="datetimepicker" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary btn-block" type="submit" style="height: 47px; margin-top: -2px;">Search</button>

                </div>
            </div>
        </form>
    </div>
</div>
<!-- Booking End -->