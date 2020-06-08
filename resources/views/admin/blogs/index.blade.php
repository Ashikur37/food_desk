@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-info">
                <div class="card-header">
                    <div class="card-title">
                       Blogs
                    </div>
                    <div class="card-tools">
                        <a class="btn btn-warning" href="{{ url('/admin/blogs/create') }}">Add New</a>
                    </div>
                </div>
                <div class="card-body">
                        <div class="table-responsive">
                                <table class="table table-bordered data-table">
                                        <thead>
                                             <tr>
                                                 <th>#</th><th>Title</th><th>Content</th><th>Image</th><th>Category</th><th>Actions</th>
                                          
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                        </div>
                </div>
            </div>
        </div>
    </section>
</div>
    @endsection
@section('script')
<script src="{{asset('admin/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script type="text/javascript">
 
    deleteData=(id)=>{
      url=`{{URL::to('/admin/blogs/${id}')}}`;
        $('<form action="'+url+'" method="post">@csrf @method("delete")</form>').appendTo('body').submit();
    }
    $(function () {
      
      var table = $('.data-table').DataTable({
           dom: 'Bfrtip',
       buttons: [
      {
        text: 'Excel',
        extend: 'excelHtml5',
        exportOptions: {
          columns: [1,2,3]
        }
      }, {
        text: 'CSV',
        extend: 'csvHtml5',
        exportOptions: {
          columns: [1,2,3]
        }
      }, {
        text: 'pdf',
        extend: 'pdfHtml5',
        exportOptions: {
          columns: [1,2,3]
        }
      }
    ],
          processing: true,
          serverSide: true,
          ajax: "{{ url('/admin/blogs') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'title', name: 'title'},{data: 'content', name: 'content'},{data: 'image', name: 'image'},{data: 'category', name: 'category'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
      
    });
  </script>
  @endsection
