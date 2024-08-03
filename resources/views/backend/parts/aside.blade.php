<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">{{ auth()->user()->name }}</span>
                        
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item" href="{{ route('admin.profile') }}">Profil</a></li>
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('admin.logout') }}">Çıxış</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    A
                </div>
            </li>

            <li class="{{ \Illuminate\Support\Str::contains(url()->current(), 'welcome') ? 'active' : '' }}">
                <a href="{{ route('admin.index', ['page' => 'welcome']) }}"><i class="fa fa-th-large"></i> <span
                        class="nav-label">İdarə
                        Paneli</span></a>
            </li>


            <li class="{{ \Illuminate\Support\Str::contains(url()->current(), 'categories') ? 'active' : '' }}">
                <a href="{{ route('admin.index', ['page' => 'categories']) }}"><i class="fa fa-archive"></i> <span
                        class="nav-label">Kateqoriyalar</span></a>
            </li>


            <li class="{{ \Illuminate\Support\Str::contains(url()->current(), 'managers') ? 'active' : '' }}">
                <a href="{{ route('admin.index', ['page' => 'managers']) }}"><i class="fa fa-users"></i> <span
                        class="nav-label">İdarəçilər</span></a>
            </li>


            <li class="{{ \Illuminate\Support\Str::contains(url()->current(), 'faqs') ? 'active' : '' }}">
                <a href="{{ route('admin.index', ['page' => 'faqs']) }}"><i class="fa fa-question"></i> <span class="nav-label">Çox
                        soruşulan suallar</span></a>
            </li>

            <li class="{{ \Illuminate\Support\Str::contains(url()->current(), 'sliders') ? 'active' : '' }}">
                <a href="{{ route('admin.index', ['page' => 'sliders']) }}"><i class="fa fa-photo"></i> <span
                        class="nav-label">Slayderlər</span></a>
            </li>

            <li class="{{ \Illuminate\Support\Str::contains(url()->current(), 'standartpages') ? 'active' : '' }}">
                <a href="{{ route('admin.index', ['page' => 'standartpages']) }}"><i class="fa fa-file"></i> <span
                        class="nav-label">Standart Səhifələr</span></a>
            </li>

            <li class="{{ \Illuminate\Support\Str::contains(url()->current(), 'blogs') ? 'active' : '' }}">
                <a href="{{ route('admin.index', ['page' => 'blogs']) }}"><i class="fa fa-rss"></i> <span
                        class="nav-label">Bloqlar</span></a>
            </li>

            <li class="{{ \Illuminate\Support\Str::contains(url()->current(), 'settings') ? 'active' : '' }}">
                <a href="{{ route('admin.index', ['page' => 'settings']) }}"><i class="fa fa-cog"></i> <span
                        class="nav-label">Parametrlər</span></a>
            </li>

            <li class="{{ \Illuminate\Support\Str::contains(url()->current(), 'visits_counters') ? 'active' : '' }}">
                <a href="{{ route('admin.index', ['page' => 'visits_counters']) }}"><i class="fa fa-user-secret"></i> <span
                        class="nav-label">Səhifə ziyarətləri</span></a>
            </li>


        </ul>

    </div>
</nav>
