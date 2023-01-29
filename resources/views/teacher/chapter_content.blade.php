
@extends('teacher.teacher_master')
@section('teacher_chapter_content')
@if(Session::has('error'))
    <strong> {{ session::get('error') }}</strong>
@endif

    <div class="pagetitle">
            <h1>{{$name}}</h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Kapitulli {{$chapterData->chapter_number}} </a></li>
                  <li class="breadcrumb-item active"><a href="#">{{$chapterData->chapter_name}} </a></li>
               </ol>
            </nav>
    </div>
    <div class="card">
            <div class="card-body">
            <h5 class="card-title">{{ $chapterData->chapter_name }}</h5>
                <div>{!! $chapterData->content !!}</div>

                <h6 class="card-title">Ndrysho kapitullin</h6>
                <form action="{{ route('teacher.update.chapter', ['id' => $chapterData->id, 'subjectID' => $subjectID]) }}" method="post">
                @csrf
                    <input type="hidden" name="chapter_id" value="{{ $chapterData->id }}">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <button type="submit" name="previous" class="page-link"
                                @if($chapterData->id == $firstChapterId) disabled @endif>Kapitulli paraprak
                                </button>
                            </li>
                            <li class="page-item">
                                <button type="submit" name="next" class="page-link"
                                @if($chapterData->id == $lastChapterId) disabled @endif>Kapitulli tjetër
                                </button>
                            </li>
                        </ul>
                    </nav>
                </form>


            </div>
    </div>


@endsection

