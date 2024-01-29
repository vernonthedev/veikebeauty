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
                                <div class="alert alert message bg-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                    {{session()->get('message')}}
                                </div>
                                @endif
                            </div>
                        </div>
                        <form action="{{ url('/add_category')}}" method="post">
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

            </div>


        </div>

    </main>

    @include('admin.settings')
    @include('admin.scripts')
</body>

</html>
