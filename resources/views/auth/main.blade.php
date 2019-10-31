<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">

<head>
    @include('admin.layouts.header.head')
</head>

<body data-open="click" data-menu="vertical-menu" data-col="1-column"
    class="vertical-layout vertical-menu 1-column  blank-page blank-page">

    @yield('body')

    @include('admin.layouts.footer.foot')
</body>

</html>