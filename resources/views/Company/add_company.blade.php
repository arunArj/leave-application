@extends('layouts.admin')
@section('content')
<div class="container">
  <div class="row">
  <div class="col-6">
    <form id="companyForm">
        <div class="header">
            <h3>Company</h3>
        </div>
        <div class="form-group">
        <label for="company_name">Company Name</label>
        <input type="text" class="form-control" id="company_name" aria-describedby="emailHelp" placeholder="Enter Company Name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  </div>
  <div class="row mt-4 d-flex justify-content-evenly">
    <div class="col-8 flex-item ">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Company</th>

            </tr>
          </thead>
          <tbody id="compnayData">

          </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination page-links">

            </ul>
          </nav>
    </div>
    <div class="col-4 flex-item">
        <div class="update-div">
            <form id="companyUpdateForm">
                <div class="header">
                    <h3>Update</h3>
                </div>
                <div class="form-group">
                <label for="company_update">Company Name</label>
                <input type="text" class="form-control" id="company_update" aria-describedby="company_update" placeholder="Enter Company Name">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <input type="hidden" class="form-control" id="cmpnyUpdateId" aria-describedby="cmpnyUpdateId">
        </div>
        <div class="remove-div">
            <form id="companyDeleteForm" method="POST" action="company/remove">
                <input type="submit" class="btn btn-danger" value="Remove">
            </form>
        </div>
    </div>


  </div>
</div>
@endsection
@section('footer-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>

$(document).ready(function () {
    var base = window.location.origin;
    var i=0;
    loadData(base + "/api/v1/companys")

function loadData(url){

    $.ajax({
        type: "GET",
        url :url,
        dataType : "json",
        success:function (response) {
            var content = response.data.map(modifyData)
            $('#compnayData').html(content)
            console.log(response)
            $('.page-links').html('')
            if(response.links.prev!=null)
            $('.page-links').append('<li class="page-item"><a class="page-link" href="'+response.links.prev+'" >prev</a></li>')
            for(i=response.meta.current_page-2;i<=response.meta.current_page+2;i++){

                if(i<1 || i>response.meta.last_page){
                    continue
                }
                $('.page-links').append('<li class="page-item"><a class="page-link" href="/api/v1/companys/?page='+i+'" id="nav'+i+'">'+i+'</a></li>')
            }
            if(response.links.next!=null)
            $('.page-links').append('<li class="page-item"><a class="page-link" href="'+response.links.next+'">next</a></li>')
    },
    error: function (response){
        console.log(response)
        swal('error', "failed to load content")
    }
    });
}

function modifyData(record){
    i=i+1;
    return '<tr><td>'+i+'</td><td class="cmpnyTd"><button type="button" id="btn'+i+'" class="comp btn btn-outline">'+record.companyName+
        '</button><input type="hidden" class="cmpnyName" value="'+record.companyName+'"><input type="hidden" id="cmpnyId" class="" value="'+record.id+'"></td></tr>';

}
$(document).on('click', '.page-link', function (e) {
    e.preventDefault();
    var url = $(this).attr('href');
    loadData(url)
});

  $("#companyForm").submit(function (event) {

    if($("#company_name").val() ==''){
        alert('company name field required')
        return false
    }
    var formData = {
      companyName: $("#company_name").val()
    };
    $.ajax({
      type: "POST",
      url: base + "/api/v1/companys",
      data: formData,
      dataType: "json",
    }).done(function (data) {
        swal('success', "Added successfully")
        location.reload();
    });

    event.preventDefault();
  });



  $("#companyUpdateForm").submit(function (event) {
    if($("#company_update").val() ==''){
        alert('company name field required')
        return false
    }
    var formData = {
      companyName: $("#company_update").val()
    };
    id = $("#cmpnyUpdateId").val()
    $.ajax({
      type: "PUT",
      url: base + "/api/v1/companys/"+id,
      data: formData,
      dataType: "json",
    }).done(function (data) {
        swal('success', "updated successfully")
        location.reload();
    });

    event.preventDefault();
  });




$("#companyDeleteForm").submit(function (event) {
    if($("#company_update").val() ==''){
        alert('company name field required')
        return false
    }
    id = $("#cmpnyUpdateId").val()
    $.ajax({
      type: "DELETE",
      url: base + "/api/v1/companys/"+id,
      dataType: "json",
    }).done(function (data) {
        swal('success','company removed')
        location.reload();
    });

    event.preventDefault();
  });
});
    </script>
<script>
    $(document).ready(function () {
        $(document).on('click', '.comp', function () {
    var company =$(this).closest('.cmpnyTd').find('.cmpnyName').val();
    var companyId =$(this).closest('.cmpnyTd').find('#cmpnyId').val();

    $('#company_update').val(company)
    $('#cmpnyUpdateId').val(companyId)

});
});



</script>
@endsection
