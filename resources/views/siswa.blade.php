<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--alert toastr-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Data Siswa</title>
  </head>

    <style>
        .table-bacground{
            background-color: rgb(226, 222, 222)
        }
    </style>

    <body>

    <div class="container">
        <div class="card mt-2 table-bacground">
            <div class="card-body">
                <table class="table table caption-top ">
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal1">
            Tambah
        </button>
        <hr>
            <!-- MODAL INSERT-->
            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form method="POST" action="{{ route('insertsiswa') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">Nis</label>
                                <input type="number" name="nis" class="form-control
                                @error('nis') is-invalid @enderror" value="{{ old('nis') }}"/>
                            @error('nis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control
                                @error('nama') is-invalid @enderror" value="{{ old('nama') }}"/>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Kelas</label>
                                <input type="text" name="kelas" class="form-control
                                @error('kelas') is-invalid @enderror" value="{{ old('kelas') }}"/>
                            @error('kelas')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                            <label class="form-label">Jenis Kelamin</label>
                            <div class="form-check">
                                <input class="form-check-input @error('jk') is-invalid @enderror"
                                    type="radio" name="jk" value="Laki-laki">
                                <label class="form-check-label">
                                    Laki-Laki
                                </label>
                            @error('jk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="form-check mb-3 mt-3">
                                <input class="form-check-input @error('jk') is-invalid @enderror"
                                    type="radio" name="jk" value="Perempuan">
                                <label class="form-check-label">
                                    Perempuan
                                </label>
                            @error('jk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Alamat</label>
                                <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}"
                                    style="height: 100px">{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label>Gambar</label>
                                <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" value="{{ old('gambar') }}" value="{{ old('gambar') }}">
                            @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
            <!--END MODAL INSERT-->

                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NIS</th>
                            <th>NAMA</th>
                            <th>KELAS</th>
                            <th>JENIS KELAMIN</th>
                            <th>ALAMAT</th>
                            <th>FOTO</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                            @endphp
                            @foreach ($data as $siswa)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $siswa->nis }}</td>
                            <td>{{ $siswa->nama }}</td>
                            <td>{{ $siswa->kelas }}</td>
                            <td>{{ $siswa->jk }}</td>
                            <td>{{ $siswa->alamat }}</td>
                            <td>
                                <img src="{{ asset('foto/' . $siswa->gambar) }}"
                                style="width: 80px">
                            </td>
                            <td>
                                <div>
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal2{{ $siswa->id }}">
                                    Edit
                                </button>
                                <!-- MODAL UPDATE-->
                                <div class="modal fade" id="exampleModal2{{ $siswa->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Siswa</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/updatasiswa/{{ $siswa->id }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label class="form-label">Nis</label>
                                                    <input type="number" name="nis" class="form-control" value="{{ $siswa->nis }}" required/>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Nama Lengkap</label>
                                                    <input type="text" name="nama" class="form-control" value="{{ $siswa->nama }}" required/>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">kelas</label>
                                                    <input type="text" name="kelas" class="form-control" value="{{ $siswa->kelas }}" required/>
                                                </div>
                                                <label class="form-label">Jenis Kelamin</label>
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input" name="jk" value="Laki-laki" id="jk" {{ ($siswa->jk == 'Laki-laki'? 'checked' : '') }} >
                                                    <label class="form-check-label">
                                                        Laki-Laki
                                                    </label>
                                                </div>
                                                <div class="form-check mb-3 mt-3">
                                                    <input type="radio" class="form-check-input" name="jk" value="Perempuan" id="jk" {{ ($siswa->jk == 'Perempuan'? 'checked' : '') }} >
                                                    <label class="form-check-label">
                                                        Perempuan
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Alamat</label>
                                                    <textarea name="alamat" class="form-control"
                                                        style="height: 100px" required>{{ $siswa->alamat }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <strong>Gambar</strong>
                                                    <input type="file" name="gambar" class="form-control">
                                                    <img src="{{ asset('foto/' . $siswa->gambar) }}"
                                                        style="width: 70px">
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                                <!-- END MODAL UPDATE-->
                                <a href="/deletesiswa/{{ $siswa->id }}" siswa-id="{{ $siswa->id }}"  data-toggle="tooltip" data-placement="top" class="btn btn-danger btn-sm">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!--alert toastr-->
        <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script>
            $('.delete').click(function() {
                var siswaid = $(this).attr('siswa-id');

                swal({
                        title: "Yakin?",
                        text: "Kamu Akan Menghapus Data Ini "  + "",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location = "/deletesiswa/" + siswaid + ""
                            swal("Data Berhasil Di Hapus", {
                                icon: "success",
                            });
                        } else {
                            swal("Data Tidak Jadi Di Hapus");
                        }
                    });

            })
        </script>

        <script>
            @if (Session::has('success'))
                toastr.success("{{ Session::get('success') }}")
            @endif
        </script>
        <script>
            @if (Session::has('error'))
                toastr.error("{{ Session::get('error') }}")
            @endif
        </script>
         <script>
            @if (count($errors)>0)
                @foreach ($errors->all() as $error)
                    toastr.error("{{$error}}");
                @endforeach
            @endif
        </script>
    </body>
</html>
