@extends('layouts.app')
@section('content')



<div class="container-fluid app-body settings-page">
    <div class="card">
      <h3>Recent Posts sent to Buffer</h3>
      <div class="row">
         <div class="col-sm-12">
           <div class="col-sm-4">
             <input type="search" id="search" class="form-control" placeholder="Search">
           </div>
           <div class="col-sm-2">
           <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' name="dateFilter" class="form-control" id="datepicker" placeholder="Date"/>
                </div>
            </div>
           </div>
           <div class="col-sm-3">
              <select class="form-control" id="posts">
                <option>All Group</option>
                @foreach($buffer_posts as $buffer_post)
                <option>{{ $buffer_post->groupInfo->type ?? ''}}</option>
                @endforeach
              </select>
           </div>
         </div>
      </div>
      <div class="card-body">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Group Name</th>
                    <th>Group Type</th>
                    <th>Account Name</th>
                    <th>Post Text</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
            @foreach($buffer_posts as $buffer_post)
                <tr>
                    <td>{{ $buffer_post->groupInfo->name ?? '' }}</td>
                    <td>{{ $buffer_post->groupInfo->type ?? ''}}</td>
                    <td>
                    {{$buffer_post->accountInfo->name}}
                       <!-- <img src="{{ asset('public/avatar/'. $buffer_post->accountInfo->avatar) }}" height="50" width="50">  -->
                    </td>
                    <td>{{ $buffer_post->post_text }}</td>
                    <td>{{ $buffer_post->created_at }}</td>
                </tr>
                
            @endforeach
            </tbody>
            
        </table>
      </div>
      <div class="text-center">
      {{ $buffer_posts->links() }}
      </div>
    </div>

</div>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>


<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#example tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

  $("#posts").click(function() {
    var value = $(this).val().toLowerCase();
    $("#example tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > 0)
    });
  });

});
</script>

<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker();
    });
</script>  

<script>  
       $(document).ready(function(){          
                var oTable = $('#example').dataTable({
 
                });
 
                $('#datepicker').datepicker({
                    dateFormat: "yy-mm-dd",
                    showOn: "button",
                    buttonImageOnly: "true",
                    buttonImage: "datepicker.png",
                    weekStart: 1,
                    changeMonth: "true",
                    changeYear: "true",
                    daysOfWeekHighlighted: "0",
                    autoclose: true,
                    todayHighlight: true
                });
 
// Add event listeners to the two range filtering inputs
                $('#min).change(function(){ oTable.fnDraw(); });
            });  
 </script> 

@endsection