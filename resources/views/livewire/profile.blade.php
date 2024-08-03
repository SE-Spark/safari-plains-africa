<div>
    <div class="pagetitle">
        <h1>Profile</h1>
    </div>
    <section class="section dashboard">
        @include('partials.sectionSuccessError')
        <div class="row">
            <div class="col-xl-12">

                <div wire:ignore.self class="card">
                    <div class="card-body pt-3">
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link {{$selectedTab == 'overview'?'active':''}}" wire:click.prevent="selectTab()">Overview</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link {{$selectedTab == 'edit'?'active':''}}" wire:click.prevent="selectTab('edit')">Edit Profile</button>
                            </li>
                            <li class="nav-item d-none">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link {{$selectedTab == 'change'?'active':''}}" wire:click.prevent="selectTab('change')">Change Password</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade {{$selectedTab == 'overview'?' show active':''}} profile-overview" id="profile-overview">

                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-9 col-md-8">{{$full_name}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Safari</div>
                                    <div class="col-lg-9 col-md-8">{{$role}}</div>
                                </div>
                                {{--
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Country</div>
                                    <div class="col-lg-9 col-md-8">USA</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Address</div>
                                    <div class="col-lg-9 col-md-8">A108 Adam Street, New York, NY 535022</div>
                                </div>
                                --}}
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Phone</div>
                                    <div class="col-lg-9 col-md-8">{{$phone}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{$email}}</div>
                                </div>

                            </div>

                            <div class="tab-pane fade {{$selectedTab == 'edit'?' show active':''}} profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form>
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="{{$photo? asset('assets/images/'.$photo) : ($photoTemp? $photoTemp->temporaryUrl(): asset('assets/img/profile-img.jpg'))}}" alt="Profile">
                                            <div class="pt-2">
                                                <label for="uploadPhoto" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></label>
                                                <input type="file" class="d-none" wire:model="photoTemp" id="uploadPhoto">
                                                <!-- <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input wire:model='first_name' type="text" class="form-control @error('first_name') is-invalid @enderror" id="fullName" value="Kevin">
                                            @error('first_name') <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input wire:model='last_name' type="text" class="form-control @error('last_name') is-invalid @enderror" id="fullName" value="Anderson">
                                            @error('last_name') <span class="text-danger error">{{ $message }}</span>@enderror                                            
                                        </div>
                                    </div>
                                    {{--
                                    <div class="row mb-3">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="company" type="text" class="form-control" id="company" value="Lueilwitz, Wisoky and Leuschke">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="job" type="text" class="form-control" id="Job" value="Web Designer">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="country" type="text" class="form-control" id="Country" value="USA">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="address" type="text" class="form-control" id="Address" value="A108 Adam Street, New York, NY 535022">
                                        </div>
                                    </div>
                                    --}}
                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input wire:model='phone' type="text" class="form-control @error('phone') is-invalid @enderror" id="Phone" value="(436) 486-3538 x29071">
                                            @error('phone') <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input wire:model='email' type="email" class="form-control @error('email') is-invalid @enderror" id="Email" value="k.anderson@example.com">
                                            @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button wire:click.prevent='saveDetails()' class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>

                            <div class="tab-pane fade pt-3 d-none" id="profile-settings">

                                <!-- Settings Form -->
                                <form>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                                        <div class="col-md-8 col-lg-9">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="changesMade" checked>
                                                <label class="form-check-label" for="changesMade">
                                                    Changes made to your account
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="newProducts" checked>
                                                <label class="form-check-label" for="newProducts">
                                                    Information on new products and services
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="proOffers">
                                                <label class="form-check-label" for="proOffers">
                                                    Marketing and promo offers
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                                                <label class="form-check-label" for="securityNotify">
                                                    Security alerts
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End settings Form -->

                            </div>

                            <div class="tab-pane fade {{$selectedTab == 'change'?' show active':''}} pt-3" id="profile-change-password">
                                
                                <form>
                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input wire:model="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" id="currentPassword">
                                            @error('current_password') <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input wire:model="password" type="password" class="form-control @error('password') is-invalid @enderror" id="newPassword">
                                            @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input wire:model="password_confirmation" type="password" class="form-control  @error('password_confirmation') is-invalid @enderror" id="renewPassword">
                                            @error('password_confirmation') <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button wire:click.prevent="updatePasswords()" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form>
                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
</div>