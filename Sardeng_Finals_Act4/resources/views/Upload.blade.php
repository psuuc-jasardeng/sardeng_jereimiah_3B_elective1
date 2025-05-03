<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Image Upload (Single + Multiple)</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .card-img-top {
            width: 100%;
            height: auto;
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
        }
        .delete-btn {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h1 class="mb-4">Single Image Upload</h1>
        <form action="{{ route('photos.store.single') }}" method="POST" enctype="multipart/form-data" class="mb-5">
            @csrf
            <div class="mb-3">
                <label for="singleImage" class="form-label">Choose an image</label>
                <input type="file" name="image" id="singleImage" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>

        <h1 class="mb-4">Multiple Images Upload</h1>
        <form action="{{ route('photos.store.multiple') }}" method="POST" enctype="multipart/form-data" class="mb-5">
            @csrf
            <div class="mb-3">
                <label for="multipleImages" class="form-label">Choose images</label>
                <input type="file" name="images[]" id="multipleImages" class="form-control" multiple required>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h2 class="mb-4">Uploaded Images</h2>
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach($photos as $photo)
                <div class="col">
                    <div class="card">
                        <img src="{{ asset('images/' . $photo->image) }}" class="card-img-top" alt="Uploaded Image">
                        <div class="card-body text-center">
                            <form action="{{ route('photos.destroy', $photo->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm delete-btn">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            @if ($photos->hasPages())
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <!-- Previous Page Link -->
                        <li class="page-item {{ $photos->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $photos->previousPageUrl() }}" aria-label="Previous">Previous</a>
                        </li>

                        <!-- Next Page Link -->
                        <li class="page-item {{ !$photos->hasMorePages() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $photos->nextPageUrl() }}" aria-label="Next">Next</a>
                        </li>
                    </ul>
                    <p class="text-center mt-2">
                        Showing {{ $photos->firstItem() }} to {{ $photos->lastItem() }} of {{ $photos->total() }} results
                    </p>
                </nav>
            @endif
        </div>
    </div>

    <!-- Bootstrap 5 JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <!-- Custom JavaScript for fading alert -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const alert = document.getElementById('successAlert');
            if (alert) {
                setTimeout(function () {
                    alert.classList.remove('show');
                    alert.classList.add('fade');
                    setTimeout(function () {
                        alert.remove();
                    }, 500); // Wait for fade transition to complete
                }, 2000); // Fade out after 2 seconds
            }
        });
    </script>
</body>
</html>