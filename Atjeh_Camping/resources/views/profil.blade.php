@extends('layouts.master')
@section('main-content')
<link rel="stylesheet" href="{{ asset('asset/style.css') }}">

<div class="container mt-5">
  <div class="row justify-content-center">
    <!-- Profile Section -->
    <div class="col-lg-4 mb-4">
        <div class="card shadow border-0">
          <div class="card-header bg-gradient-primary py-4 d-flex justify-content-center align-items-center" >
            <figure
              class="rounded-circle avatar font-weight-bold border shadow"
              style="font-size: 60px; color:black; height: 150px; width: 150px; line-height: 150px; display: flex; align-items: center; justify-content: center;"
              data-initial="{{ Auth::user()->name[0] }}">
            </figure>
          </div>
          <div class="card-body text-center">
            <h5 class="font-weight-bold mb-1">{{ Auth::user()->name }}</h5>
            <p class="text-muted mb-2">{{ Auth::user()->email }}</p>
          </div>
        </div>
      </div>


    <!-- Account Section -->
    <div class="col-lg-8">
      <div class="card shadow border-0">
        <div class="card-header bg-primary text-white py-3">
          <h6 class="m-0 font-weight-bold">Account Settings</h6>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('profile.update') }}" autocomplete="off">
            @csrf
            @method('PUT')

            <h6 class="text-muted mb-4">User Information</h6>

            <div class="row">
              <!-- Name Field -->
              <div class="col-lg-6 mb-3">
                <label class="form-control-label" for="name">Name <span class="text-danger">*</span></label>
                <input
                  type="text"
                  id="name"
                  class="form-control"
                  name="name"
                  placeholder="Your Name"
                  value="{{ old('name', Auth::user()->name) }}"
                  required>
              </div>
              <!-- Email Field -->
              <div class="col-lg-6 mb-3">
                <label class="form-control-label" for="email">Email Address <span class="text-danger">*</span></label>
                <input
                  type="email"
                  id="email"
                  class="form-control"
                  name="email"
                  placeholder="example@example.com"
                  value="{{ old('email', Auth::user()->email) }}"
                  required>
              </div>
            </div>

            <div class="row">
              <!-- Phone Field -->
              <div class="col-lg-4 mb-3">
                <label class="form-control-label" for="handphone">Phone</label>
                <input
                  type="text"
                  id="handphone"
                  class="form-control"
                  name="no_hp"
                  placeholder="Phone Number"
                  value="{{ Auth::user()->no_hp }}"
                  required>
              </div>
              <!-- Address Field -->
              <div class="col-lg-8 mb-3">
                <label class="form-control-label" for="alamat">Address</label>
                <input
                  type="text"
                  id="alamat"
                  class="form-control"
                  name="alamat"
                  placeholder="Your Address"
                  value="{{ Auth::user()->alamat }}"
                  required>
              </div>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
              <button type="submit" class="btn btn-primary px-5">Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Logout Section -->
  <div class="text-center mt-4">
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button
        type="submit"
        class="btn btn-danger px-4 py-2 rounded-pill shadow-sm d-flex align-items-center justify-content-center gap-2">
        <i class="fas fa-sign-out-alt"></i>
        Log Out
      </button>
    </form>
  </div>
</div>
@endsection
