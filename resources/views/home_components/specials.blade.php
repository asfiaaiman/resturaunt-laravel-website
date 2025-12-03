<section id="specials" class="specials">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Specials</h2>
            <p>Check Our Specials</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-3">
                <ul class="nav nav-tabs flex-column">
                    @forelse($foodtypes as $count => $foodtype)
                    <li class="nav-item">
                        <a  @if($count == 0) class="nav-link active show" @else class="nav-link"  @endif  data-toggle="tab" href="#tab-{{$foodtype->name}}">{{$foodtype->name}}</a>
                    </li>
                    @empty
                    @endforelse
                </ul>
            </div>
            <div class="col-lg-9 mt-4 mt-lg-0">
                <div class="tab-content">
                @forelse($foodtypes as $count => $foodtype)
                    <div @if($count == 0) class="tab-pane active" @else class="tab-pane" @endif id="tab-{{$foodtype->name}}">
                       @forelse($foodtype->foods as $food)
                        <div class="row">
                            <div class="col-lg-8 details order-2 order-lg-1">
                                <h3>{{$food->name}}</h3>
                                <p class="font-italic">{{$food->description}}</p>
                                
                            </div>
                            <div class="col-lg-4 text-center order-1 order-lg-2">
                                <img src="{{ asset($food->image) }}" alt="{{ $food->name }}" class="img-fluid">
                            </div>
                        </div>
                        @empty
                        @endforelse
                    </div>
                    @empty
                    @endforelse
                
                </div>
            </div>
        </div>

    </div>
</section><!-- End Specials Section -->