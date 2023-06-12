<nav id="sidebar">
    <div class="sidebar-header">
        <h3><img src="{{ asset('habro_logo/habro.png') }}" class="img-fluid" /><span>HabroERP</span></h3>
    </div>
    <ul class="list-unstyled components">
        <li class="active">
            <a href="{{ route('admindashboard') }}" class="dashboard"><i
                    class="material-icons">dashboard</i><span>Dashboard</span></a>
        </li>

        <div class="small-screen navbar-display">
            <li class="dropdown d-lg-none d-md-block d-xl-none d-sm-block">
                <a href="#homeSubmenu0" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="material-icons">notifications</i><span> 4 notification</span></a>
                <ul class="collapse list-unstyled menu" id="homeSubmenu0">
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

            <li class="d-lg-none d-md-block d-xl-none d-sm-block">
                <a href="#"><i class="material-icons">apps</i><span>apps</span></a>
            </li>

            <li class="d-lg-none d-md-block d-xl-none d-sm-block">
                <a href="#"><i class="material-icons">person</i><span>user</span></a>
            </li>

            <li class="d-lg-none d-md-block d-xl-none d-sm-block">
                <a href="#"><i class="material-icons">settings</i><span>setting</span></a>
            </li>
        </div>


        <li class="dropdown">
            <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">

                <i class="material-icons">settings</i><span>Office Info</span></a>
            <ul class="collapse list-unstyled menu" id="homeSubmenu2">
                <li>
                    <a href="{{ route('officeinfo') }}">Office Setup</a>
                </li>
               
            </ul>
        </li>

        <li class="dropdown">
            <a href="#homeSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">

                <i class="material-icons">house</i><span>Account Info</span></a>
            <ul class="collapse list-unstyled menu" id="homeSubmenu3">
                <li>
                    <a href="{{ route('account') }}">Account Open</a>
                </li>
               
            </ul>
        </li>

        <li class="dropdown">
            <a href="#homeSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">

                <i class="material-icons">unarchive</i><span>Product and Service</span></a>
            <ul class="collapse list-unstyled menu" id="homeSubmenu4">
                <li>
                    <a href="{{ route('product') }}">Product and Service Setup</a>
                </li>
                <li>
                    <a href="{{ route('product') }}">Product Rules</a>
                </li>
               
            </ul>
        </li>


        <li class="dropdown">
            <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">

                <i class="material-icons">aspect_ratio</i><span>Setup</span></a>
            <ul class="collapse list-unstyled menu" id="homeSubmenu1">
                <li>
                    <a href="{{ route('appsetup') }}">Application Setup</a>
                </li>
                <li>
                    <a href="#">Office Type</a>
                </li>
                <li>
                    <a href="#">Account Category</a>
                </li>
                <li>
                    <a href="#">Account Type</a>
                </li>
               
            </ul>
        </li>



    </ul>


</nav>
