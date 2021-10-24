<x-app-layout>
    <x-slot name="header">
        My Links
    </x-slot>
    <link rel="stylesheet" href="<?= asset('css/bootstrap.min.css') ?>">
<br> 
 
          <div class="container">
          <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Long url</th>
                        <th>Short url</th>
                        <th>clicks number</th>
                    </tr>
                </thead>
      
                <tbody>
                  @foreach ($urls as $url)
                  <tr>
                  <td class="px-6 py-4 whitespace-nowrap">{{$url->id}}</td>
                  <td class="px-6 py-4 whitespace-nowrap">{{$url->longurl}}</td>
                  <td class="px-6 py-4 whitespace-nowrap">{{url($url->shorturl)}}</td>
                  <td class="px-6 py-4 whitespace-nowrap">{{ $url->clicks}}</td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
      </div>
        



</x-app-layout>