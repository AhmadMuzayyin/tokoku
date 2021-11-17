<div class="modal fade" id="ModalSearch" tabindex="-1" aria-labelledby="ModalSearchLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="text-center table-produk" id="table-produk">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Merek</th>
                            <th>Harga Jual</th>
                            <th><i class="fas fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->merek }}</td>
                            <td>{{ $item->harga_jual }}</td>
                            <td>
                                <button class="badge bg-primary btn_click" style="border: 0px;" data-id="{{ $item->id }}">
                                    <i class="fas fa-arrow-alt-circle-right"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('script')
    
<script>

$(document).on('click', '.btn_click', function(){
    let ide = $(this).data('id')
    $.ajax({
        type: "GET",
        url: "{{ route('get.product') }}",
        data: {
            id: ide,
        },
        success: function (res) {
            let data = res.data
            
            let html = `
            <tr>
                <td>1</td>
                <td>${data.nama}</td>
                <td>${data.merek}</td>
                <td>${data.harga_jual}</td>
                <td class="col-1">
                    <input type="number" name="qty" id="qty" class="form-control" value="1">
                </td>
                <td>${data.harga_jual}</td>
                <td>
                    <button class="badge bg-danger btn_hapus" style="border: 0px;">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
            `

            $('.body_transaksi').append(html)

        }
    });
    
})

</script>

@endpush