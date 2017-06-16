<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Welcome to X contact book</title>

        <!-- Fonts -->

        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">
        <link href="/css/font-awesome.min.css" rel="stylesheet">

        <script src="https://unpkg.com/vue@2.3.3"></script>
    </head>
    <body>
    <div id="app">
    <div class="header-wrapper">
        <header class="container">
            <nav class="navbar">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">XContactbook</a>
                        <a class="btn btn-nav pull-right" @click="showNav = !showNav" aria-label="Skip to main navigation">
                            <i class="fa fa-bars" aria-hidden="true" ></i>
                        </a>

                    </div>

                    <ul class="nav navbar-nav navbar-right" id="toggle-menu" :class="{open: showNav}">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div><!-- /.container-fluid -->
            </nav>
            <div class="header-banner text-center">
                <h1>The XContactbook is easy to use and fun!</h1>
                <h4>Class aptent taciti sociosqu ad litora torquent per conubia nostra.</h4>
                <section>
                    <a href="#" class="btn btn-primary btn-large">Get Started!</a>
                    <a href="#" class="more-link">Learn More</a>
                </section>

                <img class="img-responsive center-block" src="images/browser.jpg" srcset="images/browser-400.jpg 400w, images/browser-750.jpg 750w, images/browser.jpg 900w" alt="yah" >
                <imageslider></imageslider>
            </div>
        </header>
    </div>
    <section class="features ">
        <div class="container">
            <div class="row">
                <div class="h-line hidden-phone">&nbsp;</div>
                <section class="col-sm-3 text-center">
                    <span class="btn icon">
                        <i class="fa fa-wpexplorer" aria-hidden="true"></i>
                    </span>
                    <h4>Explore</h4>
                    <p>Explore all the new features. Proin gravida nibh vel velit auctor aliquet.
                        Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum,
                        nec sagittis sem nibh id elit.
                    </p>
                    <a href="#" class="btn btn-primary btn-md">Read More</a>
                </section>
                <section class="col-sm-3 text-center">
                    <span class="btn icon">
                        <i class="fa fa-circle-o-notch" aria-hidden="true"></i>
                    </span>
                    <h4>Login</h4>
                    <p>Login to your account anytime. Proin gravida nibh vel velit auctor aliquet.
                    Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum,
                    nec sagittis sem nibh id elit.
                    </p>
                    <a href="#" class="btn btn-primary btn-md">Read More</a>
                </section>
                <section class="col-sm-3 text-center">
                    <span class="btn icon">
                        <i class="fa fa-gg-circle" aria-hidden="true"></i>
                    </span>
                    <h4>Manage</h4>
                    <p>Manage the contacts the way you want it. Proin gravida nibh vel velit auctor aliquet.
                    Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum,
                    nec sagittis sem nibh id elit.
                    </p>
                    <a href="#" class="btn btn-primary btn-md">Read More</a>
                </section>
                <section class="col-sm-3 text-center">
                    <span class="btn icon">
                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                    </span>
                    <h4>User-Friendly</h4>
                    <p>Super user friendly interface. Proin gravida nibh vel velit auctor aliquet.
                    Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum,
                    nec sagittis sem nibh id elit.
                    </p>
                    <a href="#" class="btn btn-primary btn-md">Read More</a>
                </section>
            </div>
        </div>
    </section>
    <section class="portfolios">
        <div class="container">
            <div class="row content">
                <section class="col-sm-3 text-left">
                    <h4>Portfolio</h4>
                    <p>All our users are happy with this product. Proin gravida nibh vel velit auctor aliquet.
                        Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum,
                        nec sagittis sem nibh id elit.
                    </p>
                    <h5><a class="red-text" href="#">Our portfolios</a></h5>
                </section>
                <section class="col-sm-3 text-center">
                    <img class="img-responsive center-block" src="images/portfolio.png">
                    <h5>First Client</h5>
                    <p>A client here</p>
                </section>
                <section class="col-sm-3 text-center">
                    <img class="img-responsive center-block" src="images/portfolio.png">
                    <h5>Second Client</h5>
                    <p>A client here</p>
                </section>
                <section class="col-sm-3 text-center">
                    <img class="img-responsive center-block" src="images/portfolio.png">
                    <h5>Third Client</h5>
                    <p>A client here</p>
                </section>
            </div>
            <div class="row clients">
                <section class="col-sm-3">
                    <img class="img-responsive center-block" src="images/client.png">
                </section>
                <section class="col-sm-3">
                    <img class="img-responsive center-block" src="images/client.png">
                </section>
                <section class="col-sm-3">
                    <img class="img-responsive center-block" src="images/client.png">
                </section>
                <section class="col-sm-3">
                    <img class="img-responsive center-block" src="images/client.png">
                </section>
            </div>
        </div>
    </section>
    <section class="other-info">
        <div class="container">
        <div class="row">
            <section class="col-sm-4">
                <h4>Testimonials</h4>
                <div class="testimonial-content">
                    <img class="img-responsive pull-left" src="images/thumbnail.png">
                    <blockquote>
                        <p>Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.</p>
                        <cite>
                            <strong>QQ com</strong> <br>
                            <a class="red-text" href="#">www.qq.com</a>
                        </cite>
                    </blockquote>
                </div>
            </section>
            <section class="col-sm-4">
                <h4>Our latest News</h4>
                <ul class="list-unstyled">
                    <li>
                        <h5><a>First news fjdia fjdioa ffjdiaof fdiaofjs</a></h5>
                        <p>June 4, 2017 | Post by<a class="red-text">admin</a></p>
                    </li>
                    <li>
                        <h5><a>First news fjdia fjdioa ffjdiaof fdiaofjs</a></h5>
                        <p>June 4, 2017 | Post by<a class="red-text">admin</a></p>
                    </li>
                    <li>
                        <h5><a>First news fjdia fjdioa ffjdiaof fdiaofjs</a></h5>
                        <p>June 4, 2017 | Post by<a class="red-text">admin</a></p>
                    </li>
                </ul>
            </section>
            <section class="col-sm-4">
                <h4>Lastest Tweets</h4>
                <ul class="list-unstyled tweet-list">
                    <li class="clearfix">
                        <img class="img-responsive pull-left" src="images/thumbnail.png">
                        <p>fjdia fjdioa ffjdiaof fdiaofjs nibh vel velit auctor aliquet. Aenean sollicitudin,<a class="red-text"> https://www.w3schools.com/</a></p>
                    </li>
                    <li class="clearfix">
                        <img class="img-responsive pull-left" src="images/thumbnail.png">
                        <p>fjdia fjdioa ffjdiaof fdiaofjs nibh vel velit auctor aliquet. Aenean sollicitudin,<a class="red-text"> https://www.w3schools.com/</a></p>
                    </li>
                    <li class="clearfix">
                        <img class="img-responsive pull-left" src="images/thumbnail.png">
                        <p>fjdia fjdioa ffjdiaof fdiaofjs nibh vel velit auctor aliquet. Aenean sollicitudin,<a class="red-text"> https://www.w3schools.com/</a></p>
                    </li>
            </section>
        </div>
    </section>
    <footer class="container text-center">
        <ul class="list-unstyled">
            <li><a href="#">News</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Contact Us</a></li>
        </ul>
        <div class="social-links">
            <a class="btn btn-primary btn-md">
                <i class="fa fa-twitter" aria-hidden="true"></i> Follow us on Twitter
            </a>
            <a class="btn btn-primary btn-md">
                <i class="fa fa-facebook" aria-hidden="true"></i> Like us on Facebook
            </a>
        </div>

        <p class="copyright">&#169; 2017 <code>XContactbook</code> </p>
    </footer>
    </div>
    <script src="/js/welcome.js"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
    <script>
//        $(document).ready(function(){
//            $("header nav a.btn-nav").click(function(){
//                $("#toggle-menu").toggleClass("open");
//            });
//        });

    </script>
    </body>

</html>

