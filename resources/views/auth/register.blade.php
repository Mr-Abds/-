<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Clean Blog - Start Bootstrap Theme</title>
    <link rel="icon" type="image/x-icon" href="../../app/resources/assets/favicon.ico" />
    <!-- Font Awesome icons (free version)
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
   --> <!-- Google fonts
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
        rel="stylesheet" type="text/css" />-->
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../resources/css/styles.css" rel="stylesheet" />
</head>

<body>
    <x-navigation :active="true">

    </x-navigation>
    <x-header image='../../app/resources/assets/img/home-bg.jpg'>
        التسجيل 
        <x-slot:page_discraption>انشاء حساب جديد</x-slot:page_discraption>
    </x-header>
   {{--  --}}
    <!-- Login Form-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7 text-center">
                    <form action="register" method="POST">
                        @csrf
                        <div class="mb-3">
                            <x-form-lable>الاسم الاول</x-form-lable>
                            <x-form-input  name="first_name" required />
                            
            @error('first_name')
            <p class="text-danger" >{{ $message }}</p>
            @enderror
                        </div>
                        <div class="mb-3">
                            <x-form-lable>اللقب</x-form-lable>
                            <x-form-input  name="last_name" required />
                            @error('last_name')
                            <p class="text-danger" >{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <x-form-lable>الايميل</x-form-lable>
                            <x-form-input type="email" id="email" name="email" required />
                            @error('email')
                            <p class="text-danger" >{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <x-form-lable>كلمة المرور</x-form-lable>
                            <x-form-input type="password" id="password" name="password" required />
                            @error('password')
                            <p class="text-danger" >{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <x-form-lable> تاكيد كلمة المرور</x-form-lable>
                            <x-form-input type="password" id="password" name="password_confirmation" required />
                        </div>
                        <x-primary-button type="submit" class="btn btn-primary">Login</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </article>

            </div>
        </div>
    </div>
    <!-- Footer-->
    <x-footer/>
