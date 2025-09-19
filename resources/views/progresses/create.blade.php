<x-layout>

    <form action="{{route('progresses.store')}}" method="post" class="form">

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @csrf
        <label for="course_id">الكورس</label>
        <input type="text" name="course_id" placeholder="ابحث..." list="courses">
        <datalist  id="courses">
            @foreach ($courses as $course)
                <option value="{{$course->ID}}">{{$course->post_title}}</option>
            @endforeach
        </datalist>

        <label for="instructor_id">المدرب</label>
        <input type="text" name="instructor_id" placeholder="ابحث..." list="instructors">
        <datalist id="instructors">
            @foreach ($users as $user)
                <option value="{{$user->ID}}">{{$user->display_name}}</option>
            @endforeach
        </datalist>

        <label for="student_id">الطالب</label>
        <input type="text" name="student_id" placeholder="ابحث..." list="students">
        <datalist id="students">
            @foreach ($users as $user)
                <option value="{{$user->ID}}">{{$user->display_name}}</option>
            @endforeach
        </datalist>

        <label for="progress">التقدم</label>
        <input type="number" id="progress" name="progress" step="1">

        <label for="notes">ملاحظات</label>
        <textarea type="text" id="notes" name="notes"></textarea>

        <input type="submit" id="submit" name="add" value="إضافة">

        @if($errors->any())
            @foreach($errors->all() as $error)
                {{$error}}
            @endforeach
        @endif
    </form>

</x-layout>