<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-fixed">
                        <thead>
                        <tr>
                            {{--                <th>#</th>--}}
                            <th>Netsuite Id</th>
                            {{--                <th>File Name</th>--}}
                            <th>Job Number</th>
                            <th>Created</th>
                            <th>Modified</th>
                            <th>Size</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($files as $file)
                            <tr>
                                <td>{{$file->netsuite_id}}</td>
                                <td>{{$file->job_number}}</td>
                                <td>{{\Illuminate\Support\Carbon::parse($file->date_created)}}</td>
                                <td>{{$file->last_modified}}</td>
                                <td>{{$file->size}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
