<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo config('app.name') ?></title> 
    <link rel="stylesheet" href="<?= asset('css/bootstrap.min.css') ?>">
</head>
<body>

    <div class="container">
        <br>
        <br>
        <br>
        <h1 class="mb-3">URL Shortener</h1>
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
</body>
</html>