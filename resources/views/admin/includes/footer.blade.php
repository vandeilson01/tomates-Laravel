 <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Tomates</span></strong>. Todos os direitos reservados
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('back/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('back/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('back/vendor/chart.js/chart.min.js') }}"></script>
  <script src="{{ asset('back/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('back/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('back/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('back/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('back/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('back/js/main.js') }}"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <script>

    $('.but-del').click(function() {
      var clas = $(this).attr('data-id');
    
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success text-success',
          cancelButton: 'btn btn-danger text-danger'
        },
        buttonsStyling: false
      })

      swalWithBootstrapButtons.fire({
        title: 'Deseja mesmo deletar?',
        // text: "..!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sim!',
        cancelButtonText: 'Não!',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {

          $('form#'+clas).submit();
          
          swalWithBootstrapButtons.fire(
            'Deletado!',
            'Deletado com sucesso.',
            'success'
          )
        } else if (
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelado',
            'Cancelado com sucesso.',
            'error'
          )
        }
      });
      });

    


  </script>
  
  
  @stack('modals')

  @livewireScripts