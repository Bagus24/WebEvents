<section class="ftco-section bg-light">
      <div class="container">
      
      
        <div class="row d-flex">
        @foreach($event as $e)
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <a href="{{ url('deskripsi-event') }}" class="block-20" style="background-image: url('{{ asset('private/public/public/images/event/' . $e->foto) }}');">
              </a>
              <div class="text p-4 float-right d-block">
              	<div class="d-flex align-items-center pt-2 mb-4">	
              			<span>{{ $e->tanggal }}</span>
              	</div>
                <h3 class="heading mt-2"><a href="{{ url('deskripsi_event') }}">{!! $e->nama !!}</a></h3>
                
              </div>
            </div>
          </div>
          @endforeach
         
  
        </div>
        
        

        <div class="row mt-5">
          <div class="col text-center">
            
          <ul class="pagination justify-content-end mb-0">
                  <!-- <li class="page-item disabled">
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
                  </li> -->
                  {{ $event->links() }}
                </ul>
            
          </div>
        </div>
      </div>
    </section>