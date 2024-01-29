<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.css')
</head>

<body class="g-sidenav-show  bg-gray-200">
    @include('admin.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('admin.navbar')

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


        {{-- product layout --}}
     <div class="card p-5 m-5">
        <form action="{{ route('update-product-confirm', $product->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <h3>Update Product</h3>

            <div class="input-group input-group-dynamic mb-4">
                <input type="text" class="form-control" placeholder="Product Name" aria-label="Product Title" aria-describedby="basic-addon1" name="title"  value="{{$product->title}}" required>
            </div>
            
            <div class="input-group input-group-dynamic mb-4">
              <input type="text" class="form-control" placeholder="Short Description" aria-label="Short Description"  name="short_description" aria-describedby="basic-addon2" value="{{$product->short_description}}"  required>
            </div>
            
            
            <div class="input-group input-group-dynamic mb-4">
              <span class="input-group-text">UGX</span>
              <input type="number" class="form-control" placeholder="Price of Product"aria-label="Amount (in Uganda Shillings)" name="price" required value="{{$product->price}}" >
            </div>

            <div class="input-group input-group-dynamic mb-4">
                <span class="input-group-text">UGX</span>
                <input type="number" class="form-control" placeholder="Discount Price"aria-label="Amount (in Uganda Shillings)" name="discount_price" value="{{$product->discount_price}}" >
              </div>

            <div class="input-group input-group-dynamic mb-4">
                <textarea type="text" class="form-control" placeholder="Long Description" aria-label="Long description"  name="long_description" aria-describedby="basic-addon2" value="{{$product->long_description}}"></textarea>
              </div>

              <div class="input-group input-group-dynamic mb-4">
                <input type="text" class="form-control" placeholder="Brand" aria-label="Product Brand"  name="brand" aria-describedby="basic-addon2" required value="{{$product->brand}}" >
              </div>  

              <div class="input-group input-group-dynamic mb-4">
                <input type="number" class="form-control" placeholder="Product Quantity" aria-label="Product Quantity"  name="quantity" aria-describedby="basic-addon2" required value="{{$product->quantity}}" >
              </div> 

           

              <div class="input-group input-group-dynamic mb-4">
               
                <label for="">Current Image</label>
                <img src="/product/{{$product->image}}" alt="{{$product->title}}" width="100px" height="100px">
              </div>
              <div class="input-group input-group-dynamic mb-4">
               
                <input type="file" class="form-control" name="image" id="image" placeholder="Product Image" aria-label="Product Image" aria-describedby="basic-addon2">
              </div>

              <div class="input-group input-group-dynamic mb-4">
                <label for="category">Add Category</label>
                <select name="category" id="category">
                    <option value="{{$product->category}}" selected="">{{$product->category}}</option>
                    {{-- get all categories from db and display them --}}
                    @foreach ($category as $category)
                    <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                    @endforeach
                   
                </select>
              </div>
                   
              <div class="input-group input-group-dynamic mb-4">
                <label for="is_featured">Is Featured:</label>
                <input type="checkbox" name="is_featured" id="is_featured" value="{{$product->is_featured}}">
              </div>

              <div class="input-group input-group-dynamic mb-4">
                <label for="is_new_arrival">Is New Arrival:</label>
                <input type="checkbox" name="is_new_arrival" id="is_new_arrival" value="{{$product->is_new_arrival}}">
              </div>

              <div class="input-group input-group-dynamic mb-4">
                <label for="is_deal">Deal of the Day:</label>
                <input type="checkbox" name="is_deal" id="is_deal" value="{{$product->is_deal_of_the_day}}">
              </div>


              {{-- Meta Content --}}
              <div class="input-group input-group-dynamic mb-4">
                <input type="text" class="form-control" placeholder="Meta Title" aria-label="Meta Title"  name="meta_title" aria-describedby="basic-addon2" value="{{$product->meta_title}}">
              </div> 

              <div class="input-group input-group-dynamic mb-4">
                <input type="text" class="form-control" placeholder="Meta Description" aria-label="Meta Description"  name="meta_description" aria-describedby="basic-addon2" value="{{$product->meta_description}}">
              </div> 


            <button class="btn btn-lg btn-primary">Update Product</button>
                    </form>
     </div>
    </main>

    @include('admin.settings')
    @include('admin.scripts')
</body>

</html>
