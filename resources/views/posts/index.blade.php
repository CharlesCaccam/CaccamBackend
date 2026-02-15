<!DOCTYPE html>
<html>
<head>
    <title>Posts</title>
</head>
<body>

<h1>All Posts</h1>

@foreach ($posts as $post)
    <div>
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->text }}</p>
        <hr>
    </div>
@endforeach

</body>
</html>
