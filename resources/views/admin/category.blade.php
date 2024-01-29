{{-- Categories page layout --}}

<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
</head>

<body class="g-sidenav-show  bg-gray-200">
    @include('admin.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('admin.navbar')
        {{-- layout code --}}
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-xl-6 mb-xl-0 mb-4">

                        </div>
                        <div class="col-xl-6">
                            <div class="row">
                                {{-- Display any messages from the backend after successful message upload. --}}
                                @if(session()->has('message'))
                                <div class="alert alert message">
                                    <div class="alert alert-success alert-dismissible text-white fade show" role="alert">
                                        <span class="alert-icon align-middle">
                                          <span class="material-icons text-md">
                                          thumb_up_off_alt
                                          </span>
                                        </span>
                                        <span class="alert-text"><strong>Success!</strong>{{session()->get('message')}}</span>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                  
                                    
                                </div>
                                @endif
                            </div>
                        </div>
                        <form action="{{ route('add-category')}}" method="post">
                            @csrf
                            <div class="col-md-12 mb-lg-0 mb-4">
                                <div class="card mt-4">
                                    <div class="card-header pb-0 p-3">
                                        <div class="row">
                                            <div class="col-6 d-flex align-items-center">
                                                <h6 class="mb-0">Add Categories</h6>
                                            </div>
                                            <div class="col-6 text-end">
                                                <button type="submit" class="btn bg-gradient-dark mb-0"
                                                    href="javascript:;"><i
                                                        class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New
                                                    Category</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="row">
                                            <input type="text" placeholder="Enter Category" name="category"
                                                class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card h-100">
                      <div class="card-header pb-0 p-3">
                        <div class="row">
                          <div class="col-6 d-flex align-items-center">
                            <h4 class="mb-0">Categories</h4>
                          </div>
                          <div class="col-6 text-end">
                            <button class="btn btn-outline-primary btn-sm mb-0">Actions</button>
                          </div>
                        </div>
                      </div>
                      <div class="card-body p-3 pb-0">
                        <ul class="list-group">
                            @foreach ($data as $data)
                                
                            
                          <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                            <div class="d-flex flex-column">
                              <h3 class="mb-1 text-dark font-weight-bold text-sm">{{$data->category_name}}</h3>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                              <a onclick="return confirm('Are You Sure You Want To Delete This?')" href="{{ route('delete-category',$data->id)}}" class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="material-icons delete-lg position-relative me-1">delete</i> Delete</a>
                            </div>
                          </li>
                          @endforeach
                        </ul>
                      </div>
                    </div>
                  </div>

            </div>


        </div>
        

    </main>

    @include('admin.settings')
    @include('admin.scripts')
</body>

</html>
