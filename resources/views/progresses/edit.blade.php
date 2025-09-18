<x-layout>

    <form action="{{route('progresses.update', $progress->id)}}" method="post" class="form">

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        
        @csrf
        @method('PUT')
        <label for="course_id">الكورس</label>
        <select name="course_id" id="course_id" readonly>
            <option value="">إختر كورس</option>
            @foreach ($courses as $course)
                <option value="{{$course->ID}}" <?php if($progress->course_id == $course->ID) echo 'selected'?>>
                    {{$course->post_title}}
                </option>
            @endforeach
        </select>


        <label for="instructor_id">المدرب</label>
        <select name="instructor_id" id="instructor_id" readonly>
            <option value="">إختر مدربا</option>
            @foreach ($users as $user)
                <option value="{{$user->ID}}" <?php if($progress->instructor_id == $user->ID) echo 'selected'?>>
                    {{$user->display_name}}
                </option>
            @endforeach
        </select>

        <label for="student_id">الطالب</label>
        <select name="student_id" id="student_id" readonly>
            <option value="">إختر طالبا</option>
            @foreach ($users as $user)
                <option value="{{$user->ID}}" <?php if($progress->student_id == $user->ID) echo 'selected'?>>
                    {{$user->display_name}}
                </option>
            @endforeach
        </select>

        <label for="progress">التقدم</label>
        <input type="number" id="progress" name="progress" step="1" value="{{$progress->progress}}">

        <label for="notes">ملاحظات</label>
        <textarea type="text" id="notes" name="notes">{{$progress->notes}}</textarea>

        <input type="submit" id="submit" name="update" value="تعديل">
    </form>

</x-layout>