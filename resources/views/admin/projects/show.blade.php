@include('admin.CommanFiles.header') 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
       
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          {{$project->name}}
            <small>Report</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Reports</li>
          </ol>
        </section>
        <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> Reports </h3>
            </div>
            <div class="box-body">
            <table id="example2" class="table table-bordered table-striped">
                                  <thead >
                                      <tr>
                                      <th style="text-align:center;">Engineer</th>
                                      <th style="text-align:center;">CheckIn</th>
                                      <th style="text-align:center;">CheckOut</th>
                                      <th style="text-align:center;">Engineer Report</th>
                                      <th style="text-align:center;">Details</th>
                                      </tr>
                                    </thead>
                                      <tbody>
                                          @foreach($reports as $row)
                                              <tr>
                                              <td style="text-align:center;">{{DB::table('users')->where('id',$row->engineer_id)->first()->name}}</td>
                                              <td style="text-align:center;">
                                              {{$row->check_in}}
                                              </td>
                                              <td style="text-align:center;">
                                              {{$row->check_out}}
                                              </td>
                                              <td style="text-align:center;">
                                              <?php echo $row->report;?>
                                              </td>
                                            
                                              <td style="text-align:center;"> 
                                              @if($row->editBy !=0 )
                                                Check out Edited By: {{DB::table('users')->where('id',$row->editBy)->first()->name}}
                                              @endif
                                              </td>
                                            
                                          @endforeach
                                                <tr>
                                                    <td style="text-align:center;background-color:#222d31;"><b style="color:white;">Taken:</b></td>
                                                    <td style="text-align:center;background-color:#222d31;"><b style="color:white;">{{$total}}</b></td>
                                                    <td style="text-align:center;background-color:#222d31;"><b style="color:white;">From</b></td>
                                                    <td style="text-align:center;background-color:#222d31;"><b style="color:white;">{{$project->hours_number}}</b></td>
                                                    <td></td>
                                                    
                                                </tr>
                                      </tbody>
                              </table>
              </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
</section>
    
</div>
<!-- /.content-wrapper -->
@include('admin.CommanFiles.footer')

<script>
    $(function () {
      $('#example2').DataTable({
        order: [],
        columnDefs: [ { orderable: false, targets: [0] } ],
        'searching'   : true,
        'scrollY'     : true,
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            
            {
                extend: 'pdfHtml5',
                messageTop:"This Report From {{$from}} To {{$to}}",
                title:"Project: {{$project->name}}"

            },
            {
                extend: 'print',
                messageTop:"This Report From {{$from}} To {{$to}}",
                title:"Project:  {{$project->name}}"
            }
        ],
        'scrollY'     : true,
        'paging'      : true,
        'lengthChange': true,
        'info'        : true,
        'autoWidth'   : true,
      })
    })
</script>