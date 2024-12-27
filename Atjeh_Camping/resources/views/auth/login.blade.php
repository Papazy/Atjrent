@extends('layouts.auth')
@section('main-content')
<div class="header-text mb-5">
    <h1>Sign In </h1>
    <p class="text-muted">Please login to continue your account.</p>
</div>
@if ($errors->any())
<div class="alert alert-sm alert-danger border-left-danger" role="alert">
<ul class="pl-4 my-2">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
</div>
@endif
                                    <!-- form    -->
<form method="POST" action="{{ route('login') }}">
@csrf
    <div class="input-group mb-4">
        <input type="email" name="email" 
               class="form-control form-control-lg bg-light fs-6" 
               placeholder="Email">
   </div>
   
   <div class="input-group mb-2">
        <input type="password" name="password" 
               class="form-control form-control-lg bg-light fs-6" 
               placeholder="Password">
   </div>
   <div class="input-group mb-5 d-flex justify-content-between "></div>
               <div class="input-group mb-2 ">
                     <button class="btn btn-lg btn-warning w-100 shadow fs-6">Sign In</button>
               </div>
</form>
@endsection