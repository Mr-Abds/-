<x-page-head/>
    <x-navigation :active="true">

    </x-navigation>
    <!-- Page Header-->
    <x-header image='../../app/resources/assets/img/home-bg.jpg'>
        مدونة القطن

        <x-slot:page_discraption>كل مايهمك عن مدينة القطن</x-slot:page_discraption>
    </x-header>
    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
              @foreach ( $posts as $post )
                   <x-Post-preview href="posts/{{ $post->id }}">
                   <x-slot:title>{{ $post->title }}</x-slot:title>
                   <x-slot:subtitle>{{ $post->subtitle }}</x-slot:subtitle>
                   <x-slot:auther>{{ $post->user->first_name }}</x-slot:auther>
                </x-Post-preview>
              @endforeach  
               
                <!-- Divider-->
               {{--  <hr class="my-4" />
                <!-- Post preview-->
                <div class="post-preview">
                    <a href="post.html">
                        <h2 class="post-title">Failure is not an option</h2>
                        <h3 class="post-subtitle">Many say exploration is part of our destiny, but it’s actually our
                            duty to future generations.</h3>
                    </a>
                    <p class="post-meta">
                        Posted by
                        <a href="#!">Start Bootstrap</a>
                        on July 8, 2023
                    </p>
                </div>
                <!-- Divider-->
                <hr class="my-4" /> --}}
                <!-- Pager-->
                {{ $posts->links() }}
            </div>
        </div>
    </div>
    <!-- Footer-->
    <x-footer/>
