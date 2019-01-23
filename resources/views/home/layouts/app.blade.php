@include('home.public.header')
@include('home.public.nav')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        @yield('content')
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


@include('home.public.footer')

</div>
<!-- ./wrapper -->
</body>
</html>