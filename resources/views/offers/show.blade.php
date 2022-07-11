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
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">OFFER NAME</th>
                <th scope="col">PRICE</th>
                <th scope="col">DETAILS</th>
              </tr>
            </thead>
            <tbody>

                    @foreach($offers as $offer)
                    <tr>
                    <td>{{$offer->id}}</td>
                    <td>{{$offer->name}}</td>
                    <td>{{$offer->price}}</td>
                    <td>{{$offer->details}}</td>
                    </tr>
                    @endforeach


            </tbody>
          </table>
    </body>
</html>
