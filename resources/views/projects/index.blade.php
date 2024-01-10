<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      プロジェクト一覧
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">

          <div class="lg:w-2/3 w-full mx-auto overflow-auto">
            <div class="mb-5">
              <a class="text-blue-500" href="{{ route('projects.create') }}">プロジェクト作成</a>
            </div>
              <form method="get" action="{{route('projects.index')}}">
                <input type="text" name="search" placeholder="プロジェクト名">
                <button class="text-white bg-indigo-500 border-0 mb-3 py-2 px-2 focus:outline-none hover:bg-indigo-600 rounded text-lg">検索</button>
              </form>
            <table class="table-auto w-full text-left whitespace-no-wrap">
              <thead>
                <tr>
                  <th
                    class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                    プロジェクト名</th>
                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                </tr>
              </thead>
              <tbody>
                @foreach ($projects as $project)
                  <tr>
                    <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3">{{ $project->name }}</td>
                    <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3">
                      <a href="{{ route('projects.show', ['id' => $project->id]) }}" class="text-blue-500">詳細</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          {{ $projects->links() }}
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
