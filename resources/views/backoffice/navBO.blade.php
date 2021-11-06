
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus icon'></i>
      <a class="logo_name" href="/">Handstand</a>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      {{-- <li>
        
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Backoffice</span>
        </a>
         <span class="tooltip">Backoffice</span>
      </li> --}}
      <li>
       <a href="/profil">
         <i class='bx bx-user' ></i>
         <span class="links_name">Profil</span>
       </a>
       <span class="tooltip">Profil</span>
     </li>
     <li>
      <a href="/backoffice/email">
        <i class='bx bx-user' ></i>
        <span class="links_name">Email</span>
      </a>
      <span class="tooltip">Email</span>
    </li>
     @can('admin')
     <li>
      <a href="{{ route('user.index') }}">
        <i class='bx bx-chat' ></i>
        <span class="links_name">Users</span>
      </a>
      <span class="tooltip">Users</span>
    </li>
     
     <li>
       <a href="{{ route('about.index') }}">
         <i class='bx bx-chat' ></i>
         <span class="links_name">About</span>
       </a>
       <span class="tooltip">About</span>
     </li>
     <li>
      <a href="{{ route('titre.index') }}">
        <i class='bx bx-chat' ></i>
        <span class="links_name">Titres</span>
      </a>
      <span class="tooltip">Titres</span>
    </li>
     <li>
       <a href="{{ route('gallery.index') }}">
         <i class='bx bx-pie-chart-alt-2' ></i>
         <span class="links_name">gallery</span>
       </a>
       <span class="tooltip">gallery</span>
     </li>
     <li>
       <a href="{{ route('event.index') }}">
         <i class='bx bx-folder' ></i>
         <span class="links_name">Event</span>
       </a>
       <span class="tooltip">Event</span>
     </li>
     <li>
       <a href="{{ route('client.index') }}">
         <i class='bx bx-cart-alt' ></i>
         <span class="links_name">Client</span>
       </a>
       <span class="tooltip">Client</span>
     </li>
     <li>
       <a href="{{ route('slider.index') }}">
         <i class='bx bx-heart' ></i>
         <span class="links_name">Slider</span>
       </a>
       <span class="tooltip">Slider</span>
     </li>
     @endcan
     <li>
       <a href="{{ route('classe.index') }}">
         <i class='bx bx-cog' ></i>
         <span class="links_name">Classe</span>
       </a>
       <span class="tooltip">Classe</span>
     </li>
     <li>
      <a href="{{ route('trainer.index') }}">
        <i class='bx bx-heart' ></i>
        <span class="links_name">Trainer</span>
      </a>
      <span class="tooltip">Trainer</span>
    </li>
     <li>
        <form style=" margin-left:0; width:100%" method="POST" action="{{ route('logout') }}">
        
            @csrf
            <x-dropdown-link style="width: 100%; padding-left: 0 !important;" :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                                <i class='bx bx-log-out' ></i>
                <span class="links_name">Log Out</span>
            </x-dropdown-link>
          </form>
      </li>
    </ul>
  </div>
  <div style="background-color: #11101D">
    {{-- @include('partials.header') --}}
  </div>
  <script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
  });

  searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
  });

  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
   }
  }
  </script>
