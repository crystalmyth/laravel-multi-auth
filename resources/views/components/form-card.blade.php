<div class="grid grid-cols-10">
    <!-- Session Status -->
    <div {{ $attributes }}>
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        {{ $slot }}
    </div>
</div>
