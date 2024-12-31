<x-page-head/>
    <x-navigation :active="true">

    </x-navigation>


    <header class="masthead" style="background-image: url('/Blog/storage/app/public/{{$post->image}}')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h1>{{ $post->title }}</h1>
                        <h2 class="subheading">{{ $post->subtitle }}</h2>
                        <span class="meta">
                            Posted by
                            <a href="#!">{{ $post->user->firts_name }}</a>
                            on August 24, 2023
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Post Content-->
    <article class="mb-4">
        <div class="container  px-lg-12">
            <div class="row gx-4 gx-lg-12 justify-content-center">
                <div class="col-md-12 col-lg-12 col-xl-7">
                    <p> {{ $post->body }}</p>

                </div>

            </div>
            @auth
            <?php 
            $style='';
            $likes=DB::select('select * from likes where user_id = ? and post_id=?', [Auth::user()->id,$post->id]) ;
            
            if (count($likes)==1){
                $style="background-color: yellow;border-radius: 20px; transition: background-color 0.3s;";
            }
            ?>
                 <button onclick="toggleLike()" class="btn w-2 " id="button-like" style="{{$style}}">
                <div class="likes-section mt-4">
                    <span id="likes-count">{{ count($post->likes)}}</span> 👍
                </div>
            </button>
@if (Auth::user()->id==$post->user->id)
    <a class="btn btn-primary" href="{{ $post->id }}/edit">تعديل</a>
    <button form="delete-form" type="submit" class="btn btn-danger">الحذف</button>
@endif
<form action="{{$post->id}}" method="post" id="delete-form" class="hidden">
    @csrf
    @method('DELETE')
</form>
            @endauth
         @guest
              <div class="likes-section mt-4">
                    <span id="likes-count">{{ count($post->likes)}}</span> 👍
                </div>
         @endguest
        </div>
    </article>


   
    <!-- Footer-->
    <x-footer />

    @auth
      <script>
        let isLiked = false;
  const likesCountElement = document.getElementById('likes-count');
        async function toggleLike() {
          
            let currentLikes = parseInt(likesCountElement.innerText);

            // Toggle the like status
            if (isLiked) {
               document.getElementById('button-like').style="background-color: white;border-radius: 20px; transition: background-color 0.3s;";

                await sendLikeRequest('decrease');
            } else {
                document.getElementById('button-like').style="background-color: yellow;border-radius: 20px; transition: background-color 0.3s;";
                await sendLikeRequest('increase');
            }

            // Update the UI
           
            isLiked = !isLiked; // Toggle the state
        }

        async function sendLikeRequest(action) {
            try {
                const response = await fetch('/Blog/public/like?action=' + action +
                '&postId={{ $post->id }}'); // Update this URL to your server endpoint
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                const data = await response.json();
                 likesCountElement.innerText = data[0];
                console.log(data[0]); // Log the response for debugging
            } catch (error) {
                console.error('Error:', error);
            }
        }
    </script>

    @endauth
