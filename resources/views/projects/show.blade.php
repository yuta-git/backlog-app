<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      プロジェクト詳細
    </h2>
  </x-slot>

  <div class="py-12">
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
</x-app-layout>
