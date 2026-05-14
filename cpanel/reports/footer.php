<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

<style>
    .hidden-opacity{
        display: none !important;
    }
    .dt-top-right {
  display: flex;
  justify-content: flex-end;
  gap: 10px;
  margin-bottom: 10px;
}
.dropdown-menu{
    max-height: 250px !important;
    overflow-y: auto;
    width: fit-content !important;
}
  .column-tag {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 6px 10px;
    margin: 4px 0;
    border: 1px solid #ccc;
    border-radius: 6px;
    background: #f9f9f9;
    cursor: grab;
  }
  .column-tag span {
    font-weight: 500;
  }
  .remove-btn {
    background: none;
    border: none;
    font-size: 14px;
    cursor: pointer;
    color: red;
  }
  .sortable-list {
        overflow-y: auto !important;
    max-height: 47vh;
    margin-bottom: 40px;
  }
</style>
<span id="dataedit"></span>
<script> 

function toggleText(cid) {
    var truncatedText = $('#truncated-' + cid);
    var fullText = $('#full-' + cid);
    var toggleLink = $('#toggle-link-' + cid);

    if (fullText.is(':hidden')) {
        truncatedText.slideUp();
        fullText.slideDown();
        toggleLink.html('Hide');
    } else {
        fullText.slideUp();
        truncatedText.slideDown();
        toggleLink.html('Show full text');
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const rows = document.querySelectorAll('table tr');

    rows.forEach(row => {
      const tds = Array.from(row.querySelectorAll('td'));

      // Start from the last td and move backwards
      for (let i = tds.length - 1; i >= 0; i--) {
        const td = tds[i];
        const text = td.textContent.trim();

        if (text === '') {
          td.classList.add('hidden-opacity'); // apply class
        } else {
          break; // stop when we find the first non-empty td
        }
      }
    });
  });

$.fn.dataTable.ext.errMode = 'none';
let table=new DataTable('.example', {
    lengthChange: true, 
    searching: false,
    ordering: false,
    info: false,
    pageLength: 50,
    dom: 'rt<"bottom"ip>', 
    language: {
        lengthMenu: '_MENU_' // only dropdown, no text
    },
    rowCallback: function(row, data, index) {
        if ($(row).hasClass('group-row')) {
            $(row).removeAttr('role');
        }
    },
    "error": function (settings, helpPage, message) { 
        console.log("error", message);
    }
});

let excelButton = new $.fn.dataTable.Buttons(table, {
    buttons: [{
        extend: 'excelHtml5',
        text: 'Export Excel',
        exportOptions: {
            columns: ':visible:not(.hidden-opacity)'
        }
    }]
}).container().appendTo(document.createElement('div')); 

$('#customExportExcel').on('click', function() {
    excelButton.find('button.dt-button').click();
});
$('#customLength').on('change', function() {
    table.page.len($(this).val()).draw();
});



$('#DataTables_Table_0 tbody tr.group-row').each(function () {
    this._DT_RowSkip = true;
})

</script>
