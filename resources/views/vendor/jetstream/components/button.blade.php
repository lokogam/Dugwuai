<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-info text-uppercase']) }}>
    {{ $slot }}
</button>
