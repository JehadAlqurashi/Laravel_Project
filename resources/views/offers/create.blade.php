<html>

<head>
    <title>create Offers</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <li class="nav-item active">
          <a class="nav-link" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }} <span class="sr-only">(current)</span></a>
        </li>
        @endforeach

      </ul>

    </div>
  </nav>
    <body>
        <form action="{{route("offers.store")}}" method="POST">
            @if(session('message'))
            {{ session('message') }}
            @endif
            <div class="form-group">
              <label for="exampleInputEmail1">{{__('check.Name Offers en')}}</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="name_en" aria-describedby="emailHelp" placeholder="{{__('check.Name Offers')}}">
              @error("name_en")
              <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
              @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">{{__('check.Name Offers ar')}}</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="name_ar" aria-describedby="emailHelp" placeholder="{{__('check.Name Offers')}}">
                @error("name_ar")
                <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                @enderror
              </div>
            <div class="form-group">
              <label for="exampleInputPassword1">{{__('check.price')}}</label>
              <input type="text" class="form-control" name="price" id="exampleInputPassword1" placeholder="Price of offer">
              @error("price")
              <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
              @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">{{__('check.details en')}}</label>
                <input type="text" class="form-control" name="details_en" id="exampleInputPassword1" placeholder="Details of offer">
                @error("details_en")
                <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                @enderror
                @csrf
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">{{__('check.details ar')}}</label>
                <input type="text" class="form-control" name="details_ar" id="exampleInputPassword1" placeholder="Details of offer">
                @error("details_ar")
                <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                @enderror
                @csrf
              </div>
            <button type="submit" class="btn btn-primary">{{__('check.submit')}}</button>
          </form>
    </body>
</html>
