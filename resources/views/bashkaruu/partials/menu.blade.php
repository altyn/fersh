<div class="logo-w">
   <a class="logo" href="/bashkaruu"><img src="{{asset('img/bash/logo.png')}}"><span>Admin Panel</span></a>
   <div class="mobile-menu-trigger">
      <i class="icon fa fa-navicon" aria-hidden="true"></i>
   </div>
</div>
<div class="menu-and-user">
   <div class="logged-user-w">      
      <div class="avatar-w"><img src="{{asset('img/bash/avatar/avatar.png')}}"></div>      
      <div class="logged-user-info-w">
         <div class="logged-user-role">{{auth()->user()->login}}</div>
      </div>
   </div>
<div class="menu-toggle">
      <span>Меню</span>
      <button class="btn-toggle" title="Свернуть меню">         
         @include('bashkaruu.partials.svg-icons.menu-closed')
         @include('bashkaruu.partials.svg-icons.menu-opened')         
      </button>
   </div>
   <ul class="main-menu">
      <li @if(Route::currentRouteName() == 'bashkaruu.index') class="active" @endif>
         <a href="{{route('bashkaruu.index')}}">
            <div class="icon-w">
               @include('bashkaruu.partials.svg-icons.house')               
            </div>
            <span>Главная страница</span>
         </a>
      </li>
      <li @if(explode('.', Route::currentRouteName())[0] == 'users') class="active" @endif>
         <a href="{{route('users.index')}}">
            <div class="icon-w">
               @include('bashkaruu.partials.svg-icons.user')                
            </div>
            <span>Пользователи</span>
         </a>
      </li>
   </ul>
</div>