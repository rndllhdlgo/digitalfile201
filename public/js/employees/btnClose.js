$('#btnCancel').on('click',function(){
    Swal.fire({
        title: 'Do you want to exit?',
        allowOutsideClick: false,
        allowEscapeKey: false,
        showDenyButton: true,
        confirmButtonText: 'Yes',
        denyButtonText: 'No',
        customClass: {
        actions: 'my-actions',
        confirmButton: 'order-2',
        denyButton: 'order-3',
        }
    }).then((cancel) => {
      if (cancel.isConfirmed) {
        setTimeout(function(){location.href= "/employees";}, 1000);
      } else if (cancel.isDenied) {
      }
    });
});