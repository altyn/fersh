<div class="content-top clearfix">
   <form class="search-form" action="#">
      <div class="form-group">
         <input class="form-control">
         <button class="btn">
            @include('bashkaruu.partials.svg-icons.search')
         </button>
      </div>
   </form>
   <ul>
      <li>
         <a href="#">
            @include('bashkaruu.partials.svg-icons.gear')
         </a>
      </li>
      <li>
         <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">@include('bashkaruu.partials.svg-icons.power-off')</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
      </li>
   </ul>
</div>