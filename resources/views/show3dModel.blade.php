<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Document</title>
</head>
<body>
    <form action="{{ route('unity.store') }}" method="POST" id="file-upload" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">Model Name</label>
            <div class="col-md-6">
            <div class="row">
                <input id="name" type="name" class="form-control" name="name" required>
            </div>
            </div>
        </div>
      <div class="form-group row">
            <label for="file_type" class="col-md-4 col-form-label text-md-right">File Type</label>
            <div class="col-md-6">
            <div class="row">
              <select class="form-select" aria-label="Default select example" name="file_type" id="file_type">
                  <option value="gltf">GLTF</option>
                  <option value="obj">OBJ</option>
                  <option value="fbx">FBX</option>
              </select>
            </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="file" class="col-md-4 col-form-label text-md-right">Upload Main File</label>
            <div class="col-md-6">
            <div class="row">
                <input type="file" id="main"  class="form-control" name="main"  required>
            </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="file" class="col-md-4 col-form-label text-md-right">Upload Other Files</label>
            <div class="col-md-6">
            <div class="row">
                <input type="file" id="files"  class="form-control" name="files[]"  required multiple>
            </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="preview" class="col-md-4 col-form-label text-md-right">Upload Preview Image</label>
            <div class="col-md-6">
            <div class="row">
                <input type="file" id="preview"  class="form-control" name="preview"  required>
            </div>
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="button" class="btn btn-secondary" onclick="window.history.back()">Close</button>
                <button type="submit" class="btn btn-primary" id="product_save_btn">
                    Upload Model
                </button>
            </div>
        </div>
    </form>
</body>

<script src={{ asset('js/show3d.js') }} type="text/javascript"></script>
</html>