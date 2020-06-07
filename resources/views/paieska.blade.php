<li> <div class="search-container" id="search">
<form action="{{route('search')}}" method="GET" role="search">
{{--{{ csrf_field() }}--}}
    <div class="input-group">
        <input type="text" value="{{request()->input('search')}}" class="formPaieskaVest" name="search"  placeholder="Search...">
     <button type="submit" class="button search">
        <span class="glyphicon glyphicon-search"></span>
     </button>
    </div>
</form></div></li>
