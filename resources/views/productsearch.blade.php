<div class="search-container" id="search">
        <form action="{{route('adminRoutes.searchproduct')}}" method="GET" role="search">
            {{--{{ csrf_field() }}--}}
            <div class="input-group">
                <input type="text" value="{{request()->input('search')}}" class="formPaieskaProd" name="search"  placeholder="Search...">
                <button type="submit" style="height: 26px;" class="button">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </div>
        </form></div>
