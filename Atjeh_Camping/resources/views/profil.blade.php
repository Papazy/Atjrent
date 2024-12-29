@extends('layouts.master')
@section('main-content')
<link rel="stylesheet" href="{{ asset('asset/style.css') }}">


<div class="container ">
<!-- Page Heading -->

<div class="row mt-4">

    <div class="col-lg-4 order-lg-2 ">

        <div class="card shadow mb-4">
            <div class="card-profile-image mt-4">
                <figure class="rounded-circle avatar font-weight-bold border" style="font-size: 60px; color:black; height: 180px; width: 180px;" data-initial="{{ Auth::user()->name[0] }}"></figure>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <h5 class="font-weight-bold">{{  Auth::user()->name }}</h5>
                            {{-- <p>{{ Auth::user()->name }}</p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-lg-8 order-lg-1">

        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">My Account</h6>
            </div>

            <div class="card-body">

                <form method="POST" action="{{  route('profile.update') }}" autocomplete="off">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <input type="hidden" name="_method" value="PUT">

                    <h6 class="heading-small text-muted mb-4">User information</h6>

                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="name">Name<span class="small text-danger">*</span></label>
                                    <input type="text" id="name" class="form-control" name="name" placeholder="Name" value="{{ old('name', Auth::user()->name) }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="email">Email address<span class="small text-danger">*</span></label>
                                    <input type="email" id="email" class="form-control" name="email" placeholder="example@example.com" value="{{ old('email', Auth::user()->email) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="current_password">Handphone</label>
                                    <input type="text" id="current_password" class="form-control" name="no_hp" placeholder="Handphone" value="{{ Auth::user()->no_hp }}" required>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="new_password">Alamat</label>
                                    <input type="text" id="new_password" class="form-control" name="alamat" value="{{ Auth::user()->alamat }}" placeholder="Alamat" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>

</div>
  </form>
  <form method="POST" action="{{ route('logout') }}" class="text-center my-4">
    @csrf
    <button type="submit" class="btn btn-warning px-4 py-2 fw-bold rounded-pill shadow-sm d-flex align-items-center justify-content-center gap-2">
      <i class="fas fa-sign-out-alt"></i>
      {{ __('Log Out') }}
    </button>
  </form>

</div>
</div>

@endsection
