
<x-app-layout>
  <x-slot name="header">
    URL Shortener
  </x-slot>
  <link rel="stylesheet" href="<?= asset('css/bootstrap.min.css') ?>">
  <div class="container">
    <br>
    <br>
    @if (session('success') )
      <div class="alert alert-success">
         {{ session('success')}}
         {{Session::forget('success')}}
      </div> 
    @endif
    
    <form action="{{ route('short_url') }}" method="post">
              @csrf
              <div class="form-group">
                <input type="text" id="longurl" name="longurl" class="form-control" placeholder="Enter URL">
                <br>
                  <button class="btn btn-dark" type="submit">Submit</button>
              </div>
          </form>

    @if($shorturl ?? '')

   
    <h3>your short url : <a href= "{{$shorturl->longurl}}" target="_blank">  {{url($shorturl->shorturl)}} </a> </h3>
   @endif
</div>

</x-app-layout>

