@include('layouts.header')
<!-- start about me-->
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-6 heading">
                <h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s"><div>Best offers!<span class="hot">HOT</span><span>Grab your best offer for the best price.</span></div></h2>
            </div>
            <div class="container" id="portfolio">
        <div class="row">
            {{\App\User::isAdmin(Auth::id(\Illuminate\Support\Facades\Auth::id()))}}
        </div>
    </div>
        </div>

    </div>
</section>
<!-- end about me-->
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-6 heading">
                <h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s"><div>About us<span>What we are?</span></div></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text_under_heading">
                <p>This is a student project made by Kaloyan Krasimirov Rachev and it's not for a real purposes. Used information in this website will be real (for e.g. destinations, prices, travel agents) but only for non-commerce situations. Have fun !!!</p>
            </div>
        </div>
    </div>
</section>
<!-- end about me-->
@include('layouts.footer')