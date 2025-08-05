<div class="modal fade bs-example-modal-lg" id="downloadModal" tabindex="-1" role="dialog" >
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header bg-primary text-white">
              <h4 class="modal-title" id="downloadModalTitle">Descargar Reporte</h4>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" >

                  <span >&times;</span>
              </button>
          </div>
          <div class="modal-body" id="downloadModalContent">
              <!-- Aquí está el botón directo para descargar -->
              <a href="{{ url('/reporte_postulaciones/1') }}" target="_blank" class="btn btn-success">
                  <i class="fa fa-file-excel-o"></i> Descargar Excel
              </a>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

          </div>
      </div>
  </div>
</div>
