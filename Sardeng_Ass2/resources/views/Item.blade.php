<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item View</title>

    <!-- ✅ Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        
         body {
            background-color: #E1D9D1;
            min-height: 100vh; 
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            border-radius: 1rem;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="gradient-custom d-flex justify-content-center align-items-center">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-dark text-white" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">

                    <!-- ✅ Header -->
                    <h2 class="fw-bold mb-4 text-uppercase">Item Details</h2>

                    <!-- ✅ Item Details Form -->
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Item No:</label>
                            <input type="text" class="form-control form-control-lg" value="{{ $item_no }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Name:</label>
                            <input type="text" class="form-control form-control-lg" value="{{ $name }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Price:</label>
                            <input type="text" class="form-control form-control-lg" value="{{ $price }}" readonly>
                        </div>
                    </form>

                

                </div>
            </div>
        </div>
    </div>
</div>

<!-- ✅ Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
