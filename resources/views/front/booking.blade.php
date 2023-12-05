<div>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center pb-4 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">My Booking</h6>
                <h1 class="mb-5">All </h1>
            </div>
            <div class="row g-4 justify-content-center">
                @if(!empty($bookings) && $bookings->count()>0)
                 @foreach($bookings as $k => $booking)
                 @php
                 $v = $booking->package;
                 $dest = $v->destinations[0];
                 if($dest->status===0){
                 continue;
                 }
                 $img_url = $dest->image_url;
                 @endphp
                 <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                     <div class="package-item">
                         <div class="position-relative d-block overflow-hidden">
                             <img class="img-fluid" src="{{\App\Helpers\HP::getImgUrl($v->destinations[0]->image_url)}}" alt="">
                            <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2"><i class="fa fa-map-marker-alt text-primary me-2"></i> {{$v->destinations[0]->name}}</div>
                         </div>
                         <div class="d-flex border-bottom">
                             <small class="flex-fill text-center border-end py-2"><i class="fa fa-money-bill-alt text-primary me-2"></i>{{$v->name}}</small>
                             <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt text-primary me-2"></i>{{$v->number_of_days}} Days</small>
                             <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>{{$v->number_of_people}} Person</small>
                         </div>
                         <div class="text-center p-4">
                             <h3 class="mb-0">{{number_format($v->price).' KES'}}</h3>
                             <div class="mb-3">
                                 <small class="fa fa-star text-primary"></small>
                                 <small class="fa fa-star text-primary"></small>
                                 <small class="fa fa-star text-primary"></small>
                                 <small class="fa fa-star text-primary"></small>
                                 <small class="fa fa-star text-primary"></small>
                             </div>
                             <div class="d-flex justify-content-center mb-2">
                                 <a href="javascript:;" class="btn btn-sm btn-{{($v->status == 0?'warning': ($v->status == 1?'success':'danger'))}} px-3" style="border-radius: 30px 30px 30px 30px;">{{($v->status == 0?'Pending': ($v->status == 1?'Approved':'Rejected'))}}</a>
                             </div>
                         </div>
                     </div>
                 </div>
                 @endforeach
                 @else
                 You haven't secured your booking yet.
                 @endif
             </div>
        </div>
    </div>
</div>