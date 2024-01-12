<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      プロジェクト詳細
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
                      <label for="name" class="leading-7 text-sm text-gray-600">プロジェクト名</label>
                      <div
                        class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        {{ $project->name }}</div>
                    </div>
                  </div>
                  <div class="p-2 w-full">
                    <div class="relative">
                      <label for="content" class="leading-7 text-sm text-gray-600">内容</label>
                      <div
                        class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">
                        {{ $project->content }}</div>
                    </div>
                  </div>
                  <form method="get" action="{{ route('projects.edit', ['id' => $project->id]) }}">
                    <div class="p-2 w-full">
                      <button
                        class="flex mx-auto  text-white bg-indigo-500 border-0 py-2 px-2 focus:outline-none hover:bg-indigo-600 rounded text-lg">編集</button>
                    </div>
                  </form>
                  <form method="post" action="{{ route('projects.destroy', ['id' => $project->id]) }}">
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

  {{-- タスク --}}
  <div class="py-3">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">

          <div class="lg:w-2/3 w-full mx-auto overflow-auto">
            {{-- タスク作成画面へのリンク --}}
            <div class="mb-5">
              <a class="text-blue-500" href="{{ route('tasks.create', [ 'project_id' => $project->id ]) }}">タスク作成</a>
            </div>
            {{-- タスクの検索フォーム --}}
            <form method="get" action="">
              <input type="text" name="search" placeholder="タスク名">
              <button
                class="text-white bg-indigo-500 border-0 mb-3 py-2 px-2 focus:outline-none hover:bg-indigo-600 rounded text-lg">検索</button>
            </form>
            <table class="table-auto w-full text-left whitespace-no-wrap">
              <thead>
                <tr>
                  <th
                    class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                    タスク名</th>
                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">期限</th>
                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">詳細</th>
                </tr>

              </thead>
              <tbody>
                @foreach ($tasks as $task)
                <tr>
                  <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3">{{$task->name}}</td>
                  <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3">{{$task->deadline}}</td>
                  <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3">
                    <a href="{{ route('tasks.show', ['project_id'=>$project->id, 'task_id'=>$task->id]) }}" class="text-blue-500">詳細</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          {{ $tasks->links() }}
        </div>
      </div>
    </div>
  </div>


</x-app-layout>
