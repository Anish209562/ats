   <footer class="footer mt-auto py-3 bg-white text-center">
                <div class="container">
                    <span class="text-muted"> Copyright © <span id="year"></span> <a
                            href="https://meraqui.com" target="_blank" class="text-dark fw-semibold">Meraqui Pvt. Ltd.</a>.
                        All
                        rights
                        reserved
                    </span>
                </div>
            </footer>
<style>
/* WebKit browsers (Chrome, Edge, Safari) */
.page::-webkit-scrollbar {
  width: 12px;
}
.page::-webkit-scrollbar-track {
  background: #f0f0f0;
  border-radius: 8px;
}
.page::-webkit-scrollbar-thumb {
  background: #b0b0b0;
  border-radius: 8px;
}

/* Firefox */
.page {
  scrollbar-width: thin;         /* auto, thin, none */
  scrollbar-color: var(--menu-bg) #f0f0f0;
}

#loader{
    background-color: #0000001a !important;
}
     .form-control:focus{
         border-color: #003cc2 !important;
     }
      [data-nav-layout=horizontal] .app-content {
        margin-block-start: 2.5rem !important;
    }
    @media (min-width: 992px) {
    [data-nav-layout=horizontal] .app-content>.container-fluid {
        width: 100% !important;
        margin-inline-start: auto;
        margin-inline-end: auto;
    }
}

.modal-header, .offcanvas-header {
    background: #d7e2ff !important;
}

.modal-content {
    background-color: #fff !important;
}
.form-control {
    border-color: #a1a7b629 !important;
    border-width: 2px !important;
   
}
.modal-footer{
        z-index: 2 !important;
}

</style>
<script>
      document.addEventListener('DOMContentLoaded', function () {
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.forEach(function (el) {
      new bootstrap.Tooltip(el);
    });
  });
</script>