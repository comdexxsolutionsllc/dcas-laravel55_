<div class="row">
    <div class="col-md-6">
        <h2 class="text-md-center mb-5 mt-5">Create New Profile</h2>
        <form method="post" action="/dashboard/profile" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="text" class="form-control" name="biography" placeholder="Enter your biography">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="address_1" placeholder="Enter your address">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="address_2" placeholder="Enter your address">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="city" placeholder="Enter your city">
            </div>
            <div class="form-group">
                {{-- Change to dropdown --}}
                <input type="text" class="form-control" name="state" placeholder="Enter your state">
            </div>
            <div class="form-group">
                {{-- Change to dropdown --}}
                <input type="text" class="form-control" name="country" placeholder="Enter your country">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="postal_code" placeholder="Enter your postal code">
            </div>
            <div class="form-group">
                <label class="custom-file form-control">
                    <input type="file" name="avatar" class="custom-file-input">
                    <span class="custom-file-control"></span>
                </label>
            </div>
            <button type="submit" class="btn btn-primary form-control">Create</button>
        </form>
    </div>
</div>
