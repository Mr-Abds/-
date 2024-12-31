<x-page-head/>
    <x-navigation :active="true">

    </x-navigation>
    
    <header class="masthead" style="background-image: url('../../../app/resources/assets/img/about-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h1>Add New Post</h1>
                        <h2 class="subheading">Create your own content</h2>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Post Form-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required />
                        </div>
                        <div class="mb-3">
                            <label for="subtitle" class="form-label">Subtitle</label>
                            <input type="text" class="form-control" id="subtitle" name="subtitle" required />
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" id="content" name="body" rows="10" required></textarea>
                        </div>
                         <div class="mb-3">
                            <label for="subtitle" class="form-label">image</label>
                            <input type="file" class="form-control" id="subtitle" name="image" required />
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Post</button>
                    </form>
                </div>
            </div>
        </div>
    </article>
    <!-- Footer-->
    <x-footer/>