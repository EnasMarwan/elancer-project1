@extends('layouts.dashboard')
@section('page-title' , 'clicks')
@section('content')
<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <div class="max-w-6xl mx-auto mt-3">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            
              <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                  <thead class="bg-gray-50 dark:bg-gray-600 dark:text-gray-200">
                    <tr>
                      <th scope="col"class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">short url</th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Ip</th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">browser</th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Created At</th>
                  
                     
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200">
                    <tr></tr>
                    @foreach ($clicks as $click)
                    <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{url($shorturl->shorturl)}}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{$click->ip}}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{$click->browser}}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{$click->created_at}}</td>
                    </tr>
                    @endforeach
                    <!-- More items... -->
                  </tbody>
                </table>

              </div>
            </div>
            {{ $clicks->withQueryString()->links() }}
          </div>
    </div>

@endsection