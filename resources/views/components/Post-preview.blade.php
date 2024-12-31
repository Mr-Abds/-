@props(['traget'])
<div class="post-preview">
    <a {{ $attributes }}>
        <h2 class="post-title">{{ $title }}</h2>
        <h3 class="post-subtitle">{{ $subtitle }}</h3>
    </a>
    <p class="post-meta">
        Posted by
       
            {{ $auther }}
    </p>
</div>