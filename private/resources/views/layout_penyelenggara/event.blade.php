<div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
                <h3 class="mb-0">Tabel Event</h3>
                <div class="col text-right">
                  <a class="btn btn-primary " href="{{ url('create-event') }}">Tambah Data</a>
                </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Aksi</th>
                    <th scope="col">Nama Event</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Isi</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                @foreach($event as $e)
                  <tr>
                  <td class="text-left">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="#">Edit</a>
                          <a class="dropdown-item" href="#">Delete</a>
                          
                        </div>
                      </div>
                    </td>
                    <th scope="row">
                      <div class="media align-items-center">
                        <div class="media-body">
                          <span class="mb-0 text-sm">{{ $e->nama }}</span>
                        </div>
                      </div>
                    </th>
                    <td>
                    {{ $e->kategori }}
                    </td>
                    <td>
                    {{ $e->tanggal }}
                    </td>
                    <td>
                        <div class="avatar-group">
                          <a href="#" class="avatar avatar-sm" data-toggle="tooltip">
                              <img src="{{ asset('private/public/public/images/event/' . $e->foto) }}" class="rounded-circle">
                          </a>
                        </div>
                    </td>
                    <td>
                    {{ $e->isi }}
                    </td>
                    
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <!-- Dark table -->


      <div class="col-md-4">
      <!-- <button type="button" class="btn btn-block btn-default" data-toggle="modal" data-target="#modal-form">Form</button> -->
  <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
            	
                	
<div class="card bg-secondary shadow border-0">
    <div class="card-body px-lg-5 py-lg-5">
        <div class="text-center text-muted mb-4">
            <small>Silahkan isi form peserta</small>
        </div>
        <form role="form" enctype="multipart/form-data" method="post">
            <div class="form-group">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"></span>
                    </div>
                    <input class="form-control" placeholder="Nama event" type="text">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"></span>
                    </div>
                    <select name="kategori" class="form-control" required="required" data-style="btn btn-link" id="exampleFormControlSelect1">
                      <option>Kategori</option>
                      <option value = "kategori 1">Kategori 1</option>
                      <option value = "kategori 2">Kategori 2</option>
                      <option value = "kategori 3">Kategori 3</option>
                      
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"></span>
                    </div>
                    <input class="form-control" placeholder="Tanggal" type="date">
                </div>
            </div>
            <div class="form-group form-file-upload form-file-multiple">
                <div class="input-group input-group-alternative">
                    
                        <div class="image-upload">
                            <label for="UploadGambar1" class="btn btn-primary">Gambar 1</label>
                            
                        </div>
                        <input id="UploadGambar1" type="file">
                        
                   
                </div>
            </div>

            <div class="form-group">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"></i></span>
                    </div>
                    <input class="form-control" placeholder="No WA / hp" type="text">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"></i></span>
                    </div>
                    <textarea rows="4" class="form-control form-control-alternative" placeholder="Alamat"></textarea>
                </div>
            </div>
            
           
            <div class="text-center">
                <button type="button" class="btn btn-primary my-4">Simpan</button>
            </div>
        </form>
    </div>
</div>

</div>
            
            </div>
        </div>
    </div>

    </div>