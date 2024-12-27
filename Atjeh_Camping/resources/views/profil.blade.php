@extends('layouts.master')
@section('main-content')
<link rel="stylesheet" href="{{ asset('asset/style.css') }}">

<div class="container ">
<div class="profile-section">
  <div class="d-flex align-items-center mb-4">
    <img src="{{ url('') }}/asset/img/logo atjeh camp.png" class="profile-img me-3" />
    <div>
      <h5 class="mb-0">Saifal Asna</h5>
      <p class="text-muted mb-0">saifalasna@gmail.com</p>
    </div>
    <button class="btn edit-btn btn-danger ms-auto">Edit</button>
  </div>
  <form>
    <div class="row g-3">
      <div class="col-md-6">
        <label for="fullName" class="form-label">Full Name</label>
        <input
          type="text"
          id="fullName"
          class="form-control"
          placeholder="Your First Name"
        />
      </div>
      <div class="col-md-6">
        <label for="nickName" class="form-label">Nick Name</label>
        <input
          type="text"
          id="nickName"
          class="form-control"
          placeholder="Your First Name"
        />
      </div>
      <div class="col-md-6">
        <label for="gender" class="form-label">Gender</label>
        <select id="gender" class="form-select">
          <option selected disabled>Choose...</option>
          <option>Male</option>
          <option>Female</option>
        </select>
      </div>
      <div class="col-md-6">
        <label for="country" class="form-label">Country</label>
        <input
          type="text"
          id="country"
          class="form-control"
          placeholder="Enter your country"
        />
      </div>
      <div class="col-md-6">
        <label for="language" class="form-label">Language</label>
        <select id="language" class="form-select">
          <option selected disabled>Choose...</option>
          <option>English</option>
          <option>Spanish</option>
          <option>French</option>
        </select>
      </div>
      <div class="col-md-6">
        <label for="timeZone" class="form-label">Time Zone</label>
        <input
          type="text"
          id="timeZone"
          class="form-control"
          placeholder="Enter time zone"
        />
      </div>
    </div>
    {{-- <div class="mt-4">
      <h6>My Email Address</h6>
      <p class="mb-1">
        <input type="checkbox" checked class="form-check-input me-2" />
        alexarawles@gmail.com
        <span class="text-muted ms-2">1 month ago</span>
      </p>
      <button type="button" class="btn btn-outline-primary btn-sm">
        + Add Email Address
      </button>
    </div> --}}
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