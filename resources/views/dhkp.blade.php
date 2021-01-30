@extends('../../layouts/dhkp')
@section('content')
<!--Page Body Start-->
<div class="page-body">
  <!-- Container-fluid starts -->
  <div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col-lg-6"> 
          <h5>
            Kelola DHKP
          </h5>
        </div>
        <div class="col-lg-6">
          <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item active">DHKP
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid Ends -->

    <!-- Container-fluid starts -->
    <div class="container-fluid">
      <div class="row">   

        @if(session('sukses'))
        <div class="col-md-12">
          <div class="alert alert-success" role="alert">
            {{session('sukses')}}
          </div>
        </div>
        @endif        

        <div class="col-md-12" style="margin-bottom: 30px">

          <a class="btn btn-success" href="javascript:void(0)" id="createNewDHKP" style="margin-bottom: 10px;"> TAMBAH DHKP</a>
          <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#hapusData"  style="margin-left: 10px; margin-bottom: 10px;">
            HAPUS SEMUA DATA DHKP
          </button>
          <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#importExcel"  style="margin-left: 10px; margin-bottom: 10px;">
            IMPORT FILE EXCEL
          </button>
          <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exportExcel"  style="margin-left: 10px; margin-bottom: 10px;">
            EXPORT KE EXCEL
          </button>          

          <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <form method="post" action="{{ route('excel.dhkp-import') }}" enctype="multipart/form-data">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">

                    {{ csrf_field() }}

                    <label>Pilih file excel</label>
                    <div class="form-group">
                      <input type="file" name="file" required="required">
                    </div>

                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Import</button>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <div class="modal fade" id="exportExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Export Excel</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <label>Export & Download File Excel?</label>
                </div>
                <div class="modal-footer">
                  <a href="{{ route('excel.dhkp-export') }}" type="button" class="btn btn-primary">Export & Download</a>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="hapusData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Hapus Semua Data DHKP</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <label>Ingin Menghapus Semua Data?</label>
                </div>
                <div class="modal-footer">
                  <a href="{{ route('hapus.dhkp-data') }}" type="button" class="btn btn-primary">Hapus</a>
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <br />
        <div class="col-md-12">
          <table class="table stripe row-border order-column data-table">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama WP</th>
                <th>Daftar Kepemilikan</th>
                <th>NOP</th>
                <th>Alamat</th>
                <th>RT/RW</th>
                <th>Luas Tanah</th>
                <th>Luas Bangunan</th>
                <th>Persil</th>
                <th>Leter C</th>        
                <th>Alamat WP</th>
                <th>RT/RW WP</th>
                <th>Kelurahan</th>
                <th>Kota</th>
                <th>PBB (Rp)</th>
                <th>Lihat Lokasi</th>
                <th width="280px">Atur</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>


          <div class="modal fade bd-example-modal-lg" id="ajaxModel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content modal-long">
                <div class="modal-header">
                  <h4 class="modal-title" id="modelHeading"></h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="dhkpForm" name="dhkpForm" class="form-horizontal">
                    <input type="hidden" name="dhkp_id" id="dhkp_id" value="">

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="nop" class="col-sm-12 control-label">NOP</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" id="nop" name="nop" placeholder="Masukkan NOP" value="" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-12 control-label">Alamat</label>
                          <div class="col-sm-12">
                            <textarea id="alamat" name="alamat" placeholder="Masukkan Alamat" class="form-control"></textarea>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="rt_rw" class="col-sm-12 control-label">RT/RW</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" id="rt_rw" name="rt_rw" placeholder="Masukkan RT/RW" value="">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="luas_tanah" class="col-sm-12 control-label">Luas Tanah</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" id="luas_tanah" name="luas_tanah" placeholder="Masukkan Luas Tanah" value="">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="luas_bangunan" class="col-sm-12 control-label">Luas Bangunan</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" id="luas_bangunan" name="luas_bangunan" placeholder="Masukkan Luas Bangunan" value="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="persil" class="col-sm-12 control-label">Persil</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" id="persil" name="persil" placeholder="Masukkan Persil" value="">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="c" class="col-sm-12 control-label">Letter C</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" id="c" name="c" placeholder="Masukkan Leter C" value="">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="nama_wp" class="col-sm-12 control-label">Nama WP</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" id="nama_wp" name="nama_wp" placeholder="Masukkan Nama WP" value="">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="nama_kepemilikan" class="col-sm-12 control-label">Daftar Kepemilikan</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" id="nama_kepemilikan" name="nama_kepemilikan" placeholder="Masukkan Nama Kepemilikan" value="">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-12 control-label">Alamat WP</label>
                          <div class="col-sm-12">
                            <textarea id="alamat_wp" name="alamat_wp" placeholder="Masukkan Alamat WP" class="form-control"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="rt_rw_wp" class="col-sm-12 control-label">RT/RW WP</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" id="rt_rw_wp" name="rt_rw_wp" placeholder="Masukkan Persil" value="">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="kelurahan" class="col-sm-12 control-label">Kelurahan</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" id="kelurahan" name="kelurahan" placeholder="Masukkan Kelurahan" value="">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="kota" class="col-sm-12 control-label">Kota</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" id="kota" name="kota" placeholder="Masukkan Kota" value="">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="pbb" class="col-sm-12 control-label">PBB</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" id="pbb" name="pbb" placeholder="Masukkan PPB" value="">
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div align="center" id="map" style="width: 100%; height: 600px;"><br/></div>
                      <p hidden id="lat"></p>
                      <p hidden id="lng"></p>
                      <input type="hidden" id="latt" name="latt" value="">
                      <input type="hidden" id="longt" name="longt" value="">
                      <p hidden id="plat"></p>
                      <p hidden id="plongi"></p>
                    </div>                                      
                    <br>     

                    <!-- <div class="col-md-12">
                      <table class="table table-responsive">
                        <td>
                          <img src="{{ URL::asset('test-map/marker.png') }}" id="marker"/>
                          <img src="{{ URL::asset('test-map/maps.gif') }}" id="maps"/>          
                        </td>
                      </table>
                      <div style="padding-top:20px;">
                        <div id="coordx"></div>
                        <div id="coordy"></div>
                      </div>
                    </div> -->
                    <div class="col-md-12">
                     <button type="submit" class="btn btn-primary" id="saveBtn" value="create" style="width: 100%">Simpan
                     </button>
                   </div>
                 </form>
               </div>
             </div>
           </div>
         </div>
       </div>

       <script type="text/javascript">        

        function load() {        
          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });                  

          var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,    
            ajax: "{{ route('dhkp.index') }}",    
            scrollX: true,
            scrollY: "500px",
            fixedColumns: {
              leftColumns: 3
            },
            fixedHeader: true,
            columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama_wp', name: 'nama_wp'},
            {data: 'nama_kepemilikan', name: 'nama_kepemilikan'},
            {data: 'nop', name: 'nop'},
            {data: 'alamat', name: 'alamat'},
            {data: 'rt_rw', name: 'rt_rw'},
            {data: 'luas_tanah', name: 'luas_tanah'},
            {data: 'luas_bangunan', name: 'luas_bangunan'},
            {data: 'persil', name: 'persil'},
            {data: 'c', name: 'c'},      
            {data: 'alamat_wp', name: 'alamat_wp'},
            {data: 'rt_rw_wp', name: 'rt_rw_wp'},
            {data: 'kelurahan', name: 'kelurahan'},
            {data: 'kota', name: 'kota'},
            {data: 'pbb', name: 'pbb'},      
            {data: 'lokasi', name: 'lokasi', orderable: false, searchable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
          });

          $('#createNewDHKP').click(function () {
            $('#saveBtn').val("create-dhkp");
            $('#dhkp_id').val('');
            $('#dhkpForm').trigger("reset");
            $('#modelHeading').html("Tambah DHKP");
            $('#ajaxModel').modal('show');            
            if (GBrowserIsCompatible()) {
              var lat = -8.0781;
              var longi = 112.6446;
              var map = new GMap2(document.getElementById("map"));
              map.addControl(new GSmallZoomControl3D());
              map.addControl(new GMenuMapTypeControl());
              var center = new GLatLng(lat,longi);
              map.setCenter(center, 9, G_PHYSICAL_MAP);
              map.setZoom(19); 
              geocoder = new GClientGeocoder();
              var marker = new GMarker(center, {draggable: true});  
              map.addOverlay(marker);
              map.addMapType(G_PHYSICAL_MAP);
              document.getElementById("lat").innerHTML = center.lat().toFixed(5);
              document.getElementById("lng").innerHTML = center.lng().toFixed(5);
              latt = document.getElementById("lat").innerHTML;
              document.getElementById("latt").value = center.lat().toFixed(5);
              longt = document.getElementById("lng").innerHTML;
              document.getElementById("longt").value = center.lng().toFixed(5);

              GEvent.addListener(marker, "dragend", function() {
               var point = marker.getPoint();
               map.panTo(point);
               document.getElementById("lat").innerHTML = point.lat().toFixed(5);
               document.getElementById("lng").innerHTML = point.lng().toFixed(5);
               latt = document.getElementById("lat").innerHTML;
               document.getElementById("latt").value = center.lat().toFixed(5);
               longt = document.getElementById("lng").innerHTML;
               document.getElementById("longt").value = center.lng().toFixed(5);

             });

              GEvent.addListener(map, "moveend", function() {
                map.clearOverlays();
                var center = map.getCenter();
                var marker = new GMarker(center, {draggable: true});
                map.addOverlay(marker);
                document.getElementById("lat").innerHTML = center.lat().toFixed(5);
                document.getElementById("lng").innerHTML = center.lng().toFixed(5);
                latt = document.getElementById("lat").innerHTML;
                document.getElementById("latt").value = center.lat().toFixed(5);
                longt = document.getElementById("lng").innerHTML;
                document.getElementById("longt").value = center.lng().toFixed(5);

                GEvent.addListener(marker, "dragend", function() {
                  var point =marker.getPoint();
                  map.panTo(point);
                  document.getElementById("lat").innerHTML = point.lat().toFixed(5);
                  document.getElementById("lng").innerHTML = point.lng().toFixed(5);
                  latt = document.getElementById("lat").innerHTML;
                  document.getElementById("latt").value = center.lat().toFixed(5);
                  longt = document.getElementById("lng").innerHTML;
                  document.getElementById("longt").value = center.lng().toFixed(5);
                });
              });
            }
          });

          $('body').on('click', '.editDHKP', function () {
            var dhkp_id = $(this).data('id');
            $.get("{{ route('dhkp.index') }}" +'/' + dhkp_id +'/edit', function (data) {
              $('#modelHeading').html("Edit DHKP");
              $('#saveBtn').val("edit-user");
              $('#ajaxModel').modal('show');
              $('#dhkp_id').val(data.id);
              $('#nop').val(data.nop);
              $('#alamat').val(data.alamat);
              $('#rt_rw').val(data.rt_rw);
              $('#luas_tanah').val(data.luas_tanah);
              $('#luas_bangunan').val(data.luas_bangunan);
              $('#persil').val(data.persil);
              $('#c').val(data.c);
              $('#nama_wp').val(data.nama_wp);
              $('#nama_kepemilikan').val(data.nama_kepemilikan);
              $('#alamat_wp').val(data.alamat_wp);
              $('#rt_rw_wp').val(data.rt_rw_wp);
              $('#kelurahan').val(data.kelurahan);
              $('#kota').val(data.kota);
              $('#pbb').val(data.pbb);
              $('#plat').val(data.lat);
              $('#plongi').val(data.longi);

              if (GBrowserIsCompatible()) {
                var lat = parseFloat(document.getElementById('plat').value);
                var longi = parseFloat(document.getElementById('plongi').value);
                var map = new GMap2(document.getElementById("map"));
                map.addControl(new GSmallZoomControl3D());
                map.addControl(new GMenuMapTypeControl());
                var center = new GLatLng(lat,longi);
                map.setCenter(center, 9, G_PHYSICAL_MAP);
                map.setZoom(19); 
                geocoder = new GClientGeocoder();
                var marker = new GMarker(center, {draggable: true});  
                map.addOverlay(marker);
                map.addMapType(G_PHYSICAL_MAP);
                document.getElementById("lat").innerHTML = center.lat().toFixed(5);
                document.getElementById("lng").innerHTML = center.lng().toFixed(5);
                latt = document.getElementById("lat").innerHTML;
                document.getElementById("latt").value = center.lat().toFixed(5);
                longt = document.getElementById("lng").innerHTML;
                document.getElementById("longt").value = center.lng().toFixed(5);


                GEvent.addListener(marker, "dragend", function() {
                 var point = marker.getPoint();
                 map.panTo(point);
                 document.getElementById("lat").innerHTML = point.lat().toFixed(5);
                 document.getElementById("lng").innerHTML = point.lng().toFixed(5);
                 latt = document.getElementById("lat").innerHTML;
                 document.getElementById("latt").value = center.lat().toFixed(5);
                 longt = document.getElementById("lng").innerHTML;
                 document.getElementById("longt").value = center.lng().toFixed(5);

               });

                GEvent.addListener(map, "moveend", function() {
                  map.clearOverlays();
                  var center = map.getCenter();
                  var marker = new GMarker(center, {draggable: true});
                  map.addOverlay(marker);
                  document.getElementById("lat").innerHTML = center.lat().toFixed(5);
                  document.getElementById("lng").innerHTML = center.lng().toFixed(5);
                  latt = document.getElementById("lat").innerHTML;
                  document.getElementById("latt").value = center.lat().toFixed(5);
                  longt = document.getElementById("lng").innerHTML;
                  document.getElementById("longt").value = center.lng().toFixed(5);

                  GEvent.addListener(marker, "dragend", function() {
                    var point =marker.getPoint();
                    map.panTo(point);
                    document.getElementById("lat").innerHTML = point.lat().toFixed(5);
                    document.getElementById("lng").innerHTML = point.lng().toFixed(5);
                    latt = document.getElementById("lat").innerHTML;
                    document.getElementById("latt").value = center.lat().toFixed(5);
                    longt = document.getElementById("lng").innerHTML;
                    document.getElementById("longt").value = center.lng().toFixed(5);
                  });
                });
              }
            })
});

$('#saveBtn').click(function (e) {
  e.preventDefault();
  $(this).html('Memproses..');

  $.ajax({
    data: $('#dhkpForm').serialize(),
    url: "{{ route('dhkp.store') }}",
    type: "POST",
    dataType: 'json',
    success: function (data) {
      $('#dhkpForm').trigger("reset");
      $('#saveBtn').html('Simpan');
      $('#ajaxModel').modal('hide');
      table.draw();

    },
    error: function (data) {
      console.log('Error:', data);
      $('#saveBtn').html('Simpan');
    }
  });
});

$('body').on('click', '.deleteDHKP', function () {
  var dhkp_id = $(this).data("id");
  confirm("Are You sure want to delete !");

  $.ajax({
    type: "DELETE",
    url: "{{ route('dhkp.store') }}"+'/'+dhkp_id,
    success: function (data) {
      table.draw();
    },
    error: function (data) {
      console.log('Error:', data);
    }
  });
});
};
</script>

</div>
<!-- Container-fluid Ends -->
</div>
<!--Page Body Ends-->
</div>
@endsection