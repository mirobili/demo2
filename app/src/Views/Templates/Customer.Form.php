<?php
//$id = 123456;
//$name = 'miro balearski';
//$address = 'sofia 1000';
//$phone = '+3598812345689';
//$email = 'allaballa@gmail.com';
//$created_at = 'created';
//$updated_at = "updated";
//

//extract($data);

?>
<!--- <form method="POST" action="/customer/save" enctype="multipart/form-data"> -->
<form method="POST" action="/customer/save"  >
    <div class="form-group">
         <label for="id">Id</label>
        <input type="hidden" name="id" id="id" value="{{id}}" class="form-control"> {{id}}
    </div>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{name}}" class="form-control">
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" id="address" value="{{address}}" class="form-control">
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone" value="{{phone}}" class="form-control">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="{{email}}" class="form-control">
    </div>
    <div class="form-group">
        <label for="created_at">Created At</label>
        <input type="text" name="created_at" id="created_at" value="{{created_at}}" readonly class="form-control">
    </div>
    <div class="form-group">
        <label for="updated_at">Updated At</label>
        <input type="text" name="updated_at" id="updated_at" value="{{updated_at}}" readonly class="form-control">
    </div>


    <div class="form-group">
        <input type="submit" value="Save" hx-get="customer/save" class="btn btn-success">
    </div>
</form>