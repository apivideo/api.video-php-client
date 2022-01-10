@foreach($posts as $post)
    <div class="card" style="margin-bottom:20px;">
        <div class="card-header">
            <h3>{{ $post->Title}}</h3>
        </div>
        <div class="card-body">
            <p><iframe src="{{$post->MP4_Link}}"> </iframe></p>

        </div>
    </div>
@endforeach
