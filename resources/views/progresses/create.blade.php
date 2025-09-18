<x-layout>

    <form action="{{route('progresses.store')}}" method="post" class="form">

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @csrf
        <label for="course_id">الكورس</label>
        <select name="course_id" id="course_id">
            <option value="">إختر كورس</option>
            @foreach ($courses as $course)
                <option value="{{$course->ID}}">{{$course->post_title}}</option>
            @endforeach
        </select>


        <label for="instructor_id">المدرب</label>
        <select name="instructor_id" id="instructor_id">
            <option value="">إختر مدربا</option>
            @foreach ($users as $user)
                <option value="{{$user->ID}}">{{$user->display_name}}</option>
            @endforeach
        </select>

        <label for="student_id">الطالب</label>
        <select name="student_id" id="student_id">
            <option value="">إختر طالبا</option>
            @foreach ($users as $user)
                <option value="{{$user->ID}}">{{$user->display_name}}</option>
            @endforeach
        </select>

        <label for="progress">التقدم</label>
        <input type="number" id="progress" name="progress" step="1">

        <label for="notes">ملاحظات</label>
        <textarea type="text" id="notes" name="notes"></textarea>

        <input type="submit" id="submit" name="add" value="إضافة">
    </form>

</x-layout>