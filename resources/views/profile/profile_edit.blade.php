@extends('layouts.app')

@section('content')



<style>
.btn-infos {
	color: #fff;
	background-color: #e0006c;
	border-color: #e0006c;
  font-sixe:20px;
	padding: 10px;
}
.btn-infos:hover{
  color: #111;
}
</style>

<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-4" style="padding:25px; border:5px solid #eee">
        <div class="tonu" style="padding:5px; background-color: #e0006c;">
          <h4 class="text-center">Profile Edit</h4>
        </div>

@if (session('edit'))
  <div class="alert alert-success">
      {{session('edit')}}
  </div>
@endif
@if (session('time'))
  <div class="alert alert-danger">
      {{session('time')}}
  </div>
@endif








        <form method="post" action="{{ url('profile_edit/post') }}">
          @csrf


          <div class="form-group">
          <label for="">Name</label>
					@error ('name')
						<div class="alert alert-danger">
					      {{ $message }}

						</div>
					@enderror



            <input type="hidden" name="userid" value="{{ $user_profile->id }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <input type="text" name="name" value="{{ $user_profile->name }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

					</div>

                <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
      <div class="col-lg-4" style="padding:25px; border:5px solid #eee">
        <div class="tonu" style="padding:5px; background-color: #e0006c;">
          <h4 class="text-center">Deshbord Photo Uplode</h4>
        </div>


        <form method="post" action="{{ url('profile_photo/post') }}" enctype="multipart/form-data">
          @csrf


          <div class="form-group">
						@if (session('photo_SU'))
							 <div class="alert alert-success">
							 	        {{ session('photo_SU') }}
							 </div>
						@endif
						@if (session('photo_empty'))
							 <div class="alert alert-success">
							 	        {{ session('photo_empty') }}
							 </div>
						@endif
						@error ('photo')
							<div class="alert alert-danger">
									{{ $message }}

							</div>
						@enderror
						
          <label for="">Please Enter Your Profile Photo</label>


            <input  type="file" name="photo"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" onchange="readURL(this);">
            <img class="hidden" id="tenant_photo_viewer" scr="#" alt="your image"/>
						<style media="screen">
							.hidden{
									display:none;
							}

						</style>
						<script>
						function readURL(input) {
						if(input.files && input.files[0]) {
						var reader = new FileReader();
						reader.onload = function (e) {
						$('#tenant_photo_viewer').attr('src',e.target.result).width(150).hight(195);
						};
						$('#tenant_photo_viewer').removeClass('hidden');
						reader.readAsDataURL(input.files[0]);

						}
						}

						</script>
					</div>

                <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
		<div class="col-lg-4">
		 <div class="card">
			 <div class="card-body">

					<div class="aler text-center" style="padding:5px; border:5px solid #eee; background-color: #e0006c;">
						<h3>Password Change</h3>
					</div>
					@if (session('change_success'))
						 <div class="alert alert-success">
								 {{ session('change_success') }}
						 </div>
					@endif
					@if (session('on_math_pass'))
						 <div class="alert alert-danger">
								 {{ session('on_math_pass') }}
						 </div>
					@endif
					@if (session('old_pass_math'))
						 <div class="alert alert-danger">
								 {{ session('old_pass_math') }}
						 </div>
					@endif
					<form method="post" action="{{ url('password/change/post') }}">
						@csrf
						 <div class="mb-3">
							 <label  class="form-label ">Please Enter Old Password</label>
							 @error ('old_password')
								 <div class="alert alert-danger">
										{{ $message }}
								 </div>
							@enderror
							<i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
							<style>
							.far {
left:130px;
cursor: pointer;
margin-top: 0px;
position: relative;
top: 36px;
}
							</style>
							<script>
							$(document).ready(function() {
								const togglePassword = document.querySelector('#togglePassword');
								  const password = document.querySelector('#id_password');

								  togglePassword.addEventListener('click', function (e) {
								    // toggle the type attribute
								    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
								    password.setAttribute('type', type);
								    // toggle the eye slash icon
								    this.classList.toggle('fa-eye-slash');
								});
							} );

							</script>

 <input  class="form-control"  placeholder="Old Password" value="{{ old('old_password')}}" type="password" name="old_password" autocomplete="current-password" required="" id="id_password">
										</div>
						 <div class="mb-3">
							 <label  class="form-label ">Please Enter confirm Password</label>
							 @error ('password')
									<div class="alert alert-danger">
										 {{ $message }}
								 </div>
							 @enderror

								 <input type="password" name="password"  class="form-control"  placeholder="New Password" value="{{ old('password')}}">
										</div>
						 <div class="mb-3">
							 <label  class="form-label ">Please Enter Old Password</label>
							 @error ('password_confirmation')
									<div class="alert alert-danger">
										 {{ $message }}
								</div>
							 @enderror
								 <input type="password" name="password_confirmation"  class="form-control"  placeholder="confirm Password">
										</div>
								<button type="submit" class="btn btn-primary">Submit</button>
					 </form>
			 </div>
	 </div>
	</div>

  </div>

</section>



@endsection
