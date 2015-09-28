<script>

    function loaduser(datalist)
    {   
      
      datalistprocesos_planta=JSON.parse(datalist);      
      
        $("#grid_usuariodatos").kendoGrid({
          dataSource: {
              data: datalistprocesos_planta,
              pageSize: 10
          },
          groupable: false,
          sortable: true,
          pageable: {
              refresh: true,
              pageSizes: true,
              messages: {
              display: "{0} - {1} of {2} items", //{0} is the index of the first record on the page, {1} - index of the last record on the page, {2} is the total amount of records
              empty: "No hay items",
              page: "Página",
              of: "of {0}", //{0} is total amount of pages
              itemsPerPage: "items por pagina",
              first: "Ir a la primera pagina",
              previous: "Pagina Anterior",
              next: "Pagina Siguiente",
              last: "Ir a la ultima pagina",
              refresh: "Actualizar"
              }
        },
          columns: [ {
                  field: "nombre1",
                  width: 90,
                  title: "Nombre"
              } ,{
                  field: "nombre2",
                  width: 110,
                  title: "Segundo Nombre",                  
              } ,{
                  field: "proceso_planta_area",
                  width: 110,
                  title: "Area",                  
              },{
                  field: "proceso_planta_observaciones",
                  width: 220,
                  title: "Observaciones"
              }, {
                  command: [                      
                    /*{text: "Editar", className: "details-button",click: edit_proceso_planta},                       
                    {text: "Eliminar", className: "more-details-button",click: delete_proceso_planta},
                    {text: "Formular", className: "details-button",click: formular_proceso_planta},               */
                  ],
                  title: "&nbsp;",
                  width: "120px" 
                }
          ],
      });
    } 
</script>

