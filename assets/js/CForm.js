var CForm = function(endpoint, el, callback) {
  const call = function(ed) {
    $.ajax({
      type: ed.type,
      url: ed.url,
      headers: {
        'x-api-key' : ed.key == undefined ? 444 : ed.key
      },
      data: el.serialize(),
      success: function(res) {
        callback.success(res)
        if(res.success) {
          Toast.fire({
            icon: 'success',
            title: '<b>Berhasil !</b> <br />'+res.message
          })
        } else {
          Toast.fire({
            icon: 'error',
            title: res.message
          })
        }
      },
      error: function(err) {
        callback.error(err)
      }
    })
  }

  const del = function() {
    Swal.fire({
      title: 'Apakah anda yakin menghapus data ?',
      showCancelButton: true,
      confirmButtonText: 'Ya, Hapus',
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        $.ajax({
          type: endpoint.type,
          url: endpoint.url,
          headers: {
            'x-api-key' : endpoint.key == undefined ? 444 : endpoint.key
          },
          success: function(res) {
            callback.success(res)
            if(res.success) {
              Toast.fire({
                icon: 'success',
                title: '<b>Berhasil !</b> <br />'+res.message
              })
            } else {
              Toast.fire({
                icon: 'error',
                title: res.message
              })
            }
          },
          error: function(err) {
            callback.error(err)
          }
        })
      }
    })
  }

  return {
    init : function() {
      el.submit(function(e) {
        e.preventDefault();
        call(endpoint)
      })
    },
    delete : function() {
      del()
    }
  }
}