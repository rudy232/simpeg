        </div>
      </div>
    </div>
</div>
<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12">&copy Copyright by Nurromadlona Zikri Fadli</a> </div>
</div>

<!--end-Footer-part-->

<script type="text/javascript">
  $(document).ready(function(){
    //Passing result data on change halaman edit pegawai
    $('#jenis_tunjangan').change(function(){
      dataArr=$(this).val();
      dataArrr=$(this).find(':selected').data('status');
      dataArrrr=$(this).find(':selected').data('pendidikan');
      $('#get').val(dataArr);
      $('#status_tunjangan').val(dataArrr);
      $('#pendidikan').val(dataArrrr);
    });
    //Mengambil nip dari form pengajuan cuti halaman dasbor_admin/cuti/listing tambah
    $('#atasan_langsung').change(function(){
      var nip=$(this).find(':selected').attr('nip');
      $('#nip_atasan').val(nip);
    });
  });
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

  //count li menu di navmenu
  var listmenu = $('#submenu_pegawai li').length
  var listcutimenu = $('#submenu_cutipegawai li').length
  $('.listmenu_pegawai').text(listmenu);
  $('.listmenu_cutipegawai').text(listcutimenu);

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}

function lock(){
  alert("Anda tidak memiliki data pegawai, Untuk dapat membuka kunci pada menu ini harap menambah / upload data pegawai dan data master terlebih dahulu");
}
</script>
</body>
</html>
