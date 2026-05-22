@if(config('services.recaptcha.site_key') && config('services.recaptcha.secret_key'))
    <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
    @error('g-recaptcha-response')
        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
    @enderror
@endif
