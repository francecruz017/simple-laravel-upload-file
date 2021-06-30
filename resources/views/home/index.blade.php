@extends("layouts.app")

@section("content")

<form action="/file" method="post" enctype="multipart/form-data">
    @csrf
    <label style="color: #ccc">Select file to upload:</label>
    <input type="file" name="fileToUpload" />
    <button type="submit">Upload</button>
</form>

@if(session('filepath'))
<div>
    <h3 style="color: white;">Download last upload</h3>
    <a href={{ "/download?filepath=" . session('filepath') }} style="color: yellow;">Download here</a>
</div>
@endisset

@endsection