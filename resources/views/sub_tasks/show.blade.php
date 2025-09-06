<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      サブタスク詳細
    </h2>
  </x-slot>

  <div class="py-3">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          @if (session('success'))
          <div class="mb-4 px-4 py-3 bg-green-100 border-green-400 border rounded text-green-800">
            {{ session('success') }}
          </div>
          @endif

          <section class="text-gray-600 body-font relative">
            <div class="container px-5 mx-auto">
              <div class="lg:w-1/2 md:w-2/3 mx-auto flex flex-wrap -m-2">
                <div class="p-2 w-full">
                  <div class="relative">
                    <label class="leading-7 text-sm text-gray-600">親タスク名</label>
                    <div class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500
                      focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1
                      px-3 leading-8 transition-colors duration-200 ease-in-out">
                      {{ $task->name }}
                    </div>
                  </div>
                </div>

                <form method="post" action="{{ route('tasks.sub_tasks.update', [
                  'project_id' => $task->project->id,
                  'task_id'    => $task->id,
                  'sub_task_id'=> $subTask->id
                ]) }}" class="w-full">
                  @csrf
                  @method('POST')
                  <div class="p-2 w-full">
                    <label for="name" class="leading-7 text-sm text-gray-600">サブタスク名</label>
                    <input type="text" id="name" name="name" value="{{ $subTask->name }}"
                      class="w-full bg-gray-100 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white 
                        focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                  </div>
                  <div class="p-2 w-full">
                    <label for="content" class="leading-7 text-sm text-gray-600">内容</label>
                    <textarea id="content" name="content"
                      class="w-full bg-gray-100 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2
                        focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ $subTask->content }}</textarea>
                  </div>
                  <div class="flex w-full justify-between items-center mt-6">
                    {{-- 戻るボタン（左側） --}}
                    <a href="{{ route('tasks.show', ['project_id' => $task->project->id, 'task_id' => $task->id]) }}"
                      class="text-white bg-gray-500 border-0 py-2 px-8 focus:outline-none hover:bg-gray-600 rounded text-lg text-center">
                      戻る
                    </a>
                    <button
                      class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg ml-2">更新</button>
                  </div>
                </form>

                {{-- 削除ボタン（formタグは外側に） --}}
                <form method="post" action="{{ route('tasks.sub_tasks.destroy', [
                  'project_id' => $task->project->id,
                  'task_id' => $task->id,
                  'sub_task_id' => $subTask->id
                ]) }}" class="w-full mt-2 flex justify-end">
                  @csrf
                  <button
                    class="text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded text-lg">削除</button>
                </form>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>