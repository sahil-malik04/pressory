@include('admin.includes.header')

@yield('content')

@include('admin.elements.admin-right-sidebar')

@include('admin.includes.footer')
<script>
function showPreview(event){
  if(event.target.files.length > 0){
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("prev");
    preview.src = src;
    preview.style.display = "block";
  }
}
</script>