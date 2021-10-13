<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Upload a Video</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <form action="/upload" enctype="multipart/form-data" method="post">
            @csrf
            <div class="row">
                <h1>Upload a Video</h1>
            </div>
            <div class="form-group row">
                <label for="title" class="col-sm-3 col-form-label">Video Title</label>
                <div class="col-sm-9">
                    <input name="title" type="text" class="form-control" id="title" placeholder="Video Title">
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-9">
                    <input name="description" type="text" class="form-control" id="description" placeholder="Description">
                </div>
            </div>
            <div class="form-group row">
                <label for="public" class="col-sm-3 col-form-label">Public? (Click for No)</label>
                <div class="col-sm-9">
                    <input name="public" type="radio" class="form-control" id="public" placeholder="Public">
                </div>
            </div>
            <div class="form-group row">
                <label for="mp4support" class="col-sm-3 col-form-label">MP4 Support? (Click for No)</label>
                <div class="col-sm-9">
                    <input name="mp4support" type="radio" class="form-control" id="mp4support" placeholder="MP4 Support?">
                </div>
            </div>
            <div class="form-group row">
                <label for="video" class="col-sm-3 col-form-label">Upload Video</label>
                <div class="col-sm-9">
                    <input name="video" type="file" id="video">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>
</html>
