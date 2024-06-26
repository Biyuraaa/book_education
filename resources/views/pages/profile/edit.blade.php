<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet">
    <style>
        .profile-pic {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            display: block;
            margin: 0 auto 20px;
        }
    </style>
</head>
<body>
    <!-- Navigation-->
    @include('components.navbar')
    
    <div class="text-center text-black my-2">
        <h1 class="display-4 fw-bolder">Edit Profile</h1>
        <p class="lead fw-normal text-black-50 mb-0">Update your personal information (If you don't want to change your profile information, then type your current ones)</p>
    </div>

    <!-- Edit Profile Form -->
    <section class="py-5">
        <div class="container px-4 px-lg-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('profile.update')}}" id="profileForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Profile Picture -->
                        <div class="mb-3 text-center">
                            <img src="{{ Auth::user()->image ? asset('assets/images/' . Auth::user()->image) : 'https://via.placeholder.com/150' }}" alt="Profile Picture" class="profile-pic" id="profilePic">
                            <input type="file" class="form-control mt-3" name="image" id="profilePicInput" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{Auth::user()->email}}" placeholder="Enter your email" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="fname" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="fname" id="fname" value="{{Auth::user()->fname}}" placeholder="Enter your first name">
                        </div>
                        <div class="mb-3">
                            <label for="lname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="lname" id="lname"value="{{Auth::user()->lname}}" placeholder="Enter your last name">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username" value="{{Auth::user()->username}}" placeholder="Enter your username">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" id="address" value="{{Auth::user()->address}}" placeholder="Enter your address">
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="{{Auth::user()->phone}}" placeholder="Enter your phone number">
                        </div>
                        <div class="mb-3">
                            <label for="date_of_birth" class="form-label" >Date of Birth</label>
                            <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="{{Auth::user()->date_of_birth}}" placeholder="Enter your date of birth">
                        </div>                        

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script>
        document.getElementById('profilePicInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profilePic').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>
