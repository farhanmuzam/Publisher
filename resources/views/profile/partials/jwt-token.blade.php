<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('JWT Token') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('This is your jwt token') }}
        </p>
    </header>

    <div class="mt-1 text-sm text-gray-600 break-words">
        {{ $jwtToken }}
    </div>
</section>
