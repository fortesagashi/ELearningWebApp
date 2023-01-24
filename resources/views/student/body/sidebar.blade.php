<aside id="sidebar" class="sidebar">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <ul class="sidebar-nav" id="sidebar-nav">

            @php
                $id = Auth::guard('student')->user()->id;
                $studentData = App\Models\Student::find($id);

                $subjects = App\Models\Subjects::join('students as st', function($join) use ($studentData) {
                    $join->on('subjects.study_year', '=', 'st.study_year');
                })->get();

                $subjectIds = App\Models\Subjects::join('students as st', function($join) use ($studentData) {
                    $join->on('subjects.study_year', '=', 'st.study_year');
                })->pluck('subjects.id');

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
                <i class="bi bi-journal-text"></i><span>{{ $subject->subject_name }}</span><i class="bi bi-chevron-down ms-auto"></i> </a>
                <ul id="index-{{ $subjectIds[$index]}}" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                @php
                $chapters = App\Models\Chapter::select('chapter_name', 'chapters.id as chapter_id', 'chapters.content as chapter_content')
                ->join('books', 'books.id', '=', 'chapters.book_id')
                ->join('subjects', 'subjects.id', '=', 'books.subject_id')
                ->where('subjects.id', $subjectIds[$index])
                ->where('books.book_name', 'Student')
                ->get();



                @endphp
                @foreach ($chapters as $chapter)
                    <li> <a href="{{ route('content.dashboard') }}?chapter_name={{ $chapter->chapter_name }}&chapter_id={{$chapter->chapter_id}}&chapter_content={{$chapter->chapter_content}}">


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
<script>
  document.querySelectorAll('.nav-link').forEach(function(element) {
    element.addEventListener('click', function() {
      document.querySelectorAll('.nav-link').forEach(function(el) {
        el.classList.remove('active');
      });
      this.classList.add('active');
    });
  });
</script>
