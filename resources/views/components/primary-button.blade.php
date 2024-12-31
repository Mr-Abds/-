<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primay']) }}>
    {{ $slot }}
</button>
