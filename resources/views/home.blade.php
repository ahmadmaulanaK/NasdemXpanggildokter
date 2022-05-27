@extends('layouts.admin')

@section('title')
    <title>Antigen</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Antigen Bandung</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Antigen Bandung
                                {{-- <a href="{{ route('antigens.create') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-magic"></i>&nbsp;Tambah</a>| --}}
                              {{-- <a href="/antigens/export">Laporan</a> --}}
                               
                            </h4>
                        </div>
                        <div class="card-body">
                            <!-- JIKA TERDAPAT FLASH SESSION, MAKA TAMPILAKAN -->
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                            <!-- JIKA TERDAPAT FLASH SESSION, MAKA TAMPILAKAN -->

                            <!-- BUAT FORM UNTUK PENCARIAN, METHODNYA ADALAH GET -->
                           
                            <div class="row justify-content-center ">
                                <div class="col-md-4">
                                    <form action="{{route('antigens.index')}}">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" class="form-control" placeholder="Masukan No Registrasi" value="{{ request('search')}}">
                                        <button class="btn btn-success" type="submit">Cari</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                           
                            Halaman : {{ $Antigen->currentPage() }} <br/>
                            Jumlah Data : {{ $Antigen->total() }} <br/>
                            
                            <!-- TABLE UNTUK MENAMPILKAN DATA PRODUK -->
                            <div class="table-responsive">
                               
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                             <th>No</th>
                                             <th>*</th>
                                             <th colspan="2">Aksi</th>
                                            <th>No Registrasi</th>
                                       
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                           
                                            <th>Jenis Test</th>
                                            <th>Titik Tes</th>
                                            <th>Hasil</th>
                                            <th>Cabang</th>
                                            <th>Dibuat</th>
                                            <th>Admin Input</th>
                                            <th>Swabber</th>

                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- LOOPING DATA TERSEBUT MENGGUNAKAN FORELSE -->
                                        <!-- ADAPUN PENJELASAN ADA PADA ARTIKEL SEBELUMNYA -->
                                           
                                        @forelse ($Antigen as $key => $row)
                                        @if ($row->user_id == 1)
                                        <tr class="bg-danger">
                                             <td>{{$key+1}}</td>

                                             <td> <a href="{{ route('antigens.edit', $row->id) }}" class="btn btn-sm btn-dark shadow "><i class="nav-icon icon-note"></i> Edit</a></td>
                                             <td colspan="2">
                                                 
                                                
                                                  <form action="{{ route('antigens.destroy', $row->id) }}" method="post">
                                                 @csrf
                                                 @method('DELETE')
                                             
                                                  {{-- <button class="btn btn-dark  btn-sm shadow"><i class="nav-icon icon-trash"></i> Hapus</button> --}}
                                                 
                                             </form>
                                         </td>
                                            <td>
                                               <strong>{{ $row->noreg }}</strong><br>
                                                                                          </td>
                                            <td>
                                                
                                                <strong>{{ $row->customer->NIK }}</strong><br>
                                                <!-- ADAPUN NAMA KATEGORINYA DIAMBIL DARI HASIL RELASI PRODUK DAN KATEGORI -->
                                              
                                            </td>
                                            {{-- <td>{{ $row->customer->name }} </td> --}}
                                        </td>
                                       
                                            
                                          
                                            <td>{{ $row->customer->name }} </td>
                                            <td>{{ $row->customer->jenis_kelamin }} </td>
                                            <td>{{ $row->category->name }} </td>
                                            <td class="bg-primary">{{ $row->titik->name }}</td>
                                            {{-- <td>Perlu diproses</td> --}}
                                            <td>Perlu diproses</td>
                                            <td>Perlu diproses</td>
                                            
                                            {{-- <td>{{ $row->cabang->name }} </td> --}}
                                            <td>{{ $row->created_at->format(' H:i') }} </td>
                                            <td >{{ $row->user->name }}</td> 
                                            <td >perlu diproses</td> 
                                           
                                            
                                            
                                            {{-- <td>Perlu diproses</td>    --}}
                                            {{-- <td>{{ $row->district->city->name }}</a></td> --}}
                                            
                                            <!-- KARENA BERISI HTML MAKA KITA GUNAKAN { !! UNTUK MENCETAK DATA -->
                      
                                          
                                       
                                        </tr>
                                    
                                        @else
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>
                                                <!-- FORM UNTUK MENGHAPUS DATA PRODUK -->
                                                <a href="/antigens/show/{{Crypt::encrypt($row->id)}}" class="btn btn-success btn-sm shadow "><i class="nav-icon icon-share"> SHARE </i></a>
                                                <a href="/antigens/cetak/{{Crypt::encrypt($row->id)}}" class="btn btn-warning btn-sm shadow "><i class="nav-icon icon-docs"> CETAK</i> </a>
                                                {{-- <a href="/antigens/pdf/{{Crypt::encrypt($row->id)}}" class="btn btn-warning btn-sm shadow "><i class="nav-icon icon-docs"> pdf</i> </a> --}}
                                                <a href="/antigens/kwitansi/{{Crypt::encrypt($row->id)}}" class="btn btn-primary btn-sm shadow "><i class="nav-icon icon-docs"> KWITANSI</i> </a>
                                               
                                                
                                               
                                            </td>
                                            <td>
                                                
                                                 <form action="{{ route('antigens.destroy', $row->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                            
                                                 <button class="btn btn-danger  btn-sm shadow"><i class="nav-icon icon-trash"></i> Hapus</button>
                                                
                                            </form>
                                           
                                        </td>
                                        <td> <a href="{{ route('antigens.edit', $row->id) }}" class="btn btn-sm btn-info shadow "><i class="nav-icon icon-note"></i> Edit</a></td>
                                           <td>
                                              <strong>{{ $row->noreg }}</strong><br>
                                                                                         </td>
                                           <td>
                                               
                                               <strong>{{ $row->customer->NIK }}</strong><br>
                                               <!-- ADAPUN NAMA KATEGORINYA DIAMBIL DARI HASIL RELASI PRODUK DAN KATEGORI -->
                                             
                                           </td>
                                           {{-- <td>{{ $row->customer->name }} </td> --}}
                                       </td>
                                      
                                           
                                         
                                           <td>{{ $row->customer->name }} </td>
                                           <td>{{ $row->customer->jenis_kelamin }} </td>
                                           <td>{{ $row->category->name }} </td>
                                           <td>{{ $row->titik->name }}</td>
                                           <td>{{ $row->hasil }} </td>
                                           <td>{{ $row->cabang->name }} </td>
                                           <td>{{ $row->created_at->format('d F, Y H:i') }} WIB </td>
                                           <td >{{ $row->user->name }}</td> 
                                          
                                           
                                           
                                           <td>{{ $row->swabber->name }}</td>   
                                           {{-- <td>{{ $row->district->city->name }}</a></td> --}}
                                           
                                           <!-- KARENA BERISI HTML MAKA KITA GUNAKAN { !! UNTUK MENCETAK DATA -->
                                       
                                           
                                       </tr>
                                        @endif
                                       
                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{ $Antigen->links() }}
    </div>
</main>
@endsection