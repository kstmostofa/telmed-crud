<!DOCTYPE html>
<html lang="en">
<!-- START: Head-->
@include('layouts.head')
<!-- END Head-->

<!-- START: Body-->

<body id="main-container" class="default">

    <!-- START: Pre Loader-->
    <div class="se-pre-con">
        <div class="loader"></div>
    </div>
    <!-- END: Pre Loader-->

    <!-- START: Header-->
    @include('layouts.header')
    <!-- END: Header-->

    <!-- START: Main Menu-->
    @if (Auth::check())
        @if (Auth::user()->role == 'admin')
            @include('layouts.admin-sidebar')
        @elseif(Auth::user()->role == 'doctor')
            @include('layouts.doctor-sidebar')
        @elseif(Auth::user()->role == 'agent')
            @include('layouts.agent-sidebar')
        @endif

    @endif
    <!-- END: Main Menu-->

    <!-- START: Main Content-->
    <main>
        <div class="container-fluid site-width">
            @yield('content')
        </div>
    </main>
    <!-- END: Content-->
    <!-- START: Footer-->
    @include('layouts.footer')
    <!-- END: Footer-->


    {!! Toastr::message() !!}

</body>
<!-- END: Body-->

</html>
