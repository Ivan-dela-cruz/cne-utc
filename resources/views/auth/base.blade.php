<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>ELECIONES 2021</title>
    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords"
          content="Elecciones 2021">
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta-Tags -->

    <!-- css files -->
    <link href="{{asset('auth/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" media="all">
    <link href="{{asset('auth/css/style.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <!-- //css files -->

    <!-- google fonts -->
    <link
        href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- //google fonts -->

</head>
<body>

<div class="signupform">
@yield('content')
<!-- footer -->
    <div class="footer">
        <p>&copy; 2021 Elecciones 2021. All Rights Reserved | Design by <a href="http://www.utc.edu.ec/"
                                                                           target="blank">UTC</a></p>
    </div>
    <!-- footer -->
</body>
</html>
