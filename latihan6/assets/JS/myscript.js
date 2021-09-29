const flashData = $('.flash-data').data('flashdata');

if(flashData) {
    Swal.fire({
        title: 'Data Mahasiswa ',
        text: 'Berhasil ' + flashData,
        icon: 'success'
    });
}

$('.tombol-hapus').on('click', function(e) {
    // Aksi default link hapus dimatikan
    e.preventDefault();
    
    // Aksi hapus link ketika ditekan dari setiap data
    const href = $(this).attr('href');


    Swal.fire({
        title: 'Apakah Anda yakin',
        text: "Data Mahasiswa akan dihapus ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = href;
        }
    })

});