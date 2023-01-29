$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");


                  Swal.fire({
                    title: 'A jeni të sigurtë?',
                    text: "Dëshironi ti fshini këto të dhëna?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Po',
                    cancelButtonText: 'Jo'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Të dhënat u fshinë!',
                        'Të dhënat u fshinë me sukses.',
                        'success'
                      )
                    }
                  })
    });

  })
