@extends('layouts.admin')
<link href="{{ asset('assets/aggrid-css/ag-grid.css') }}" rel="stylesheet">
<link href="{{ asset('assets/aggrid-css/ag-theme-alpine.css') }}" rel="stylesheet">
<script src="{{ asset('assets/js/ag-grid/ag-grid.js') }}"></script>
@section('content')
<div class="right_col" role="main">
  
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h2 class="text-left font-weight-bold label label-default">Fallacy</h2>
            </div>
            <div class="col-md-2">
            <a href="javascript:void(0)" class="btn btn-primary sidebar-action-open">Add Fallacy</a>
            </div>
        </div>
        <!-- <a href="javascript:void(0)" class="btn btn-primary sidebar-action-open">Add Fallacy</a> -->
        <!-- <div class="example-header">
    Page Size:
    <select onchange="onPageSizeChanged()" id="page-size">
			<option value="10" selected>10</option>
			<option value="100">100</option>
			<option value="500">500</option>
			<option value="1000">1000</option>
		</select>
	</div> -->
        <div id="myGrid" class="ag-theme-alpine" style="height:auto">
        </div>
    </div>     
   
@section('sidebar-title')
Add Fallacy
 @endsection

@section('sidebar')
    <form method="post" action="{{ route('fallacy.add') }}" id="fallacyForm" class="px-4">
        @csrf
        <div class="form-group">
            <label class="col-form-label label-align" for="Fallacy">Fallacy <span class="required">*</span>
            </label>
            <div>
                <input type="text" id="fallacy"  name="fallacy" required="required" class="form-control ">
            </div>
        </div>
        <div class="form-group">
            <label class="col-form-label label-align" for="Code">Code <span class="required">*</span>
            </label>
            <div>
                <input type="text" id="code"  name="code" required="required" class="form-control ">
            </div>
        </div>
        <div class="form-group">
            <label class="col-form-label label-align" for="email">Description <span class="required">*</span>
            </label>
            <div>
            <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
            </div>
            
        </div>
        
        
        
        <div class="ln_solid"></div>
        <div class="form-group">
            <div>
                <button type="submit" class="btn btn-success float-right">Save</button>
            </div>
        </div>

    </form>
@endsection     
<script type="text/javascript" charset="utf-8">
agGrid.LicenseManager.setLicenseKey('CompanyName=Pressory,LicensedApplication=Pressory,LicenseType=SingleApplication,LicensedConcurrentDeveloperCount=1,LicensedProductionInstancesCount=0,AssetReference=AG-026074,ExpiryDate=6_March_2023_[v2]_MTY3ODA2MDgwMDAwMA==35313d3bc79f875d0220cfce40b29f1c');
// specify the columns
var hashValueGetter = function (params) {
  return params.node ? params.node.rowIndex + 1 : null;
};
const columnDefs = [
    { field: "#", valueGetter:hashValueGetter,sortable: true, filter: false,resizable:true,floatingFilter: true,suppressMenu: true },
    { field: "fallacy", sortable: true, filter: true,resizable:true,floatingFilter: true,suppressMenu: true},
    { field: "code", sortable: true, filter: true,resizable:true,filter: true,
            floatingFilter: true },
    { field: "description", sortable: true, filter: true,resizable:true,filter: true,
            floatingFilter: true },
    { field: '', cellRenderer: 'btnCellRenderer', cellRendererParams: {
                    clicked: function() {
                    window.location.href="/admin/fallacie/edit/"+this.data.id;
                }
            },
        },
        { field: '', cellRenderer: 'delBtnRenderer', cellRendererParams: {
            clicked: function() {
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            window.location.href="/admin/fallacie/delete/"+this.data.id;
                            swal("Poof! Your data  has been deleted!", {
                            icon: "success",
                            });
                        } else {
                            swal("Your data is safe!", {
                            icon: "error"
                            });
                        }
                    });
                      
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
    components: {
            btnCellRenderer: BtnCellRenderer,
            delBtnRenderer: delBtnRenderer,
        }
    };
        
        
    // function onPageSizeChanged() {
    //     var value = document.getElementById('page-size').value;
    //     gridOptions.api.paginationSetPageSize(Number(value));
    // }
        // lookup the container we want the Grid to use
  const eGridDiv = document.querySelector('#myGrid');
    
  // create the grid passing in the div to use together with the columns & data we want to use
  new agGrid.Grid(eGridDiv, gridOptions);
  
  // fetch the row data to use and one ready provide it to the Grid via the Grid API
  fetch("/admin/fallacies")
  .then(response => response.json())
  .then(data => {
          gridOptions.api.setRowData(data);
        });
        


function BtnCellRenderer() {}

BtnCellRenderer.prototype.init = function(params) {
    this.params = params;
    
    this.eGui = document.createElement('div');
    this.eGui.innerHTML = '<i class="fa fa-pencil"></i>';
    
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
    this.eGui.innerHTML = '<i class="fa fa-close"></i>';
    
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

</script>

@endsection