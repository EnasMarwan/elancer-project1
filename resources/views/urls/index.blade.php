@extends('layouts.dashboard')
@section('page-title' , 'Links')
@section('content')
    <link rel="stylesheet" href="<?= asset('css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    

    <div class="max-w-6xl mx-auto mt-3" style="max-width: 82rem !important;">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
              <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                  <thead class="bg-gray-50 dark:bg-gray-600 dark:text-gray-200">
                    <tr>
                      <th scope="col"
                       class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Id</th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Long URL</th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Short URL</th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Created At</th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">clicks</th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider"></th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider"></th>
                  

                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200">
                    <tr></tr>
                    @foreach ($urls as $url)
                    <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{$url->id}}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{$url->longurl}}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{url($url->shorturl)}}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{$url->created_at}}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <a href="{{ route('show.click' ,$url->id ) }}">
                        {{ $url->clicks}} /  <li class="fas fa-info"></li>
                      </a>
                    </td>
                    
                    <td class="px-6 py-4 whitespace-nowrap">
                        <form action="{{ route('url.destroy', $url->id) }}" method="post">
                        @csrf
                        @method('delete') <!-- <input type="hidden" name="_method" value="delete">-->
                        <button class="btn btn-sm btn-danger">Delete</button>
                        

                        </form>
                      

                    </td>
                    
                    </tr>
                    @endforeach
                    <!-- More items... -->
                  </tbody>
                </table>

              </div>
            </div>
            {{ $urls->withQueryString()->links() }}
          </div>
    </div>
    
    @endsection
