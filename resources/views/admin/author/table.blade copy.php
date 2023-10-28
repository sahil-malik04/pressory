@extends('layouts.app')
<link href="{{ asset('assets/aggrid-css/ag-grid.css') }}" rel="stylesheet">
<link href="{{ asset('assets/aggrid-css/ag-theme-alpine.css') }}" rel="stylesheet">
<script src="{{ asset('assets/js/ag-grid/ag-grid.js') }}"></script>
@section('content')

<div class="right_col" role="main">
        <!-- <a href="javascript:void(0)" onclick="openNav()" class="btn btn-primary float-right">Add Author</a> -->
        @if(Session::has('message'))
                <a class="alert alert-primary">{{session('message')}}</a>
            @endif
            @if($errors->any())
                <p class="alert alert-danger">{!! implode('', $errors->all('<div>:message</div>')) !!}</p>
            @endif
            <div class="container">
    <a href="javascript:void(0)" onclick="openNav()" class="btn btn-primary ">Add Author</a>
        <!-- <div class="example-header">
            Page Size:
            <select onchange="onPageSizeChanged()" id="page-size">
                <option value="10" selected>10</option>
                <option value="100">100</option>
                <option value="500">500</option>
                <option value="1000">1000</option>
            </select>
        </div> -->
        <div id="myGrid" class="ag-theme-alpine" style="height:auto"></div>
    </div> 
</div>    
    
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <h3 class="text-center">Add Author</h3>
    <form method="post" action="{{ route('author.add') }}">
                @csrf
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="author">Author Name <span class="required">*</span>
                    </label>
                    <div class="col-md-8 col-sm-6 ">
                        <input type="text" id="author"  name="author_name" required="required" class="form-control ">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="nationality">Nationality <span class="required">*</span>
                    </label>
                    <div class="col-md-8 col-sm-6 ">
                        <input type="text" id="nationality"  name="nationality" required="required" class="form-control ">
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>

            </form>
</div>
<script type="text/javascript" charset="utf-8">

// specify the columns

const columnDefs = [
    { field: "id", sortable: true, filter: true,resizable:true },
    { field: "author_name", sortable: true, filter: true,resizable:true},
    { field: "nationality", sortable: true, filter: true,resizable:true},
    { field: '',resizable:true,cellRenderer: 'btnCellRenderer', cellRendererParams: {
                    clicked: function() {
                    window.location.href="/author/edit/"+this.data.id;
                }
            },
        },
    { field: '',resizable:true, cellRenderer: 'delBtnRenderer', cellRendererParams: {
        clicked: function() {
                    window.location.href="/author/delete/"+this.data.id;
                // alert(this.data.id);
                }
            },
        },
    ];

    // let the grid know which columns to use
    const gridOptions = {
        columnDefs: columnDefs,
    groupSelectsChildren: true,
    rowSelection: 'multiple',
    paginationAutoPageSize:true,
    pagination: true,
    paginationPageSize: 10, //pagesize
    sideBar: 'filters',
    rowModelType: 'serverSide',
    defaultColDef: {
        flex: 1,
        minWidth: 100,
        // allow every column to be aggregated
        enableValue: true,
        // allow every column to be grouped
        enableRowGroup: true,
        // allow every column to be pivoted
        enablePivot: true,
        sortable: true,
        filter: true,
    },
    sideBar: {
            toolPanels: [
                {
                    id: 'columns',
                    labelDefault: 'Columns',
                    labelKey: 'columns',
                    iconKey: 'columns',
                    toolPanel: 'agColumnsToolPanel',
                    minWidth: 225,
                    width: 225,
                    maxWidth: 225,
                },
                {
                    id: 'filters',
                    labelDefault: 'Filters',
                    labelKey: 'filters',
                    iconKey: 'filter',
                    toolPanel: 'agFiltersToolPanel',
                    minWidth: 180,
                    maxWidth: 400,
                    width: 250
                }
            ],
            position: 'top',
            defaultToolPanel: 'filters'
        },  
        components: {
            btnCellRenderer: BtnCellRenderer,
            delBtnRenderer: delBtnRenderer,
        }
    };

    
        // lookup the container we want the Grid to use
  const eGridDiv = document.querySelector('#myGrid');
    
  // create the grid passing in the div to use together with the columns & data we want to use
  new agGrid.Grid(eGridDiv, gridOptions);
  
  // fetch the row data to use and one ready provide it to the Grid via the Grid API
  fetch('http://127.0.0.1:8000/api/author/all')
  .then((response) => response.json())
    .then(function (data) {
      // setup the fake server with entire dataset
    //   var fakeServer = createFakeServer(data);

      // create datasource with a reference to the fake server
      var datasource = createServerSideDatasource(data);

      // register the datasource with the grid
      gridOptions.api.setServerSideDatasource(datasource);
    });


function BtnCellRenderer() {}

BtnCellRenderer.prototype.init = function(params) {
    this.params = params;
    
    this.eGui = document.createElement('div');
    this.eGui.innerHTML = 'Edit';
    
    this.btnClickedHandler = this.btnClickedHandler.bind(this);
    this.eGui.addEventListener('click', this.btnClickedHandler);
    
}

BtnCellRenderer.prototype.getGui = function() {
  return this.eGui;
}

BtnCellRenderer.prototype.destroy = function() {
  this.eGui.removeEventListener('click', this.btnClickedHandler);
}

BtnCellRenderer.prototype.btnClickedHandler = function(event) {
  this.params.clicked(this.params.value);
}

function delBtnRenderer() {}

delBtnRenderer.prototype.init = function(params) {
    this.params = params;
    
    this.eGui = document.createElement('div');
    this.eGui.innerHTML = 'Delete';
    
    this.btnClickedHandler = this.btnClickedHandler.bind(this);
    this.eGui.addEventListener('click', this.btnClickedHandler);
    
}

delBtnRenderer.prototype.getGui = function() {
  return this.eGui;
}

delBtnRenderer.prototype.destroy = function() {
  this.eGui.removeEventListener('click', this.btnClickedHandler);
}

delBtnRenderer.prototype.btnClickedHandler = function(event) {
  this.params.clicked(this.params.value);
}


function createServerSideDatasource(server) {
  return {
    getRows: function (params) {
      console.log('[Datasource] - rows requested by grid: ', params.request);

      // get data for request from our fake server
      var response = server.getData(params.request);

      // simulating real server call with a 500ms delay
      setTimeout(function () {
        if (response.success) {
          // supply rows for requested block to grid
          params.success({ rowData: response.rows });
        } else {
          params.fail();
        }
      }, 500);
    },
  };
}

function createFakeServer(allData) {
    console.log(allData);
  return {
    getData: function (request) {
      // take a copy of the data to return to the client
      var requestedRows = allData.slice();

      return {
        success: true,
        rows: requestedRows,
      };
    },
  };
}

</script>


@endsection