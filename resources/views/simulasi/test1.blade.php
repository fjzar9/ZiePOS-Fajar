@extends('templates.layouts')

@push('styles')

@endpush

@section('contents')

<div class="page-content">
      <div class="card">
        <div class="card-header">
          <h4>Form</h4>
        </div>
        <div class="card-body">
            <form class="form form-horizontal" id="formKaryawan">
              <div class="form-body">
                <div class="row">
                  <div class="col-md-4">
                    <label>ID</label>
                  </div>
                  <div class="col-md-8 form-group">
                    <input type="text" id="id" class="form-control" name="id" placeholder="ID" required>
                  </div>
                  <div class="col-md-4">
                    <label>Nama</label>
                  </div>
                  <div class="col-md-8 form-group">
                    <input type="text" id="nama" class="form-control" name="nama" placeholder="Nama" required>
                  </div>
                  <div class="col-md-4">
                    <label>Jenis Kelamin</label>
                  </div>
                  <div class="col-md-8 form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jk" id="jk" value="L">
                        <label class="form-check-label" for="jk">
                          Laki-laki
                        </label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jk" id="jk" value="P">
                        <label class="form-check-label" for="jk">
                          Perempuan
                        </label>
                      </div>
                  </div>
                  <div class="col-sm-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1" id="btnSimpan">
                      Submit
                    </button>
                    <button type="reset" class="btn btn-light-secondary me-1 mb-1" id="btnReset">
                      Reset
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
      </div>
</div>

<div class="page-content">
      <div class="card">
        <div class="card-header">
          <h4>Data</h4>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primary me-1 mb-1" id="sorting">
                Sorting
              </button>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                <input type="text" class="form-control" placeholder="Search..." aria-describedby="btnSearch" name="search" id="search">
                <button class="btn btn-outline-secondary" type="button" id="btnSearch">
                  Button
                </button>
              </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle" id="tblKaryawan">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="3" align="center">Belum ada data</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
      </div>
</div>

@endsection

@push('scripts')

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
function insert() {
        const data = $('#formKaryawan').serializeArray()
        let newData = {}
        data.forEach(function(item, index) {
            let name = item['name']
            let value = (name === 'id'? Number(item['value']):item['value'] )
            newData[name] = value
        })
        return newData
        }

        $(function() {
            let dataKaryawan = []

            $('#formKaryawan').on('submit', function(e){
                e.preventDefault()
                dataKaryawan.push(insert())
                // console.log(dataKaryawan)
                $('#tblKaryawan tbody').html(showData(dataKaryawan))
                console.log(dataKaryawan);
            })

            $('#sorting').on('click', function(){
                dataKaryawan = insertionSort(dataKaryawan, 'id')
                $('#tblKaryawan tbody').html(showData(dataKaryawan))
                console.log(dataKaryawan);
            })

            $('#btnSearch').on('click', function(e){
                let teksSearch = $('#search').val()
                let id = searching(dataKaryawan, 'id', teksSearch)
                let data = []
                if(id >= 0)
                data.push(dataKaryawan[id])
                console.log(id);
                console.log(data);
                $('#tblKaryawan tbody').html(showData(data))
            })
        })

        function showData(arr){
            let row = ''
            if(arr.length == null){
                return row = `<tr><td colspan="3">Belum ada data</td></tr>`
            }
            arr.forEach(function(item, index){
                row += `<tr>`
                row += `<td>${item['id']}</td>`
                row += `<td>${item['nama']}</td>`
                row += `<td>${item['jk']}</td>`
                row += `</tr>`
            })
            return row
        }

        function insertionSort(arr, key){
            let i, j, id, value;
            for (i = 1; i < arr.length; i++)
            {
                value = arr[i];
                id = arr[i][key]
                j = i - 1;
                while (j >= 0 && arr[j][key] > id)
                {
                    arr[j + 1] = arr[j];
                    j = j - 1;
                }
                arr[j + 1] = value;
            }
            return arr
        }

        function searching(arr, key, teks){
            for(let i = 0; i < arr.length; i++){
                if(arr[i][key] == teks)
                return i
            }
            return -1
        }





</script>