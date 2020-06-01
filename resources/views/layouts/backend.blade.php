<!DOCTYPE html>
<html>
@include('inc.header')
<body>
<div id="page-container">
    @if(config('shopify-app.appbridge_enabled'))
        <script src="https://unpkg.com/@shopify/app-bridge{{ config('shopify-app.appbridge_version') ? '@'.config('shopify-app.appbridge_version') : '' }}"></script>
        <script>
            var AppBridge = window['app-bridge'];
            var createApp = AppBridge.default;
            var app = createApp({
                apiKey: '{{ config('shopify-app.api_key') }}',
                shopOrigin: 'eyewear-boutique-ltd.myshopify.com',
                forceRedirect: true,
            });
        </script>

        @include('shopify-app::partials.flash_messages')
    @endif
    <main id="main-container">
        @include('flash_message.message')
        @yield('content')
    </main>

    @include('inc.footer')
</div>
</body>
</html>
