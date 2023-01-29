<div class="vertical-menu">

<div data-simplebar class="h-100">

    <!-- User details -->


    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <!-- <li class="menu-title">Lëndët</li> -->

            <!--
                Student

                <li>
                <a href="index.html" class="waves-effect">
                    <i class="ri-profile-line"></i>
                    <span>Gjuhë Shqipe</span>
                </a>
            </li>
            <li>
                <a href="index.html" class="waves-effect">
                    <i class="ri-profile-line"></i>
                    <span>Gjuhë Angleze</span>
                </a>
            </li>
            <li>
                <a href="index.html" class="waves-effect">
                    <i class="ri-profile-line"></i>
                    <span>Fizikë</span>
                </a>
            </li>
            <li>
                <a href="index.html" class="waves-effect">
                    <i class="ri-profile-line"></i>
                    <span>Kimi</span>
                </a>
            </li>
            <li>
                <a href="index.html" class="waves-effect">
                    <i class="ri-profile-line"></i>
                    <span>Edukatë Qytetare</span>
                </a>
            </li>
            <li>
                <a href="{{ route('all.blog') }}" class="waves-effect">
                    <i class="ri-profile-line"></i>
                    <span>Biologji</span>
                </a>
            </li> -->
            <!-- <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-profile-line"></i>
                    <span>Gjuhë shqipe</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.blog.category') }}">Klasa 5</a></li>
                    <li><a href="{{ route('add.blog.category') }}">Klasa 7</a></li>
                    <li><a href="{{ route('all.blog.category') }}">Klasa 8</a></li>
                    <li><a href="{{ route('all.blog') }}">Klasa 9</a></li>
                </ul>
            </li> -->
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-profile-line"></i>
                    <span>Studentët</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.blog') }}">Klasa 1</a></li>
                    <li><a href="{{ route('all.blog') }}">Klasa 2</a></li>
                    <li><a href="{{ route('all.blog') }}">Klasa 3</a></li>
                    <li><a href="{{ route('all.blog') }}">Klasa 4</a></li>
                    <li><a href="{{ route('all.blog') }}">Klasa 5</a></li>
                    <li><a href="{{ route('all.blog') }}">Klasa 6</a></li>
                    <li><a href="{{ route('all.blog') }}">Klasa 7</a></li>
                    <li><a href="{{ route('all.blog') }}">Klasa 8</a></li>
                    <li><a href="{{ route('all.blog.category') }}">Klasa 9</a></li>
                    <li><a href="{{ route('all.blog') }}">Klasa 10</a></li>
                    <li><a href="{{ route('all.blog') }}">Klasa 11</a></li>
                    <li><a href="{{ route('all.blog') }}">Klasa 12</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-profile-line"></i>
                    <span>Mësuesit</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.blog.category') }}">Klasa 5</a></li>
                    <li><a href="{{ route('add.blog.category') }}">Klasa 7</a></li>
                    <li><a href="{{ route('all.blog.category') }}">Klasa 8</a></li>
                    <li><a href="{{ route('all.blog') }}">Klasa 9</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-profile-line"></i>
                    <span>Lëndët</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('add.blog.category') }}">Klasa 5</a></li>
                    <li><a href="{{ route('all.blog.category') }}">Klasa 7</a></li>
                    <li><a href="{{ route('all.blog.category') }}">Klasa 8</a></li>
                    <li><a href="{{ route('all.blog') }}">Klasa 9</a></li>
                </ul>
            </li>

            <!-- <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-mail-send-line"></i>
                    <span>Home Slide Setup</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('home.slide')}}">Home Slide</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-mail-send-line"></i>
                    <span>About Setup</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('about.page')}}">About Page</a></li>
                    <li><a href="{{route('about.multi.image')}}">About Multi Image</a></li>
                    <li><a href="{{route('all.multi.image')}}">All Multi Image</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-mail-send-line"></i>
                    <span>Portfolio Page Setup</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('all.portfolio')}}">All Portfolio</a></li>
                    <li><a href="{{ route('add.portfolio') }}">Add Portfolio</a></li>
                </ul>
            </li>

            <li class="menu-title">Pages</li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-account-circle-line"></i>
                    <span>Blog Category</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.blog.category') }}">All Blog Category</a></li>
                    <li><a href="{{ route('add.blog.category') }}">Add Blog Category</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-profile-line"></i>
                    <span>Blog Page</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.blog') }}">All Blog</a></li>
                    <li><a href="{{ route('add.blog') }}">Add Blog</a></li>

                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-profile-line"></i>
                    <span>Footer Page Setup</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('footer.setup') }}">Footer Setup</a></li>


                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-profile-line"></i>
                    <span>Contact Message </span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('contact.message') }}">Contact Message</a></li>


                </ul>
            </li> -->
        </ul>
    </div>
    <!-- Sidebar -->
</div>
</div>
