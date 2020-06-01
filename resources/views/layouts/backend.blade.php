<!DOCTYPE html>
<html>
@include('inc.header')
<body>
<div id="page-container">
    <main id="main-container">
        @include('flash_message.message')
        @yield('content')
    </main>

    @include('inc.footer')
</div>
</body>
</html>
