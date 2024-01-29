<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.css')
</head>

<body class="g-sidenav-show  bg-gray-200">
    @include('admin.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('admin.navbar')
        {{-- All products view --}}
       
        <div class="card m-5 p-5">
            <h4 class="m3 pl-3">Available Products</h4>
            <div class="table-responsive">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary font-weight-bolder">Product Name</th>
                    <th class="text-uppercase text-secondary font-weight-bolder ps-2">Brand</th>
                    <th class="text-center text-uppercase text-secondary font-weight-bolder ">Price</th>
                    <th class="text-center text-uppercase text-secondary font-weight-bolder ">Quantity</th>
                    <th class="text-center text-uppercase text-secondary font-weight-bolder ">Category</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>


@foreach ($data as $product)
    

                  <tr>
                    {{-- col 1 --}}
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img src="/product/{{$product->image}}" class="avatar avatar-xl me-3">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-m">{{$product->title}}</h6>
                          <p class="text-m text-secondary mb-0">{{$product->short_description}}</p>
                        </div>
                      </div>
                    </td>
{{-- col 2 --}}
<td class="align-middle text-center">
    <span class="text-secondary text-m font-weight-normal">{{$product->brand}}</span>
  </td>
                    {{-- col-3 --}}
                    <td class="align-middle text-center">
                        <span class="text-secondary text-m font-weight-normal">{{$product->price}}</span>
                      </td>
                    {{-- col-4 --}}
                    <td class="align-middle text-center">
                      <span class="text-secondary text-m font-weight-normal">{{$product->quantity}}</span>
                    </td>
                    {{-- col-5 --}}
                    <td class="align-middle text-center">
                        <span class="text-secondary text-m font-weight-normal">{{$product->category}}</span>
                      </td>

                    <td class="align-middle">
                      <a href="javascript:;" class="btn btn-warning text-primary font-weight-normal text-m" data-toggle="tooltip" data-original-title="Edit user">
                        Edit
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
    </main>

    @include('admin.settings')
    @include('admin.scripts')
</body>

</html>
