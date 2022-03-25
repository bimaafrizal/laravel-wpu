@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-5">
        <main class="form-registration">
            <h1 class="h3 mb-3 fw-normal">Registration Form</h1>
            <form>
              <div class="form-floating text-center">
                <input type="text" class="form-control rounded-top" name="name" id="name" placeholder="Name">
                <label for="name">Name</label>
              </div>
              <div class="form-floating text-center">
                <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                <label for="username">Username</label>
              </div>
              <div class="form-floating text-center">
                <input type="email" class="form-control" name="email" id="email" placeholder="email@example.com">
                <label for="email">Email</label>
              </div>
              <div class="form-floating">
                <input type="password" class="form-control rounded-bottom" id="password" placeholder="Password">
                <label for="password">Password</label>
              </div>
              <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
            </form>
            <small class="d-block text-center mt-3">
                Allredy Register? <a href="/register">Login Now!</a>
            </small>
          </main>
    </div>
</div>
    
@endsection