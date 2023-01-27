<main id="main" class="main">
<aside id="sidebar" class="sidebar">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="{{ asset('student/assets/js/main.js')}}"></script>
        <ul class="sidebar-nav" id="sidebar-nav">

            @php
                $id = Auth::guard('teacher')->user()->id;
                $teacherData = App\Models\Teacher::where('id', $id)->first();


                $subjects = App\Models\Subjects::join('teachers_subjects as ts', 'subjects.id', '=', 'ts.subject_id')
                ->join('teachers as t', 'ts.teacher_id', '=', 't.id')
                ->where('t.id', $id)
                ->get();


                $subjectIds =  App\Models\Subjects::join('teachers_subjects as ts', 'subjects.id', '=', 'ts.subject_id')
                ->join('teachers as t', 'ts.teacher_id', '=', 't.id')
                ->where('t.id', $id)
                ->pluck('subjects.id');


                foreach($subjects as $index => $subject){
                    $name = $subject->subject_name;
                    $subjectId = $subjectIds[$index];
                }
                foreach($subjectIds as $subjectId) {
                    $subjectId;
                }


            @endphp


            <!-- @foreach ($subjects as $index => $subject)
                <a class="nav-link nav-button collapsed" data-id="{{ $subject->id }}" data-bs-target="#forms-nav-{{$subject->id}}" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i>
                    <span>{{ $subjectIds[$index]}}</span>
                    <span>{{ $subject->subject_name }}</span>
                </a>
            @endforeach -->
            @foreach ($subjects as $index => $subject)
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#index-{{ $subjectIds[$index]}}" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>{{ $subject->subject_name }} </span>&nbsp;<span>{{ $subject->study_year }}</span><i class="bi bi-chevron-down ms-auto"></i> </a>

                <ul id="index-{{ $subjectIds[$index]}}" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                @php
                $chapters = App\Models\Chapter::select('chapter_name', 'chapters.id as chapter_id', 'chapters.content as chapter_content', 'chapter_number')
                ->join('books', 'books.id', '=', 'chapters.book_id')
                ->join('subjects', 'subjects.id', '=', 'books.subject_id')
                ->where('subjects.id', $subjectIds[$index])
                ->where('books.book_name', 'Teacher')
                ->orderBy('chapter_number', 'asc')
                ->get();


                $subjectID = $subjectIds[$index];


                @endphp
                @foreach ($chapters as $chapter)
                    <li> <a href="{{ route('teacher.content.dashboard', ['id' => $chapter->chapter_id, 'subjectID' => $subjectID]) }}" id="{{$chapter->chapter_id}}">

                         <i class="bi bi-circle"></i>
                        <span>{{$chapter->chapter_name}}</span>
                    </a></li>
                @endforeach
                </ul>
            </a>
        </li>
    @endforeach

        </li>
    </ul>
            </aside>
            </main>
<script>
  // Select all the links
  var links = document.querySelectorAll('.nav-link');

  // Add an event listener to each link
  links.forEach(function(link) {
    link.addEventListener('click', function(event) {
      // Get the ID of the clicked link
      var chapterId = event.target.id;

      // Send an AJAX request to the server with the ID
      fetch('/content/'+ chapterId, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
      })
      .then(response => response.json())
      .then(data => {
          // Update the DOM with the content here
          //for example
          document.getElementById("chapter-content").innerHTML = data;
      })
      .catch(error => console.log(error))
    });
  });

</script>
