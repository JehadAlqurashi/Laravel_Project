<html>

<head>
    <title>create Offers</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
    <body>
        <form action="{{route("offers.store")}}" method="POST">
            <div class="form-group">
              <label for="exampleInputEmail1">Name Offers</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" placeholder="Offer Name">
              @error("name")
              <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
              @enderror
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Price</label>
              <input type="text" class="form-control" name="price" id="exampleInputPassword1" placeholder="Price of offer">
              @error("price")
              <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
              @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Details</label>
                <input type="text" class="form-control" name="details" id="exampleInputPassword1" placeholder="Details of offer">
                @error("details")
                <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                @enderror
                @csrf
              </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </body>
</html>
