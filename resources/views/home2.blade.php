<section class="text-center">


    @foreach($allcategories as $category)
        <div class="col-md-4">
            <div class="card item">
                <a href="{{ action('ShopController@getCategory', $category->id_kateg)}}" class="text-body">
                    </br>
                    <h10>{{ $category->pavadinimas }}</h10>
                    </br>
                    </br>
                    <div class="img-wrap">
                        <img src="{{ asset('/images') . '/' . $category->nuotraukospav . '.jpg'}}">
                    </div>
                </a>
            </div>
        </div>
    @endforeach

</section>
