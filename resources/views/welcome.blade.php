<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All</title>
</head>
<body>

    @unless (count($listings) == 0)        
        @foreach($listings as $key => $listing) 
        <h1> <a href="/listing/{{$listing['id']}}">{{ $listing['title'] }}</a></h1>
        <p>{{ $listing['description'] }}</p>
        @endforeach
    @else
        <p>Nothing</p>
    @endunless
    
</body>
</html>