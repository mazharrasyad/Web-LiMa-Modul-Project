@extends('layouts.master')

@section('subtitle')
    Proyek
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
                <div class="col-12">
                  <h3 class="mb-0">PROYEK - UBAH DATA</h3>
                </div>                
              </div>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('project.update', $project->id) }}" method="post" enctype="multipart/form-data">                
                            
                    @include('layouts.message')
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PATCH">

                    {{-- nama --}}
                    <div class="pl-lg-4">                                              
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-control-label" for="nama">Nama</label>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="form-group">
                                <input type="text" name="nama" id="nama" class="form-control form-control-alternative text-dark" placeholder="Contoh : Pengelolaan Proyek" value="{{ $project->nama }}">                                                             
                            </div>
                        </div>
                    </div>
                    </div>

                    {{-- deskripsi --}}
                    <div class="pl-lg-4">                                              
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-control-label" for="deskripsi">Deskripsi</label>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="form-group">
                                <textarea type="text" name="deskripsi" id="deskripsi" class="form-control form-control-alternative text-dark" placeholder='Contoh : Product Owner dapat membuat proyek untuk dikerjakan mahasiswa'>{{ $project->deskripsi }}</textarea>                                                          
                            </div>
                        </div>
                    </div>
                    </div>

                    {{-- tanggal_mulai --}}
                    <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-control-label" for="tanggal_mulai">Tanggal Mulai</label>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                    </div>
                                    <input value="{{ $project->tanggal_mulai }}" name="tanggal_mulai" id="tanggal_mulai" class="form-control datepicker text-dark" placeholder="Pilih Tanggal Mulai" type="date">
                                </div>
                                <label class="form-control-label">Contoh : 01/01/2019 (Bulan/Tanggal/Tahun)</label>
                            </div>
                        </div>
                    </div>
                    </div>

                    {{-- tanggal_akhir --}}
                    <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-control-label" for="tanggal_akhir">Tanggal Akhir</label>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                    </div>
                                    <input value="{{ $project->tanggal_akhir }}" name="tanggal_akhir" id="tanggal_akhir" class="form-control datepicker text-dark" placeholder="Pilih Tanggal Akhir Proyek" type="date">
                                </div>
                                <label class="form-control-label">Contoh : 12/31/2019 (Bulan/Tanggal/Tahun)</label>
                            </div>
                        </div>
                    </div>
                    </div>

                    {{-- jumlah_sprint --}}
                    <div class="pl-lg-4">                                              
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-control-label" for="jumlah_sprint">Jumlah Sprint</label>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="form-group">
                                <input type="number" name="jumlah_sprint" id="jumlah_sprint" class="form-control form-control-alternative text-dark" placeholder="Contoh : 12" value="{{ $project->jumlah_sprint }}">                                                             
                            </div>
                        </div>
                    </div>
                    </div>

                    {{-- budget --}}
                    <div class="pl-lg-4">                                              
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-control-label" for="budget">Budget</label>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="form-group">
                                <input type="text" name="budget" id="budget" class="form-control form-control-alternative text-dark" placeholder="Contoh : Rp5.000.000" value="{{ $project->budget }}">                                                             
                            </div>
                        </div>
                    </div>
                    </div>
                    
                    {{-- status --}}
                    {{-- default('Baru') --}}

                    {{-- persen --}}
                    {{-- default('0') --}}

                    {{-- semester_id --}}
                    <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label mr-4" for="input-username">Semester</label>                                                                    
                        </div>                      
                        </div>
                        <div class="col-lg-9">
                        <div class="form-group">
                            <select name="semester_id" id="semester_id" class="btn btn-secondary dropdown-toggle" type="button">     
                                <option value="" disabled selected>Pilih Semester</option>                           
                                @foreach ($semesters as $semester)
                                    @if ($semester->id == $project->semester_id)
                                        <option value="{{ $project->semester_id }}" selected>{{ $project->semester->nama }}</option>
                                    @else
                                        <option value="{{ $semester->id }}">{{ $semester->nama }}</option>
                                    @endif                                
                                @endforeach                       
                            </select>
                        </div>
                        </div>
                    </div>
                    </div>

                    {{-- scrummaster_id --}}
                    <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label mr-4" for="scrummaster">Scrum Master</label>                                                                    
                        </div>                      
                        </div>
                        <div class="col-lg-9">
                        <div class="form-group">
                            <select name="scrummaster_id" id="scrummaster_id" class="btn btn-secondary dropdown-toggle" type="button">     
                                <option value="" disabled selected>Pilih Scrum Master</option>                           
                                @foreach ($scrummasters as $scrummaster)
                                    @if ($scrummaster->id == $project->scrummaster_id)
                                        <option value="{{ $project->scrummaster_id }}" selected>{{ $project->scrummaster->nama }}</option>
                                    @else
                                        <option value="{{ $scrummaster->id }}">{{ $scrummaster->nama }}</option>
                                    @endif                                    
                                @endforeach                       
                            </select>
                        </div>
                        </div>
                    </div>
                    </div>
                    
                    {{-- tim_id --}}
                    {{-- default('NULL') --}}

                    {{-- created_by --}}   
                    {{-- default('Project Owner') --}}
                    
                    {{-- submit --}}
                    <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="{{ url('/project') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </div>
                    </div>

              </form>      
            </div>
          </div>
        </div>
      </div>
    @include('layouts.copyright')
@endsection