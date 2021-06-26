@extends('layouts.main')

@section('page')
  <div class="container-fluid">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
      </div>

      <div class="row">
          <div class="col-12 mb-4">
              <div class="card shadow h-100 py-2">
                  <div class="card-body">
                      <div class="row no-gutters align-items-top">
                          <div class="col mr-5">
                              <div class="text-xs font-weight-bold text-uppercase mb-1">Info Kereta</div>
                              <div class="row">
                                  <div class="col text-xs">Nama</div>
                                  <div class="col-4 text-right">2</div>
                              </div>
                              <div class="row">
                                  <div class="col text-xs">ID</div>
                                  <div class="col-4 text-right">2</div>
                              </div>
                          </div>
                          <div class="col-auto">
                              <i class="fas fa-subway fa-2x text-gray-300" style="color: var(--red);"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="col-12 mb-4">
              <div class="card shadow h-100 py-2">
                  <div class="card-body">
                      <div class="row no-gutters align-items-top">
                          <div class="col mr-5">
                              <div class="text-xs font-weight-bold text-uppercase mb-1">Kelistrikan</div>
                              <div class="row">
                                  <div class="col text-xs">Tegangan</div>
                                  <div class="col-4 text-right">2</div>
                              </div>
                              <div class="row">
                                  <div class="col text-xs">Arus</div>
                                  <div class="col-4 text-right">2</div>
                              </div>
                              <div class="row">
                                  <div class="col text-xs">Frekuensi</div>
                                  <div class="col-4 text-right">2</div>
                              </div>
                               <div class="row">
                                  <div class="col text-xs">Daya</div>
                                  <div class="col-4 text-right">2</div>
                              </div>
                               <div class="row">
                                  <div class="col text-xs">Energi</div>
                                  <div class="col-4 text-right">2</div>
                              </div>
                          </div>
                          <div class="col-auto">
                              <i class="fas fa-bolt fa-2x text-gray-300" style="color: var(--red);"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="col-12 mb-4">
              <div class="card shadow h-100 py-2">
                  <div class="card-body">
                      <div class="row no-gutters align-items-top">
                          <div class="col mr-5">
                              <div class="text-xs font-weight-bold text-uppercase mb-1">Lokasi</div>
                              <div class="row">
                                  <div class="col text-xs">Latitude</div>
                                  <div class="col-4 text-right">2</div>
                              </div>
                              <div class="row">
                                  <div class="col text-xs">Longitude</div>
                                  <div class="col-4 text-right">2</div>
                              </div>
                              <div class="row">
                                  <div class="col text-xs">Kecepatan</div>
                                  <div class="col-4 text-right">2</div>
                              </div>
                          </div>
                          <div class="col-auto">
                              <i class="fas fa-map-marker-alt fa-2x text-gray-300" style="color: var(--red);"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection