<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between"> <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{ asset('student/assets/img/favicon.png')}}" alt=""> <span class="d-none d-lg-block">"Xheladin Deda"</span> </a> <i class="bi bi-list toggle-sidebar-btn"></i></div>
        @php
            $id = Auth::guard('teacher')->user()->id;
            $teacherData = App\Models\Teacher::find($id);
        @endphp

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <a class="nav-link nav-profile d-flex align-items-center pe-2" href="{{route('teacher.profile')}}">
                <i class="bi bi-person"></i><span class="d-none d-md-block ps-2">Profili</span> </a>
                <a class="nav-link nav-profile d-flex align-items-center pe-2" href="{{route('teacher.logout')}}">
                <i class="bi bi-box-arrow-right"></i><span class="d-none d-md-block ps-2">Shkyqu</span> </a>
                <a class="nav-link nav-profile d-flex align-items-center pe-2" href="#">
                <img src="{{ (!empty($teacherData->photo))? url('upload/teacher_images/'.$teacherData->photo):url('upload/no_image.png')}}" alt="Profile" class="rounded-circle avatar-xs"> <span class="d-none d-md-block ps-2">{{$teacherData->name}}</span> </a>

            </ul>
        </nav>
</header>

