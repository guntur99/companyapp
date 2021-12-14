<!--site header begins-->
<header class="admin-header">

<a href="#" class="sidebar-toggle" data-toggleclass="sidebar-open" data-target="body"> </a>

<nav class=" mr-auto my-auto">
    <ul class="nav align-items-center">

        <li class="nav-item">
            <a class="nav-link  " id="search_id" href="#">
                <i class="mdi mdi-google-assistant mdi-24px align-middle "></i>
                Company App
            </a>
        </li>
    </ul>
</nav>
<nav class=" ml-auto">
    <ul class="nav align-items-center">
        <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle" href="#"   role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-sm avatar-online">
                    <span class="avatar-title rounded-circle bg-dark">O</span>
                </div>
            </a>
            <div class="dropdown-menu  dropdown-menu-right"   >
                <a class="dropdown-item" href="{{ route('logout') }}" method="POST" id="logoutLink"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"> Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
            </div>
        </li>

    </ul>

</nav>
</header>
<!--site header ends -->
<section class="admin-content">
<div class="container">
</div>
</section>
