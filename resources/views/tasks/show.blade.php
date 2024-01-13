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
                        {{ $task->name }}</div>
                    </div>
                  </div>
                  <div class="p-2 w-full">
                    <div class="relative">
                      <label for="deadline" class="leading-7 text-sm text-gray-600">期限</label>
                      <div
                        class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        {{ $task->deadline }}</div>
                    </div>
                  </div>
                  <div class="p-2 w-full">
                    <div class="relative">
                      <label for="content" class="leading-7 text-sm text-gray-600">内容</label>
                      <div
                        class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">
                        {{ $task->content }}</div>
                    </div>
                  </div>
                  {{-- 編集ボタン --}}
                  <form method="get" action="{{ route('tasks.edit', ['project_id' => $project->id,'task_id' => $task->id]) }}">
                    <div class="p-2 w-full">
                      <button
                        class="flex mx-auto  text-white bg-indigo-500 border-0 py-2 px-2 focus:outline-none hover:bg-indigo-600 rounded text-lg">編集</button>
                    </div>
                  </form>
                  {{-- 削除ボタン --}}
                  <form method="post" action="{{ route('tasks.destroy', ['project_id' => $project->id,'task_id' => $task->id]) }}">
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

  {{-- 子タスク一覧エリア --}}


</x-app-layout>
