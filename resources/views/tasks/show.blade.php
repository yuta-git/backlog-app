<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      タスク詳細
    </h2>
  </x-slot>

  <div class="py-3">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          <section class="text-gray-600 body-font relative">
            <div class="container px-5 mx-auto">
              <div class="lg:w-1/2 md:w-2/3 mx-auto">
                <div class="flex flex-wrap -m-2">
                  <div class="p-2 w-full">
                    <div class="relative">
                      <label for="name" class="leading-7 text-sm text-gray-600">タスク名</label>
                      <div
                        class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        {{ $task->name }}
                      </div>
                    </div>
                  </div>
                  <div class="p-2 w-full">
                    <div class="relative">
                      <label for="deadline" class="leading-7 text-sm text-gray-600">期限</label>
                      <div
                        class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        {{ $task->deadline->format('Y年m月d日') }}
                      </div>
                    </div>
                  </div>
                  <div class="p-2 w-full">
                    <div class="relative">
                      <label for="content" class="leading-7 text-sm text-gray-600">内容</label>
                      <div
                        class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">
                        {{ $task->content }}
                      </div>
                    </div>
                  </div>
                  {{-- 編集ボタン --}}
                  <form method="get"
                    action="{{ route('tasks.edit', ['project_id' => $task->project->id,'task_id' => $task->id]) }}">
                    <div class="p-2 w-full">
                      <button
                        class="flex mx-auto  text-white bg-indigo-500 border-0 py-2 px-2 focus:outline-none hover:bg-indigo-600 rounded text-lg">編集</button>
                    </div>
                  </form>
                  {{-- 削除ボタン --}}
                  <form method="post"
                    action="{{ route('tasks.destroy', ['project_id' => $task->project->id,'task_id' => $task->id]) }}">
                    @csrf
                    <div class="p-2 w-full">
                      <button
                        class="flex mx-auto text-white bg-red-500 border-0 py-2 px-2 focus:outline-none hover:bg-red-600 rounded text-lg">削除</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>

  {{-- サブタスク一覧エリア --}}
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-6 text-gray-900">
        @if (session('success'))
        <div class="mb-4 px-4 py-3 bg-green-100 border-green-400 border rounded text-green-800">
          {{ session('success') }}
        </div>
        @endif
        <div class="flex justify-between items-center mb-4">
          <h3 class="text-lg font-semibold">サブタスク一覧</h3>
          <a href="{{ route('tasks.sub_tasks.create', ['project_id' => $task->project->id, 'task_id' => $task->id]) }}"
            class="inline-block ml-4 px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
            サブタスク作成
          </a>
        </div>
        <div class="lg:w-2/3 w-full mx-auto overflow-auto mt-8">
          <table class="table-auto w-full text-left whitespace-no-wrap">
            <thead>
              <tr>
                <th
                  class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                  サブタスク名
                </th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                  内容
                </th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">詳細</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($subTasks as $subTask)
              <tr>
                <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3">{{ $subTask->name }}</td>
                <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3">{{ Str::limit($subTask->content, 50) }}</td>
                <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3">
                  <a href="{{ route('tasks.sub_tasks.show', ['project_id'=>$task->project->id, 'task_id'=>$task->id, 'sub_task_id'=>$subTask->id]) }}"
                    class="text-blue-500">詳細</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>


</x-app-layout>