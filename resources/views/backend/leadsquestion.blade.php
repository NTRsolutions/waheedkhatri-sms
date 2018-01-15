@extends('backend.layouts.app')
@section('pagecss')
  <!-- Datatables -->
  {{--<link href="{{asset('/admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">--}}
  {{--<link href="{{asset('/admin/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">--}}
  {{--<link href="{{asset('/admin/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">--}}
  {{--<link href="{{asset('/admin/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">--}}
  {{--<link href="{{asset('/admin/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">--}}
@endsection
@section('content')
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Leads Records</h3>
        </div>

        <div class="pull-right">
          <a href="{{ route('add_lead') }}" >
            <button type="button" class="btn btn-success">Add Lead</button>
          </a>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Leads <small>Category</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>

                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br>
              @if (Session::get('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
              @endif
              @if (Session::get('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
              @endif
              <br>
              <table id="datatable" class="table table-striped table-bordered">
                <thead>
                <tr>
                  <th>Question</th>
                  <th>Answer</th>
                  <th>Static Reply</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if($leadsDetail)
                  @foreach($leadsDetail as $question_id)
                    <tr>
                      <td>{{ $question_id->question }}</td>
                      <td>{{ $question_id->answer }}</td>
                      <td>{{ $question_id->static_reply }}</td>
                      <td>
                        <a href="{{ route('delete-question', $question_id->id) }}" >
                          <button type="button" class="btn btn-danger">Delete</button>
                        </a>
                      </td>

                    </tr>
                  @endforeach
                @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  @stop
  @section('pagejs')
    <!-- Datatables -->
      <script src="{{asset('/admin/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  {{--<script src="{{asset('/admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>--}}
  {{--<script src="{{asset('/admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>--}}
  {{--<script src="{{asset('/admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>--}}
  {{--<script src="{{asset('/admin/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>--}}
  {{--<script src="{{asset('/admin/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>--}}
  {{--<script src="{{asset('/admin/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>--}}
  {{--<script src="{{asset('/admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>--}}
  {{--<script src="{{asset('/admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>--}}
  {{--<script src="{{asset('/admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>--}}
  {{--<script src="{{asset('/admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>--}}
  {{--<script src="{{asset('/admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>--}}
  {{--<script src="{{asset('/admin/vendors/jszip/dist/jszip.min.js')}}"></script>--}}
  {{--<script src="{{asset('/admin/vendors/pdfmake/build/pdfmake.min.js')}}"></script>--}}
  {{--<script src="{{asset('/admin/vendors/pdfmake/build/vfs_fonts.js')}}"></script>--}}
@endsection