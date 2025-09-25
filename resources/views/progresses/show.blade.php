<x-app-layout>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y-2 divide-gray-200">
            <tr class="*:text-gray-900 *:first:font-medium">
                <th class="px-3 py-2 whitespace">م</th>
                <td class="px-3 py-2 whitespace">{{$progress->id}}</td>
            </tr>

            <tr class="*:text-gray-900 *:first:font-medium">
                <th class="px-3 py-2 whitespace">الكورس</th>
                <td class="px-3 py-2 whitespace">{{$progress->course_name}}</td>
            </tr>

            <tr class="*:text-gray-900 *:first:font-medium">
                <th class="px-3 py-2 whitespace">الطالب</th>
                <td class="px-3 py-2 whitespace">{{$progress->student_name}}</td>
            </tr>

            <tr class="*:text-gray-900 *:first:font-medium">
                <th class="px-3 py-2 whitespace">المدرس</th>
                <td class="px-3 py-2 whitespace">{{$progress->instructor_name}}</td>
            </tr>

            <tr class="*:text-gray-900 *:first:font-medium">
                <th class="px-3 py-2 whitespace">التقدم</th>
                <td class="px-3 py-2 whitespace">
                    <progress id="file" value="{{$progress->progress}}" max="100"> {{$progress->progress}}% </progress>
                </td>
            </tr>

            <tr class="*:text-gray-900 *:first:font-medium">
                <th class="px-3 py-2 whitespace">ملاحظات</th>
                <td class="px-3 py-2 whitespace">{{$progress->notes}}</td>
            </tr>

            <tr class="*:text-gray-900 *:first:font-medium">
                <th class="px-3 py-2 whitespace">إجراءات</th>
                <td>
                    <a href="{{route('progresses.edit', $progress->id)}}">تغيير</a>
                    <form method="post" action="{{route('progresses.destroy', $progress->id)}}">
                        @csrf
                        @method('DELETE')
                        <input name="remove" type="submit" value="حذف" />
                    </form>
                </td>
            </tr>

        </table>
    </div>
</x-app-layout>