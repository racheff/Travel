<!-- start contact -->
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s">GET IN <span>TOUCH</span></h2>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInLeft alert" data-wow-offset="50" data-wow-delay="0.9s">
                <div id="form-messages"></div>
                <form method="POST" id="ajax-contact" action="mailer.php">

                    <!--<label>NAME</label>-->
                    <input name="name" type="text" class="form-control" id="name" required="" placeholder="name">

                    <!--<label>EMAIL</label>-->
                    <input name="subject" type="text" class="form-control" id="subject" placeholder="subject">
                    <input name="email" type="email" class="form-control" id="email" required="" placeholder="example@gmail.com">
                    <!--<label>MESSAGE</label>-->
                    <textarea name="message" rows="4" class="form-control" id="message" required="" placeholder="message..."></textarea>

                    <input type="submit" class="form-control" id="submit">
                    <script src="js/formajax.js"></script>
                </form>
            </div>
            <div class="col-md-12">
                <hr>
                <ul class="social-icon footer-icons">
                    <li><a href="#" class="fa fa-phone header" title="Call me"></a></li>
                    <li><a href="mailto:rachefff@abv.bg" class="fa fa-envelope header" title="Mail me"></a></li>
                    <li><a href="https://www.facebook.com/rachefff" class="fa fa-facebook header" title="Add me on facebook"></a></li>
                    <li><a href="#" class="fa fa-instagram header" title="Add me on instagram"></a></li>
                    <li><a href="skype:toostrong4you?add" class="fa fa-skype header" title="Add me on skype"></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- end contact -->

<!-- start copyright -->
<footer id="copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <p class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s">
                    Copyright &copy; 2017 Kaloyan Rachev's portfolio</p>
            </div>
        </div>
    </div>
    <!--<script src="jquery.min.js"></script>-->
    <script src="owlcarousel/owl.carousel.min.js"></script>
</footer>
<!-- end copyright -->

</body>
</html>