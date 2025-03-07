<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details View</title>

    
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
<body class="gradient-custom">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-dark text-white">
                <div class="card-body p-5 text-center">

                     
                        <h2 class="fw-bold mb-4 text-uppercase">Order Details</h2>

                        
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Transaction No:</label>
                                <input type="text" class="form-control form-control-lg" value="{{ $trans_no }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Order No:</label>
                                <input type="text" class="form-control form-control-lg" value="{{ $order_no }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Item ID:</label>
                                <input type="text" class="form-control form-control-lg" value="{{ $item_id }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Name:</label>
                                <input type="text" class="form-control form-control-lg" value="{{ $name }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Price:</label>
                                <input type="text" class="form-control form-control-lg" value="{{ $price }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Quantity:</label>
                                <input type="text" class="form-control form-control-lg" value="{{ $qty }}" readonly>
                            </div>
                        </form>

                       
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
