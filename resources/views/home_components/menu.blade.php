<section id="menu" class="menu section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Menu</h2>
            <p>Check Our Tasty Menu</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="menu-flters">

                    @forelse($foodtypes as $foodtype)
                    <li data-filter=".filter-{{ $foodtype->name }}">{{ $foodtype->name }}</li>
                    @empty
                    <li>No Food Type is here now</li>
                    @endforelse

                </ul>
            </div>
        </div>
        @forelse($foodtypes as $foodtype)
        <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">

            @forelse($foodtype->foods as $food)

            <div class="col-lg-6 menu-item filter-{{ $foodtype->name }}">
                <img src="{{asset('storage/foods/images/'.$food->image)}}" class="menu-img" alt="">
                <div class="menu-content">
                    <a href="#">{{ $food->name }}</a><span>${{ $food->price }}</span>
                </div>
            </div>
            @empty

            @endforelse
            <!-- <div class="col-lg-6 menu-item filter-specialty">
                <img src="assets/img/menu/bread-barrel.jpg" class="menu-img " alt="">
                <div class="menu-content">
                    <a href="#">Bread Barrel</a><span>$6.95</span>
                </div>
                <div class="menu-ingredients">
                    Lorem, deren, trataro, filede, nerada
                </div>
            </div> -->

            <!-- <div class="col-lg-6 menu-item filter-starters">
                <img src="assets/img/menu/cake.jpg" class="menu-img" alt="">
                <div class="menu-content">
                    <a href="#">Crab Cake</a><span>$7.95</span>
                </div>
                <div class="menu-ingredients">
                    A delicate crab cake served on a toasted roll with lettuce and tartar sauce
                </div>
            </div> -->

            <!-- <div class="col-lg-6 menu-item filter-salads">
                <img src="assets/img/menu/caesar.jpg" class="menu-img" alt="">
                <div class="menu-content">
                    <a href="#">Caesar Selections</a><span>$8.95</span>
                </div>
                <div class="menu-ingredients">
                    Lorem, deren, trataro, filede, nerada
                </div>
            </div> -->

            <!-- <div class="col-lg-6 menu-item filter-specialty">
                <img src="assets/img/menu/tuscan-grilled.jpg" class="menu-img" alt="">
                <div class="menu-content">
                    <a href="#">Tuscan Grilled</a><span>$9.95</span>
                </div>
                <div class="menu-ingredients">
                    Grilled chicken with provolone, artichoke hearts, and roasted red pesto
                </div>
            </div> -->

            <!-- <div class="col-lg-6 menu-item filter-starters">
                <img src="assets/img/menu/mozzarella.jpg" class="menu-img" alt="">
                <div class="menu-content">
                    <a href="#">Mozzarella Stick</a><span>$4.95</span>
                </div>
                <div class="menu-ingredients">
                    Lorem, deren, trataro, filede, nerada
                </div>
            </div>

            <div class="col-lg-6 menu-item filter-salads">
                <img src="assets/img/menu/greek-salad.jpg" class="menu-img" alt="">
                <div class="menu-content">
                    <a href="#">Greek Salad</a><span>$9.95</span>
                </div>
                <div class="menu-ingredients">
                    Fresh spinach, crisp romaine, tomatoes, and Greek olives
                </div>
            </div> -->

            <!-- <div class="col-lg-6 menu-item filter-salads">
                <img src="assets/img/menu/spinach-salad.jpg" class="menu-img" alt="">
                <div class="menu-content">
                    <a href="#">Spinach Salad</a><span>$9.95</span>
                </div>
                <div class="menu-ingredients">
                    Fresh spinach with mushrooms, hard boiled egg, and warm bacon vinaigrette
                </div>
            </div>

            <div class="col-lg-6 menu-item filter-specialty">
                <img src="assets/img/menu/lobster-roll.jpg" class="menu-img" alt="">
                <div class="menu-content">
                    <a href="#">Lobster Roll</a><span>$12.95</span>
                </div>
                <div class="menu-ingredients">
                    Plump lobster meat, mayo and crisp lettuce on a toasted bulky roll
                </div>
            </div> -->

        </div>
        @empty
        no food type still here
        @endforelse
    </div>
</section><!-- End Menu Section -->
