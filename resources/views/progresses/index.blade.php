<x-layout>

    <div class="overflow-x-auto">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <table class="min-w-full divide-y-2 divide-gray-200">
                <tr class="*:font-medium *:text-gray-900">
                    <th class="px-3 py-2 whitespace">م</th>
                    <th class="px-3 py-2 whitespace">الكورس</th>
                    <th class="px-3 py-2 whitespace">الطالب</th>
                    <th class="px-3 py-2 whitespace">المدرس</th>
                    <th class="px-3 py-2 whitespace">التقدم</th>
                    <th class="px-3 py-2 whitespace">ملاحظات</th>
                    <th class="px-3 py-2 whitespace">إجراءات</th>
                </tr>

            <tbody class="divide-y divide-gray-200">
                @foreach ($progresses as $progress)
                <tr class="*:text-gray-900 *:first:font-medium">
                    <td class="px-3 py-2 whitespace">{{$progress->id}}</td>
                    <td class="px-3 py-2 whitespace">{{$progress->course_name}}</td>
                    <td class="px-3 py-2 whitespace">{{$progress->student_name}}</td>
                    <td class="px-3 py-2 whitespace">{{$progress->instructor_name}}</td>
                    <td class="px-3 py-2 whitespace">
                        <progress id="file" value="{{$progress->progress}}" max="100"> {{$progress->progress}}% </progress>
                    </td>
                    <td class="px-3 py-2 whitespace">{{$progress->notes}}</td>
                    <td><a href="{{route('progresses.show', $progress->id)}}">عرض</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-layout>