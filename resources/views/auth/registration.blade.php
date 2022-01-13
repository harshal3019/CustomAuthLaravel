<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Custom Registration</title>
    <!-- Font Awesome -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
rel="stylesheet"
/>
<!-- Google Fonts -->
<link
href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
rel="stylesheet"
/>
<!-- MDB -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.css"
rel="stylesheet"
/>

</head>
<body>
    <section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
          <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                <div class="card" style="border-radius: 15px;">
                  <div class="card-body p-5">
                    <h2 class="text-uppercase text-center mb-5">Create an account</h2>
      
                    <form action="{{route('register-user')}}" method="post">
                      @if(Session::has('success'))
                      <div class="alert alert-success">{{Session::get('success')}}</div>
                      @endif

                      @if(Session::has('fail'))
                      <div class="alert alert-success">{{Session::get('fail')}}</div>
                      @endif

                      @csrf
                      <div class="form-outline mb-4">
                        <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="full_name" value="{{old('name')}}"/>
                        <label class="form-label" for="form3Example1cg">Full Name</label>
                      </div>
                      <span class="text-danger">@error('full_name')
                        {{$message}}
                    @enderror</span>
      
                      <div class="form-outline mb-4">
                        <input type="email" id="form3Example3cg" class="form-control form-control-lg" name="email" value="{{old('email')}}"/>
                        <label class="form-label" for="form3Example3cg">Email</label> 
                      </div>
                      <span class="text-danger">@error('email')
                        {{$message}}
                      @enderror</span>
      
                      <div class="form-outline mb-4">
                        <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="password" value="{{old('password')}}"/>
                        <label class="form-label" for="form3Example4cg">Password</label>
                      </div>
                      <span class="text-danger">@error('password')
                        {{$message}}
                      @enderror</span>
      
                      {{-- <div class="form-outline mb-4">
                        <input type="password" id="form3Example4cdg" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                      </div>
      
                      <div class="form-check d-flex justify-content-center mb-5">
                        <input
                          class="form-check-input me-2"
                          type="checkbox"
                          value=""
                          id="form2Example3cg"
                        />
                        <label class="form-check-label" for="form2Example3g">
                          I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                        </label>
                      </div> --}}
      
                      <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                      </div>
      
                    </form>
                    <div>
                    <h5 style="text-align: center">Already Register <a href="{{route('custom.login')}}">Login Here!</a></h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
       
</body>
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.js"></script>
</html>