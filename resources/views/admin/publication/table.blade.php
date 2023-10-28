@extends('layouts.admin')
<link href="{{ asset('assets/aggrid-css/ag-grid.css') }}" rel="stylesheet">
<link href="{{ asset('assets/aggrid-css/ag-theme-alpine.css') }}" rel="stylesheet">
<script src="{{ asset('assets/js/ag-grid/ag-grid.js') }}"></script>
@section('content')
<div class="right_col" role="main">
    <!-- <a href="{{ route('publication.viewAdd') }}" class="btn btn-primary float-right">Add Publications</a> -->
   
            
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <h2 class="text-left font-weight-bold label label-default">Publication</h2>
                    </div>
                    <div class="col-md-2">
                        <a href="javascript:void(0)" class="btn btn-primary sidebar-action-open">Add Publications</a>
                    </div>
                </div>
              

        <div id="myGrid" class="ag-theme-alpine" style="height:auto"></div>
    </div> 
   
</div>       

<!-- Sidebar Datat -->
@section('sidebar-title')
Publication
 @endsection

@section('sidebar')

<form method="post" action="{{ route('publication.add') }}" id="publicationForm" class="px-4" enctype="multipart/form-data">
        @csrf
        <div class=" form-group">
            <label class="col-form-label label-align" for="Publication">Publication <span class="required">*</span>
            </label>
            <div class=" ">
                <input type="text" id="publication"  name="publication" required="required" class="form-control ">
            </div>
        </div>
        <div class=" form-group">
            <label class="col-form-label label-align" for="domain">Domain <span class="required">*</span>
            </label>
            <div class="">
            <textarea name="domain" id="domain" cols="10" rows="2" class="form-control"></textarea>
            </div>
            
        </div>
        <div class=" form-group">
            <label class="col-form-label label-align" for="country">Country <span class="required">*</span>
            </label>
            <select name="country" class="form-control">
                <option value="">Select Country</option>
                @foreach($country as $val)
                <option value="{{ $val->id }}">{{ $val->country_name }}</option>
                @endforeach
            </select>
            <!-- <div class=" ">
                <input type="text" id="country"  name="country" required="required" class="form-control ">
            </div> -->
        </div>
        <div class="form-group">
            <label class="col-form-label  label-align" for="website">Website<span class="required">*</span>
            </label>
            <div>
                <textarea type="text" id="website"  name="website" cols="10" rows="2"  class="form-control "></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-form-label  label-align" for="twitter">Twitter <span class="required">*</span>
            </label>
            <div>
                <textarea type="text" id="twitter"  name="twitter"  cols="10" rows="2"  class="form-control "></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-form-label  label-align" for="wiki_pedia">Wikipedia <span class="required">*</span>
            </label>
            <div>
                <textarea type="text" id="wiki_pedia"  name="wiki_pedia"  cols="10" rows="2" class="form-control "></textarea>
            </div>
        </div>
        
        <div class=" form-group">
            <label class="col-form-label label-align" for="country">Publication Image <span class="required">*</span>
            </label>
            <div class=" ">
                <input type="file" id="image"  name="image" required="required" class="form-control" onchange="showPreview(event);">
                 <img id="prev" alt="" class="img-circle" width="100">
            </div>
        </div>
        <div class="ln_solid"></div>
        <div class="form-group">
            <div class="">
                <button type="submit" class="btn btn-success float-right">Save</button>
            </div>
        </div>
    </form>

@endsection

<script type="text/javascript" charset="utf-8">
class CustomTooltip {
  init(params) {
    const eGui = (this.eGui = document.createElement('div'));
    const color = params.color || 'white';
    const data = params.api.getDisplayedRowAtIndex(params.rowIndex).data;
    console.log(data.image);
    eGui.classList.add('custom-tooltip');
    //@ts-ignore
    eGui.style['background-color'] = color;
    let imgName;
    if(data.image){
        imgName= data.image;
    }
    
    eGui.innerHTML = `<img src="{{ asset('storage/publication') }}/${imgName}" width="100px">`;
  }

  getGui() {
    return this.eGui;
  }
}
// specify the columns
agGrid.LicenseManager.setLicenseKey('CompanyName=Pressory,LicensedApplication=Pressory,LicenseType=SingleApplication,LicensedConcurrentDeveloperCount=1,LicensedProductionInstancesCount=0,AssetReference=AG-026074,ExpiryDate=6_March_2023_[v2]_MTY3ODA2MDgwMDAwMA==35313d3bc79f875d0220cfce40b29f1c');
var hashValueGetter = function (params) {
  return params.node ? params.node.rowIndex + 1 : null;
};

var hasValueCountry = function(param){
    return param.data.country ? param.data.country.country_name :'';
}
const columnDefs = [
    { field: "#", valueGetter:hashValueGetter, sortable: true, filter: false,resizable:true,floatingFilter: true,suppressMenu: true },
    { field: "publication", sortable: true, filter: true,resizable:true,floatingFilter: true,suppressMenu: true},
    { field: "domain", sortable: true, filter: true,resizable:true,floatingFilter: true,suppressMenu: true},
    { field: "country",valueGetter:hasValueCountry, sortable: true, filter: true,resizable:true,floatingFilter: true,suppressMenu: true},
    { field: "website", headerName:'Website', sortable: true, filter: true,resizable:true,floatingFilter: true,suppressMenu: true},
    { field: "twitter", headerName:'Twitter',sortable: true, filter: true,resizable:true,floatingFilter: true,suppressMenu: true },
    { field: "wiki_pedia", headerName:'Wikipedia',sortable: true, filter: true,resizable:true,floatingFilter: true,suppressMenu: true },
    { headerName: "Image",field:'image', sortable: true, filter: true,resizable:true,floatingFilter: true,suppressMenu: true,cellRenderer: 'imageCellRenderer',tooltipField:'image'},

    { field: '',resizable:true,cellRenderer: 'btnCellRenderer', cellRendererParams: {
                    clicked: function() {
                    window.location.href="/admin/publication/edit/"+this.data.id;
                }
            },
        },
    { field: '',resizable:true, cellRenderer: 'delBtnRenderer', cellRendererParams: {
        clicked: function() {
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            
                            window.location.href="/admin/publication/delete/"+this.data.id;
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
        tooltipComponent: CustomTooltip,
    }, 
    tooltipShowDelay: 0,
    tooltipHideDelay: 2000,
        components: {
            btnCellRenderer: BtnCellRenderer,
            delBtnRenderer: delBtnRenderer,
            imageCellRenderer: imageCellRenderer,
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
  fetch("/admin/publications")
  .then(response => response.json())
  .then(data => {
    //   console.log(data);
          gridOptions.api.setRowData(data);
        });
        

// edit icon
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

// image icon
function imageCellRenderer() {}

imageCellRenderer.prototype.init = function(params) {
    this.params = params;
    
    this.eGui = document.createElement('div');
    this.eGui.innerHTML = '<i class="fa fa-image"></i>';
        
}

imageCellRenderer.prototype.getGui = function() {
  return this.eGui;
}





// Delete Icon
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
