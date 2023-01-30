<div class="vertical-menu">

<div data-simplebar class="h-100">

    <!-- User details -->


    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">

            <li class="{{ (request()->path() === 'all/students') ? 'active mm-active' : ''  }}">
                <a href="javascript: void(0);" class="has-arrow waves-effect" aria-expanded="true">
                    <i class="ri-profile-line"></i>
                    <span>Studentët</span>
                </a>
                <ul class="sub-menu" >
                <li><a href="{{route('all.students', ['study_year' => 1])}}" class="{{ (request()->path() === 'all/students' && request()->query('study_year') === '1') ? 'active' : ''  }}">  Klasa 1</a></li>
                <li><a href="{{route('all.students', ['study_year' => 2])}}" class="{{ (request()->path() === 'all/students' && request()->query('study_year') === '2') ? 'active' : ''  }}">Klasa 2</a></li>
                <li><a href="{{route('all.students', ['study_year' => 3])}}" class="{{ (request()->path() === 'all/students' && request()->query('study_year') === '3') ? 'active' : ''  }}">  Klasa 3</a></li>
                <li><a href="{{route('all.students', ['study_year' => 4])}}" class="{{ (request()->path() === 'all/students' && request()->query('study_year') === '4') ? 'active' : ''  }}">Klasa 4</a></li>
                <li><a href="{{route('all.students', ['study_year' => 5])}}" class="{{ (request()->path() === 'all/students' && request()->query('study_year') === '5') ? 'active' : ''  }}">  Klasa 5</a></li>
                <li><a href="{{route('all.students', ['study_year' => 6])}}" class="{{ (request()->path() === 'all/students' && request()->query('study_year') === '6') ? 'active' : ''  }}">Klasa 6</a></li>
                <li><a href="{{route('all.students', ['study_year' => 7])}}" class="{{ (request()->path() === 'all/students' && request()->query('study_year') === '7') ? 'active' : ''  }}">  Klasa 7</a></li>
                <li><a href="{{route('all.students', ['study_year' => 8])}}" class="{{ (request()->path() === 'all/students' && request()->query('study_year') === '8') ? 'active' : ''  }}">Klasa 8</a></li>
                <li><a href="{{route('all.students', ['study_year' => 9])}}" class="{{ (request()->path() === 'all/students' && request()->query('study_year') === '9') ? 'active' : ''  }}">  Klasa 9</a></li>

                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-profile-line"></i>
                    <span>Mësimdhënësit</span>
                </a>
                <ul class="sub-menu">
                <li><a href="{{route('all.teachers')}}" class="{{ (request()->path() === 'all/teachers') ? 'active' : ''  }}">  Të gjithë mësimdhënësit</a></li>

                @php
                $teachers = App\Models\Teacher::orderBy('id','ASC')->get();
                @endphp
                @foreach ($teachers as $teacher)
                    <li><a href="{{ route('all.teachers_subjects', ['id' => $teacher->id]) }}" id="{{$teacher->id}}">{{ $teacher->name }}&nbsp;{{ $teacher->lastname }}
                    </a></li>
                @endforeach

                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-profile-line"></i>
                    <span>Lëndët</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                </ul>
            </li>

        </ul>
    </div>
    <!-- Sidebar -->
</div>
</div>
<script>
    </script>
