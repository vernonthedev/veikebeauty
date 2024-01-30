<!DOCTYPE html>
<html lang="en">

<head>
    <base href="public">
    @include('admin.css')
</head>

<body class="g-sidenav-show  bg-gray-200">
    @include('admin.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('admin.navbar')

        {{-- Display any messages from the backend after successful message upload. --}}
        @if (session()->has('message'))
            <div class="alert alert message">
                <div class="alert alert-success alert-dismissible text-white fade show" role="alert">
                    <span class="alert-icon align-middle">
                        <span class="material-icons text-md">
                            thumb_up_off_alt
                        </span>
                    </span>
                    <span class="alert-text"><strong>Success!</strong>{{ session()->get('message') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


            </div>
        @endif

        {{-- All Order Data --}}
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Orders table</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Name</th>
                                            <th
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                                Email</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Address</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Phone</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Product Name</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Quantity</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Price</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Payment Status</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Delivery Status</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Image</th>

                                                <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Delivered</th>
                                                <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Print Order</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                        <tr>
                                            <td>
                                                
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="text font-weight-bold  text-primary mb-0">{{$order->name}}</p>
                                                        <a href="{{route('send-email',$order->id)}}" class="text-xs text-secondary mb-0">Send Email</a>
                                                    </div>
                                                
                                            </td>
                                            <td>
                                                <p class="text font-weight-bold mb-0" justify-content-center>{{$order->email}}
                                                </p>
                                            </td>
                                            <td>
                                                <p class="text font-weight-bold mb-0 justify-content-center">{{$order->address}}
                                                </p>
                                            </td>
                                            <td>
                                                <p class="text font-weight-bold mb-0 justify-content-center">{{$order->phone}}
                                                </p>
                                            </td>
                                            <td>
                                                <p class="text font-weight-bold mb-0 justify-content-center">{{$order->product_title}}
                                                </p>
                                            </td>
                                            <td>
                                                <p class="text font-weight-bold mb-0 justify-content-center">{{$order->quantity}}
                                                </p>
                                            </td>
                                            <td>
                                                <p class="text font-weight-bold mb-0 justify-content-center">{{$order->price}}
                                                </p>
                                            </td>
                                            <td>
                                                <p class="badge badge-sm bg-gradient-success">{{$order->payment_status}}
                                                </p>
                                            </td>
                                            <td>
                                                <p class="badge badge-sm bg-gradient-danger">{{$order->delivery_status}}
                                                </p>
                                            </td>
                                            <td>
                                               <img src="product/{{$order->image}}" alt="{{$order->product_title}}" width="70px;">
                                            </td>
                                            <td>
                                                {{-- set delivery status if item is successfully delivered --}}
                                                @if($order->delivery_status=='Processing')
                                                <a href="{{route('delivered',$order->id)}}" class="btn btn-sm btn-primary bg-gradient-info" onclick="return confirm('Are You Sure This Product was Delivered?')">Delivered
                                                </a>
                                                @else
                                                <p class="text font-weight-bold mb-0 justify-content-center">Delivered</p>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('print-pdf', $order->id)}}" class="badge badge-sm bg-gradient-success">PDF</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer py-4  ">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>
                                Veike Beauty Online Store Uganda
                            </div>
                        </div>

                    </div>
                </div>
            </footer>
        </div>

    </main>

    @include('admin.settings')
    @include('admin.scripts')
</body>

</html>
