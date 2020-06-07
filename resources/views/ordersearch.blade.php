<div class="search-container" id="search">
    <form action="{{route('adminRoutes.searchorder')}}" method="GET" role="search">
        {{--{{ csrf_field() }}--}}
        <div class="input-group">
            <input type="number" value="{{request()->input('search')}}" class="formPaieskaProd" name="search"  placeholder="Order number...">
            <button type="submit" style="height: 26px;" class="button">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </div>
    </form></div>
