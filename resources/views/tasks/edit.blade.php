<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      プロジェクト編集
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          <section class="text-gray-600 body-font relative">
            <form method="post" action="{{ route('tasks.update', ['project_id'=>$project->id, 'task_id'=>$task->id])}}">
              @csrf
              {{-- ユーザーIDとプロジェクトID --}}
              <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
              <input type="hidden" name="project_id" value="{{ $project->id }}">
              <div class="container px-5 mx-auto">
                <div class="lg:w-1/2 md:w-2/3 mx-auto">
                  <div class="flex flex-wrap -m-2">
                    <div class="p-2 w-full">
                      <div class="relative">
                        <label for="name" class="leading-7 text-sm text-gray-600">プロジェクト名</label>
                        <input type="text" id="name" name="name" value="{{ $task->name }}"
                          class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                      </div>
                    </div>
                    <div class="p-2 w-full">
                      <div class="relative">
                        <label for="deadline" class="leading-7 text-sm text-gray-600">期限</label>
                        <input type="date" id="deadline" name="deadline" value="{{ $task->deadline }}"
                          class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                      </div>
                    </div>
                    <div class="p-2 w-full">
                      <div class="relative">
                        <label for="content" class="leading-7 text-sm text-gray-600">内容</label>
                        <textarea id="content" name="content"
                          class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">
                        {{ $task->content }}
                        </textarea>
                      </div>
                    </div>
                    <div class="p-2 w-full">
                      <button
                        class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">更新</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
