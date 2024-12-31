<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container px-2 px-lg-2">
        <a class="navbar-brand" href="index.html">مدونة القطن</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            القائمة
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse mr-10 pr-10" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-6 py-lg-0">
               <x-nav-link href="/Blog/public/index.php" :active="false">الرئيسية</x-nav-link>
               <x-nav-link  href="/Blog/public/about" :active="true">من نحن</x-nav-link>
                    <x-nav-link  href="/Blog/public/contact" :active="true">تواصل معنا</x-nav-link>
                    @guest
                        <x-nav-link  href="/Blog/public/register" :active="true">التسجيل </x-nav-link>
                    <x-nav-link  href="/Blog/public/login" :active="true"> تسجيل الدخول</x-nav-link>
                    @endguest
                    @auth
                    <x-nav-link  href="/Blog/public/posts/create" :active="true"> اضافة مقال</x-nav-link>
                   <form action="/Blog/public/logout" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-primary-button class=" " style="padding-bottom: 1px;padding-top: 23px;color:white;">الخروج</x-primary-button>
                   </form>
                    @endauth


                </ul>
        </div>
    </div>
</nav>
