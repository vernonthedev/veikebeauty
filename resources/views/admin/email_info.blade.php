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
        <h4>Sending Email to {{$order->email}}</h4>

        <form action="{{route('send-user-email',$order->id)}}" method="post" class="card justify-content-center">
            @csrf
            <div class="card-body p-2 m-5">
                <div class="row">
                    <input type="text" placeholder="Enter Greeting" name="greeting"
                        class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row w-50">
                </div><br>
                <div class="row">
                    <input type="text" placeholder="Enter First Line" name="firstline"
                        class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row w-50">
                </div><br>
                <div class="row">
                    <input type="text" placeholder="Enter Body" name="body"
                        class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row w-50">
                </div><br>

                <div class="row">
                    <input type="text" placeholder="Enter Button Name" name="button"
                        class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row w-50">
                </div><br>
                <div class="row">
                    <input type="text" placeholder="Enter Url" name="url"
                        class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row w-50">
                </div><br>
                <div class="row">
                    <input type="text" placeholder="Enter LastLine" name="lastline"
                        class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row w-50">
                </div><br>
                <div class="row">
                    <input type="submit" value="Send Email" class="btn btn-lg btn-gradient-primary">
                </div><br>

            </div>

        </form>

    </main>

    @include('admin.settings')
    @include('admin.scripts')
</body>

</html>
