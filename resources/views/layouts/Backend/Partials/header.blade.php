
		<div class="top-navbar">
      <nav class="navbar navbar-expand-lg">
          <div class="container-fluid">

              <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-mone d-none">
                  <span class="material-icons">arrow_back_ios</span>
              </button>
    <div class="user-info">
        <a  href="#">User : {{ Auth::user()->name }} </a>
        <a  href="#">Role : {{ Auth::user()->name }} </a>
        <a href="#">Date : <span id='ct6' style="background-color: #ebebca77;font-size:15px;"></span></a>

    </div>
   

    <div class="navbar-brand">
      <h5><img src="{{ asset('habro_logo/habro.png') }}" width="30px" height="30px" class="img-fluid"/><span  class="navbar-brand ml-3">Habro System Limited.</span></h5>
    </div>
    
              <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="material-icons">more_vert</span>
              </button>

              

             
              <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none" id="navbarSupportedContent">
                  <ul class="nav navbar-nav ml-auto"> 
                     
                      <li class="dropdown nav-item active">
                          <a href="#" class="nav-link" data-toggle="dropdown">
                             <span class="material-icons">notifications</span>
                              <span class="notification">4</span>
                         </a>
                          <ul class="dropdown-menu">
                              <li>
                                  <a href="#">You have 5 new messages</a>
                              </li>
                              <li>
                                  <a href="#">You're now friend with Mike</a>
                              </li>
                              <li>
                                  <a href="#">Wish Mary on her birthday!</a>
                              </li>
                              <li>
                                  <a href="#">5 warnings in Server Console</a>
                              </li>
                            
                          </ul>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="#">
          <span class="material-icons">settings</span>
          </a>
          
                      </li>
                  

                      <li class="dropdown nav-item">
                        <a href="#" class="nav-link" data-toggle="dropdown">
                           <span class="material-icons">person</span>
                            
                       </a>
                       
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#">Profile</a>
                            </li>
                            <li>
                                <a href="#">Change Password</a>
                            </li>
                            <li>

                              <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                              
                            </li>
                            
                          
                        </ul>
                    </li>
        <li class="nav-item">
                          
                      </li>
                  </ul>
              </div>
          </div>
      </nav>
</div>
