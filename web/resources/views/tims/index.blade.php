@extends('layouts.master')

@section('subtitle')
    Tim Proyek
@endsection

@section('content')
  <div class="main-content">
    <!-- Page content -->
    <div class="container-fluid mt-4">
      <div class="row">
        
        <div class="col-xl-12">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">TIM PROYEK</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="{{ url('/tim/create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
                </div>
              </div>
            </div>
            <form>
            <div class="card-body">              
                @include('layouts.message')
                <div class="pl-lg-4">
                  
                  <div class="row">
                    <div class="col-lg-2">
                      <div class="form-group">
                        <label class="form-control-label mr-4" for="input-username">Semester</label>                                                                       
                      </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="form-group">
                        <div class="dropdown">
                            <select onchange="pilih_tim()" name="semester_id" id="semester_id" class="btn btn-secondary dropdown-toggle" type="button">     
                                <option value="" disabled selected>Pilih Semester</option>                           
                                @foreach ($semesters as $semester)
                                    <option value="{{ $semester->id }}">{{ $semester->nama }}</option>
                                @endforeach                       
                            </select>
                          </div>
                        </div>
                    </div>
                  </div>

                </div>                
                    <!-- Table -->
                    <div class="row">
                      <div class="col">
                        <div class="card shadow">
                          <div class="card-header border-0">
                            <h3 class="mb-0">Tim</h3>
                          </div>
                          <div class="table-responsive">
                            <table id="tim" class="table align-items-center table-flush">
                              <thead class="thead-light">
                                <tr>
                                  <th scope="col">No</th>
                                  <th scope="col">Nama</th>
                                  <th scope="col">Program Studi</th>
                                  <th scope="col"></th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $nomor = 1; ?>
                                @foreach ($tims as $tim)
                                <tr>                                 
                                  <td>{{ $nomor++ }}</td>
                                  <td hidden>{{ $tim->semester_id }}</td>
                                  <td>{{ $tim->nama }}</td>
                                  <td>{{ $tim->prodi->nama }}</td>
                                  <td>
                                    <form action="{{ route('tim.destroy', $tim->id) }}" method="post">
                                      {{ csrf_field() }}                                              
                                      <a class="btn btn-sm btn-icon-only text-light" href="{{ route('tim.show', $tim->id) }}" role="button" aria-haspopup="true" aria-expanded="false">
                                          <i class="ni ni-air-baloon text-blue"></i>
                                      </a>
                                      <a class="btn btn-sm btn-icon-only text-light" href="{{ route('tim.edit', $tim->id) }}" role="button" aria-haspopup="true" aria-expanded="false">
                                          <i class="ni ni-settings text-blue"></i>
                                      </a>
                                      <input type="hidden" name="_method" value="DELETE">
                                      <button onclick="return confirm('Apakah yakin dihapus?')" type="submit" value="Delete" class="btn btn-sm btn-icon-only text-light" role="button" aria-haspopup="true" aria-expanded="false">
                                          <i class="ni ni-basket text-blue"></i>
                                      </button>
                                    </form>
                                  </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
              </form>      
            </div>
          </div>
        </div>
      </div>
    @include('layouts.copyright')

    <script type="text/javascript">
      function pilih_tim() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("semester_id");
        filter = input.value.toUpperCase();
        table = document.getElementById("tim");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
          td = tr[i].getElementsByTagName("td")[1];
          if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
            } else {
              tr[i].style.display = "none";
            }
          }       
        }
      }
    </script>

@endsection